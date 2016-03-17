<?php session_start();
include("../~admin/class/connect_db.php");
echo "<meta charset=\"utf-8\">";
// grab recaptcha library
require_once "../asset/captcha/recaptchalib.php";
// your secret key
$secret = "6LdBRxoTAAAAAGuDeya2ZS5NAXYOz7gLGmNXD-Li";
 // empty response
$response = null;
 // check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {

	$datetime = date("Y-m-d H:i:s");

	// $mail = new PHPMailer();
	// $body = "
	// <h2>Contact us.</h2>
	// <p>Name : $_POST[name]</p>
	// <p>Email : $_POST[email]</p>
	// <p>Phone : $_POST[phone]</p>
	// <p>Subject : $_POST[sub]</p>
	// <p>Message : $_POST[msg]</p>
	// ";
	// $mail->CharSet = "utf-8";
	// $mail->IsSMTP();
	// $mail->SMTPDebug = 0;
	// $mail->SMTPAuth = true;
	// $mail->Host = "mail.whitedentalcliniccm.com"; // SMTP server
	// $mail->Port = 25; // พอร์ท
	// $mail->Username = "mail@whitedentalcliniccm.com"; // account SMTP
	// $mail->Password = "TdKK5FgHcp"; // รหัสผ่าน SMTP
	// $mail->SetFrom("mail@whitedentalcliniccm.com", "admin");
	// $mail->AddReplyTo("mail@whitedentalcliniccm.com", "admin");
	// $mail->Subject = "Contact us";
	// $mail->MsgHTML($body);
	// $mail->AddAddress("$email_name", "recipient1"); // ผู้รับคนที่หนึ่ง
	// $mail->send();

	$name = mysql_real_escape_string($_POST['name']);
	$address = mysql_real_escape_string($_POST['address']);
	$tel = mysql_real_escape_string($_POST['tel']);
	$email = mysql_real_escape_string($_POST['email']);
	$detail = mysql_real_escape_string($_POST['detail']);

	$query="INSERT INTO contact 
	VALUES ('',
		'".$name."',
		'".$address."',
		'".$tel."',
		'".$email."',
		'".$detail."',
		'".$datetime."')";
	mysql_query($query) or die(mysql_error());
	mysql_close();

	echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว!');</script>";
}else {
	echo "<script type='text/javascript'>alert('กรอกรหัสป้องกันผิดพลาดกรุณากรอกใหม่!');</script>";
	echo "<script type='text/javascript'>history.back();</script>";
}
echo "<script language='javascript'>window.location='../contact.php'</script>";
?>