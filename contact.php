<?php
include("include/include_function.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>v.1</title>

    <?php  box_link(); ?>
  </head>
  <body>
    <?php box_header(); ?>

    <div class="container">
      <?php box_menu(); ?>
    </div>

    <div class="container">
      <?php box_menu_left(); ?>

      <div class="col-lg-9">
        <div class="row head-news"><img src="img/head_contact.png"></div>
        <div class="col-lg-12">
          <div class="col-lg-5">
            <table>
              <tbody>
                <tr>
                  <td>Mobile :</td>
                  <td>&nbsp;</td>
                  <td>086-6542433 l 086-7358835</td>
                </tr>
                <tr>
                  <td>Tel Office :</td>
                  <td>&nbsp;</td>
                  <td>053-892193</td>
                </tr>
                <tr>
                  <td>FAX :</td>
                  <td>&nbsp;</td>
                  <td>053-892193</td>
                </tr>
                <tr>
                  <td>E-mail :</td>
                  <td>&nbsp;</td>
                  <td>Chiangmaizone@hotmail.com</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>Chatnaja@hotmail.com</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-7">
            <form class="form-horizontal" method="post" action="insert/insert_contact.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" name="name">
              </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="ที่อยู่" name="address"></textarea>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="เบอร์โทรติดต่อ" name="tel">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="อีเมล" name="email">
              </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="รายละเอียด" name="detail"></textarea>
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LdBRxoTAAAAANdPT5-a2VCAVnGT9YWyUWCob2Xc"></div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default">ยืนยัน</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php box_footer(); ?>

    <?php box_script(); ?>
  </body>
</html>