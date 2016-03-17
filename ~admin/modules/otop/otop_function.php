<?php
function otop_index() {
?>

	<section class="content-header">
		<h1>เพิ่มสินค้า OTOP </h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li class="active">จัดการสินค้า OTOP </li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มสินค้า OTOP </h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<a href="main.php?module=otop&action=otop_add"><button class="btn btn-block btn-info btn-xm" style="width:160px">เพิ่มสินค้า OTOP </button></a><br>
					<form method="post" action="main.php?module=otop&action=otop_bkdleall">
						<div class="table-responsive">
							<table id="example1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="text-center" width="30">
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
											<a href="main.php?module=otop&action=otop_index&chkall=<?php echo $chknum; ?>">
												ALL
											</a>
										</th>
										<th>สินค้า OTOP เรื่อง</th>
										<th width="230">ลำดับ</th>
										<th width="40">#</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$result_otop=mysql_query("SELECT * FROM otop ORDER BY otop_sort ASC, otop_id DESC") or die(mysql_error());
				                	while ($row = mysql_fetch_array($result_otop)) {
				                	?>
									<tr role="row">
										<td class="text-center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" name="chkall[]" value="<?php echo $row['otop_id']; ?>" <?php echo $chkall; ?>>
												<span class="lbl"></span>
											</label>
										</td>
										<td>
											<?php echo $row['otop_title']."<br>".$row['otop_title_detail']; ?>
										</td>
										<td>
											<input type="hidden" value="<?php echo $row['otop_id']; ?>" name="id[]">
		          							<input style="width:80px;" class="form-control input-sm" type="number" name="sort[]" value="<?php echo $row['otop_sort']; ?>">

		          							<?php
		          							if (empty($row['otop_display'])||$row['otop_display']==0) {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=otop&action=otop_hidden&id=<?php echo $row['otop_id'] ?>&status=1">
			          								<span class="btn btn-sm btn-info">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														แสดง
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
		          							<?php
		          							}else {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=otop&action=otop_hidden&id=<?php echo $row['otop_id'] ?>&status=0">
			          								<span class="btn btn-sm btn-danger">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														ไม่แสดง
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
		          							<?php
		          							}
		          							?>

										</td>
										<td>
											<div class="action-buttons">
												<a class="green" href="main.php?module=otop&action=otop_editfm&id=<?php echo $row['otop_id']; ?>"><i class="ace-icon fa fa-pencil"></i></a>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="red" href="main.php?module=otop&action=otop_delete&id=<?php echo $row['otop_id']; ?>&cover=<?php echo $row['otop_pic']; ?>"><i class="ace-icon fa fa-trash-o"></i></a>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<table>
					            <tbody>
					            	<tr>
					            		<td><button onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="btn btn-block btn-danger btn-sm" style="width:100px">Delete</button></td>
					            		<td>&nbsp;</td>
					            		<td><button onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" class="btn btn-block btn-success btn-sm" style="width:130px">Confirm sort</button></td>
					            	</tr>
					            </tbody>
					        </table>
					    </div>
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

function otop_bkdleall() {
	if (!empty($_POST['chkall'])) {
		foreach ($_POST['chkall'] as $value) {

			$result_otop=mysql_query("SELECT otop_pic FROM otop WHERE otop_id='".$value."'") or die(mysql_error());
			$row = mysql_fetch_array($result_otop);
			@unlink("../upload/pic_otop/$row[otop_pic]");

			$query="DELETE FROM otop WHERE otop_id='".$value."'";
			mysql_query($query) or die(mysql_error());

			$result_otop_gal=mysql_query("SELECT * FROM otop_gallery WHERE otop_id='".$value."'") or die(mysql_error());
			while ($row_otop_gal = mysql_fetch_array($result_otop_gal)) {
				$sqlotopGal="DELETE FROM otop_gallery WHERE otopgal_id='".$row_otop_gal['otopgal_id']."'";
				mysql_query($sqlotopGal) or die(mysql_error());
				@unlink("../upload/pic_otop/$row_otop_gal[otopgal_name]");
			}
		}
	}

	if (!empty($_POST['id'])) {
		$b=0;
		foreach ($_POST['id'] as  $value) {
		  	$query="UPDATE otop SET otop_sort='".$_POST['sort'][$b]."' WHERE otop_id='".$value."'";
		  	mysql_query($query) or die(mysql_error());
			$b++;
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_index'</script>";
}

function otop_delete() {
	if (!empty($_GET['id'])) {
		@unlink("../upload/pic_otop/$_GET[cover]");

		$sql_delete_otop="DELETE FROM otop WHERE otop_id='".$_GET['id']."'";
		mysql_query($sql_delete_otop) or die(mysql_error());

		$result_otop_gal=mysql_query("SELECT * FROM otop_gallery WHERE otop_id='".$_GET['id']."'") or die(mysql_error());
		while ($row_otop_gal = mysql_fetch_array($result_otop_gal)) {
			$sqlotopGal="DELETE FROM otop_gallery WHERE otopgal_id='".$row_otop_gal['otopgal_id']."'";
			mysql_query($sqlotopGal) or die(mysql_error());
			@unlink("../upload/pic_otop/$row_otop_gal[otopgal_name]");
		}

		
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_index'</script>";
}

function otop_add() {
?>
	<section class="content-header">
		<h1>เพิ่มสินค้า OTOP </h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=otop&action=otop_index"> จัดการสินค้า OTOP </a></li>
			<li class="active">เพิ่มสินค้า OTOP </li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มสินค้า OTOP </h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=otop&action=otop_insert" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> สินค้า OTOP เรื่อง</label>
							<div class="col-sm-10">
								<input type="text" placeholder="สินค้า OTOP เรื่อง" class="form-control" name="otop_title" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดสินค้า OTOP </label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดสินค้า OTOP " class="form-control" name="otop_title_detail" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ติดต่อ </label>
							<div class="col-sm-10">
								<input type="text" placeholder="ติดต่อ" class="form-control" name="otop_contact" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="otop_detail"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="otop_cover" required>
										<p class="help-block">*Select only one photo size 1024 x 600.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพ </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="otop_pic[]" multiple>
										<p class="help-block">*select more than one photo and size 1024 x 600.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit"><i class="ace-icon fa fa-check bigger-110"></i> บันทึกข้อมูล</button>
								<button class="btn" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> ล้างค่า</button>
							</div>
						</div>
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

function otop_insert() {
	$otop_title = mysql_real_escape_string($_POST['otop_title']);
	$otop_title_detail = mysql_real_escape_string($_POST['otop_title_detail']);
	$otop_detail = $_POST['otop_detail'];
	$otop_contact = mysql_real_escape_string($_POST['otop_contact']);

	if ($_FILES['otop_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['otop_cover']['name']));
	    $piccover_tmp = $_FILES['otop_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_otop/$pic_cover");
	    }
	}else {
	    $pic_cover="";
	}


	$SQL_otop="INSERT INTO otop VALUES ('',
		'".$otop_title."',
		'".$otop_title_detail."',
		'".$otop_contact."',
		'".$otop_detail."',
		'0','0','0','0','".$pic_cover."','".date("Y-m-d")."')";
	mysql_query($SQL_otop) or die(mysql_error());


	$resultid=mysql_query("SELECT otop_id FROM otop ORDER BY otop_id DESC") or die(mysql_error());
	list($id) = mysql_fetch_row($resultid);

	if ($_FILES['otop_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['otop_pic']['name'];
	    $picgal_tmp = $_FILES['otop_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_otop/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$id."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO otop_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}

	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_index'</script>";
}

function otop_editfm() {
	$result_otop=mysql_query("SELECT * FROM otop WHERE otop_id='".$_GET['id']."'") or die(mysql_error());
	$row = mysql_fetch_array($result_otop);
?>
	<section class="content-header">
		<h1>&nbsp;</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=otop&action=otop_index"> จัดการสินค้า OTOP </a></li>
			<li class="active">แก้ไขสินค้า OTOP </li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">แก้ไขสินค้า OTOP </h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=otop&action=otop_edit&cover=<?php echo $row['otop_pic']; ?>" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> สินค้า OTOP เรื่อง</label>
							<div class="col-sm-10">
								<input type="hidden" name="id" value="<?php echo $row['otop_id']; ?>">
								<input type="text" placeholder="สินค้า OTOP เรื่อง" class="form-control" name="otop_title" value="<?php echo $row['otop_title']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดสินค้า OTOP </label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดสินค้า OTOP " class="form-control" name="otop_title_detail" value="<?php echo $row['otop_title_detail']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ติดต่อ </label>
							<div class="col-sm-10">
								<input type="text" placeholder="ติดต่อ" class="form-control" name="otop_contact" value="<?php echo $row['otop_contact']; ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="otop_detail"><?php echo $row['otop_detail']; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="otop_cover">
										<p class="help-block">*Select only one photo size 1024 x 600.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right">  &nbsp; </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-xs-12">
										<?php 
				                    	if (!empty($row['otop_pic'])) {
				                    	?>
				                    		<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=otop&action=otop_delete_img&id=<?php echo $row['otop_id']; ?>&pictype=cover&cover=<?php echo $row['otop_pic']; ?>">
												<img width="120" src="../upload/pic_otop/<?php echo $row['otop_pic']; ?>">
											</a>
											<p class="help-block">*click at photo to delete.</p>
				                    	<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพ </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="otop_pic[]" multiple>
										<p class="help-block">*select more than one photo and size 1024 x 600.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> &nbsp; </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-xs-12">
										<?php
										$result_otop_gal=mysql_query("SELECT * FROM otop_gallery WHERE otop_id='".$_GET['id']."'") or die(mysql_error());
										while ($row_otop_gal = mysql_fetch_array($result_otop_gal)) {
					                    	if (!empty($row_otop_gal['otopgal_name'])) {
												?>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=otop&action=otop_delete_img&id=<?php echo $row_otop_gal['otop_id'] ?>&idgal=<?php echo $row_otop_gal['otopgal_id'] ?>&pictype=gallery&gallery=<?php echo $row_otop_gal['otopgal_name'] ?>">
												<img width="120" src="../upload/pic_otop/<?php echo $row_otop_gal['otopgal_name']; ?>">
												</a>
										<?php }} ?>
									</div>
								</div>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit"><i class="ace-icon fa fa-check bigger-110"></i> บันทึกข้อมูล</button>
								<button class="btn" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> ล้างค่า</button>
							</div>
						</div>
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

function otop_delete_img() {
	if (!empty($_GET['pictype'])) {
		if ($_GET['pictype']=="cover") {
			$sqlotop="UPDATE otop SET otop_pic='' WHERE otop_id='".$_GET['id']."'";
			mysql_query($sqlotop) or die(mysql_error());
			@unlink("../upload/pic_otop/$_GET[cover]");
		}elseif ($_GET['pictype']=="gallery") {
			$sqlotopGal="DELETE FROM otop_gallery WHERE otopgal_id='".$_GET['idgal']."'";
			mysql_query($sqlotopGal) or die(mysql_error());
			@unlink("../upload/pic_otop/$_GET[gallery]");
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_editfm&id=".$_GET['id']."'</script>";
}

function otop_edit() {
	$otop_title = mysql_real_escape_string($_POST['otop_title']);
	$otop_title_detail = mysql_real_escape_string($_POST['otop_title_detail']);
	$otop_detail = $_POST['otop_detail'];
	$otop_contact = mysql_real_escape_string($_POST['otop_contact']);

	if ($_FILES['otop_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['otop_cover']['name']));
	    $piccover_tmp = $_FILES['otop_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_otop/$pic_cover");
	      @unlink("../upload/pic_otop/$_GET[cover]");
	    }
		
	    $sqlCover=",otop_pic='".$pic_cover."'";
	}else {
	    $sqlCover="";
	}

	$SQL_UPDATE_otop="UPDATE otop SET otop_title='".$otop_title."',
	otop_title_detail='".$otop_title_detail."',
	otop_contact='".$otop_contact."',
	otop_detail='".$otop_detail."'$sqlCover WHERE otop_id='".$_POST['id']."'";
	mysql_query($SQL_UPDATE_otop) or die(mysql_error());

	if ($_FILES['otop_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['otop_pic']['name'];
	    $picgal_tmp = $_FILES['otop_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_otop/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$_POST['id']."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO otop_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_editfm&id=$_POST[id]'</script>";
}

function otop_hidden_m() {
	$SQL_DISPLAY_otop="UPDATE otop SET otop_display_index='".$_GET['status']."' WHERE otop_id='".$_GET['id']."'";
	mysql_query($SQL_DISPLAY_otop) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_index'</script>";
}
function otop_hidden() {
	$otop_hid="UPDATE otop SET otop_display='".$_GET['status']."' WHERE otop_id='".$_GET['id']."'";
	mysql_query($otop_hid) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=otop&action=otop_index'</script>";
}
