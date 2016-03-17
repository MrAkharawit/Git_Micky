<?php
function contact_index(){
	$result=mysql_query("SELECT * FROM contact ORDER BY contact_id DESC") or die(mysql_error());
?>
	<section class="content-header">
		<h1>ติดต่อเรา</h1>
		<ol class="breadcrumb">
			<li class="active">ติดต่อเรา</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">ติดต่อเรา</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form method="post" action="main.php?module=contact&action=contact_bkdleall">
						<div class="table-responsive">
							<table id="example1" class="table table-striped table-bordered table-hover">
								<thead>
				                <tr>
									<?php
									$chkall="";
									$chknum=1;
									if (!empty($_GET['chkall'])) {
										if ($_GET['chkall']==1) {
											$chkall="checked";
											$chknum=0;
										}
									}
									?>
									<th width="4%"><a href="main.php?module=contact&action=contact_index&chkall=<?php echo $chknum; ?>">ALL</a></th>
									<th width="16%">ชื่อ-นามสกุล</th>
									<th width="20%">ที่อยู่/อีเมล/เบอร์ติดต่อ</th>
									<th>รายละเอียด</th>
									<th width="15%">วันที่</th>
									<th width="5%">#</th>
				                </tr>
				            </thead>
				            <tbody>
				                <?php
				                while(list($contact_id,$contact_name,$contact_address,$contact_tel,$contact_email,$contact_detail,$contact_date) = mysql_fetch_row($result)){
				                ?>
				                <tr>
				                  	<td><input type="checkbox" name="chkall[]" value="<?php echo $contact_id; ?>" <?php echo $chkall; ?>></td>
				                  	<td><?php echo $contact_name; ?></td>
				                  	<td><?php echo $contact_address."<br>".$contact_email."<br>".$contact_tel; ?></td>
				                  	<td><?php echo $contact_detail; ?></td>
				                  	<td><?php echo $contact_date; ?></td>
				                  	<td>
				                   	 	<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=contact&action=contact_delete&id=<?php echo $contact_id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
				                  	</td>
				                </tr>
				                <?php } ?>
			              	</tbody>
			            </table>
			            <button onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="btn btn-block btn-danger btn-xs" style="width:100px;">Delete</button>
				    </form>
				</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				&nbsp;
			</div><!-- /.box-footer-->
		</div><!-- /.box -->
	</section>

<?php
}

function contact_delete(){
  $query="DELETE FROM contact WHERE contact_id='".$_GET['id']."'";
  mysql_query($query) or die(mysql_error());
  echo "<script language='javascript'>window.location='main.php?module=contact&action=contact_index'</script>";
}

function contact_bkdleall(){
  if (!empty($_POST['chkall'])) {
    foreach ($_POST['chkall'] as  $value) {
      $query="DELETE FROM contact WHERE contact_id='".$value."'";
      mysql_query($query) or die(mysql_error());
    }
    mysql_close();
  }
  echo "<script language='javascript'>window.location='main.php?module=contact&action=contact_index'</script>";
}
?>