<?php
function travel_index() {
?>

	<section class="content-header">
		<h1>เพิ่มสถานที่ท่องเที่ยว</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li class="active">จัดการสถานที่ท่องเที่ยว</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มสถานที่ท่องเที่ยว</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<a href="main.php?module=travel&action=travel_add"><button class="btn btn-block btn-info btn-xm" style="width:160px">เพิ่มสถานที่ท่องเที่ยว</button></a><br>
					<form method="post" action="main.php?module=travel&action=travel_bkdleall">
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
											<a href="main.php?module=travel&action=travel_index&chkall=<?php echo $chknum; ?>">
												ALL
											</a>
										</th>
										<th>สถานที่ท่องเที่ยวเรื่อง</th>
										<th width="230">ลำดับ</th>
										<th width="40">#</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$result_travel=mysql_query("SELECT * FROM travel ORDER BY travel_sort ASC, travel_id DESC") or die(mysql_error());
				                	while ($row = mysql_fetch_array($result_travel)) {
				                	?>
									<tr role="row">
										<td class="text-center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" name="chkall[]" value="<?php echo $row['travel_id']; ?>" <?php echo $chkall; ?>>
												<span class="lbl"></span>
											</label>
										</td>
										<td>
											<?php echo $row['travel_title']."<br>".$row['travel_title_detail']; ?>
										</td>
										<td>
											<input type="hidden" value="<?php echo $row['travel_id']; ?>" name="id[]">
		          							<input style="width:80px;" class="form-control input-sm" type="number" name="sort[]" value="<?php echo $row['travel_sort']; ?>">

		          							<?php
		          							if (empty($row['travel_display'])||$row['travel_display']==0) {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=travel&action=travel_hidden&id=<?php echo $row['travel_id'] ?>&status=1">
			          								<span class="btn btn-sm btn-info">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														แสดง
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
		          							<?php
		          							}else {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=travel&action=travel_hidden&id=<?php echo $row['travel_id'] ?>&status=0">
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
												<a class="green" href="main.php?module=travel&action=travel_editfm&id=<?php echo $row['travel_id']; ?>"><i class="ace-icon fa fa-pencil"></i></a>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="red" href="main.php?module=travel&action=travel_delete&id=<?php echo $row['travel_id']; ?>&cover=<?php echo $row['travel_pic']; ?>"><i class="ace-icon fa fa-trash-o"></i></a>
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
					            		<td><button onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" class="btn btn-block btn-success btn-sm" style="width:130px">confirm sort</button></td>
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

function travel_bkdleall() {
	if (!empty($_POST['chkall'])) {
		foreach ($_POST['chkall'] as $value) {

			$result_travel=mysql_query("SELECT travel_pic FROM travel WHERE travel_id='".$value."'") or die(mysql_error());
			$row = mysql_fetch_array($result_travel);
			@unlink("../upload/pic_travel/$row[travel_pic]");

			$query="DELETE FROM travel WHERE travel_id='".$value."'";
			mysql_query($query) or die(mysql_error());

			$result_travel_gal=mysql_query("SELECT * FROM travel_gallery WHERE travel_id='".$value."'") or die(mysql_error());
			while ($row_travel_gal = mysql_fetch_array($result_travel_gal)) {
				$sqltravelGal="DELETE FROM travel_gallery WHERE travelgal_id='".$row_travel_gal['travelgal_id']."'";
				mysql_query($sqltravelGal) or die(mysql_error());
				@unlink("../upload/pic_travel/$row_travel_gal[travelgal_name]");
			}
		}
	}

	if (!empty($_POST['id'])) {
		$b=0;
		foreach ($_POST['id'] as  $value) {
		  	$query="UPDATE travel SET travel_sort='".$_POST['sort'][$b]."' WHERE travel_id='".$value."'";
		  	mysql_query($query) or die(mysql_error());
			$b++;
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_index'</script>";
}

function travel_delete() {
	if (!empty($_GET['id'])) {
		@unlink("../upload/pic_travel/$_GET[cover]");

		$sql_delete_travel="DELETE FROM travel WHERE travel_id='".$_GET['id']."'";
		mysql_query($sql_delete_travel) or die(mysql_error());

		$result_travel_gal=mysql_query("SELECT * FROM travel_gallery WHERE travel_id='".$_GET['id']."'") or die(mysql_error());
		while ($row_travel_gal = mysql_fetch_array($result_travel_gal)) {
			$sqltravelGal="DELETE FROM travel_gallery WHERE travelgal_id='".$row_travel_gal['travelgal_id']."'";
			mysql_query($sqltravelGal) or die(mysql_error());
			@unlink("../upload/pic_travel/$row_travel_gal[travelgal_name]");
		}

		
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_index'</script>";
}

function travel_add() {
?>
	<section class="content-header">
		<h1>เพิ่มสถานที่ท่องเที่ยว</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=travel&action=travel_index"> จัดการสถานที่ท่องเที่ยว</a></li>
			<li class="active">เพิ่มสถานที่ท่องเที่ยว</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มสถานที่ท่องเที่ยว</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=travel&action=travel_insert" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> สถานที่ท่องเที่ยวเรื่อง</label>
							<div class="col-sm-10">
								<input type="text" placeholder="สถานที่ท่องเที่ยวเรื่อง" class="form-control" name="travel_title" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดสถานที่ท่องเที่ยว</label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดสถานที่ท่องเที่ยว" class="form-control" name="travel_title_detail" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="travel_detail"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="travel_cover" required>
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
										<input type="file" name="travel_pic[]" multiple>
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

function travel_insert() {
	$travel_title = mysql_real_escape_string($_POST['travel_title']);
	$travel_title_detail = mysql_real_escape_string($_POST['travel_title_detail']);
	$travel_detail = $_POST['travel_detail'];

	if ($_FILES['travel_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['travel_cover']['name']));
	    $piccover_tmp = $_FILES['travel_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_travel/$pic_cover");
	    }
	}else {
	    $pic_cover="";
	}


	$SQL_travel="INSERT INTO travel VALUES ('',
		'".$travel_title."',
		'".$travel_title_detail."',
		'".$travel_detail."',
		'0','0','0','0','".$pic_cover."','".date("Y-m-d")."')";
	mysql_query($SQL_travel) or die(mysql_error());


	$resultid=mysql_query("SELECT travel_id FROM travel ORDER BY travel_id DESC") or die(mysql_error());
	list($id) = mysql_fetch_row($resultid);

	if ($_FILES['travel_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['travel_pic']['name'];
	    $picgal_tmp = $_FILES['travel_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_travel/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$id."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO travel_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}

	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_index'</script>";
}

function travel_editfm() {
	$result_travel=mysql_query("SELECT * FROM travel WHERE travel_id='".$_GET['id']."'") or die(mysql_error());
	$row = mysql_fetch_array($result_travel);
?>
	<section class="content-header">
		<h1>&nbsp;</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=travel&action=travel_index"> จัดการสถานที่ท่องเที่ยว</a></li>
			<li class="active">แก้ไขสถานที่ท่องเที่ยว</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">แก้ไขสถานที่ท่องเที่ยว</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=travel&action=travel_edit&cover=<?php echo $row['travel_pic']; ?>" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> สถานที่ท่องเที่ยวเรื่อง</label>
							<div class="col-sm-10">
								<input type="hidden" name="id" value="<?php echo $row['travel_id']; ?>">
								<input type="text" placeholder="สถานที่ท่องเที่ยวเรื่อง" class="form-control" name="travel_title" value="<?php echo $row['travel_title']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดสถานที่ท่องเที่ยว</label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดสถานที่ท่องเที่ยว" class="form-control" name="travel_title_detail" value="<?php echo $row['travel_title_detail']; ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="travel_detail"><?php echo $row['travel_detail']; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="travel_cover">
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
				                    	if (!empty($row['travel_pic'])) {
				                    	?>
				                    		<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=travel&action=travel_delete_img&id=<?php echo $row['travel_id']; ?>&pictype=cover&cover=<?php echo $row['travel_pic']; ?>">
												<img width="120" src="../upload/pic_travel/<?php echo $row['travel_pic']; ?>">
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
										<input type="file" name="travel_pic[]" multiple>
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
										$result_travel_gal=mysql_query("SELECT * FROM travel_gallery WHERE travel_id='".$_GET['id']."'") or die(mysql_error());
										while ($row_travel_gal = mysql_fetch_array($result_travel_gal)) {
					                    	if (!empty($row_travel_gal['travelgal_name'])) {
												?>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=travel&action=travel_delete_img&id=<?php echo $row_travel_gal['travel_id'] ?>&idgal=<?php echo $row_travel_gal['travelgal_id'] ?>&pictype=gallery&gallery=<?php echo $row_travel_gal['travelgal_name'] ?>">
												<img width="120" src="../upload/pic_travel/<?php echo $row_travel_gal['travelgal_name']; ?>">
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

function travel_delete_img() {
	if (!empty($_GET['pictype'])) {
		if ($_GET['pictype']=="cover") {
			$sqltravel="UPDATE travel SET travel_pic='' WHERE travel_id='".$_GET['id']."'";
			mysql_query($sqltravel) or die(mysql_error());
			@unlink("../upload/pic_travel/$_GET[cover]");
		}elseif ($_GET['pictype']=="gallery") {
			$sqltravelGal="DELETE FROM travel_gallery WHERE travelgal_id='".$_GET['idgal']."'";
			mysql_query($sqltravelGal) or die(mysql_error());
			@unlink("../upload/pic_travel/$_GET[gallery]");
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_editfm&id=".$_GET['id']."'</script>";
}

function travel_edit() {
	$travel_title = mysql_real_escape_string($_POST['travel_title']);
	$travel_title_detail = mysql_real_escape_string($_POST['travel_title_detail']);
	$travel_detail = $_POST['travel_detail'];

	if ($_FILES['travel_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['travel_cover']['name']));
	    $piccover_tmp = $_FILES['travel_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_travel/$pic_cover");
	      @unlink("../upload/pic_travel/$_GET[cover]");
	    }
		
	    $sqlCover=",travel_pic='".$pic_cover."'";
	}else {
	    $sqlCover="";
	}

	$SQL_UPDATE_travel="UPDATE travel SET travel_title='".$travel_title."',
	travel_title_detail='".$travel_title_detail."',
	travel_detail='".$travel_detail."'$sqlCover WHERE travel_id='".$_POST['id']."'";
	mysql_query($SQL_UPDATE_travel) or die(mysql_error());

	if ($_FILES['travel_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['travel_pic']['name'];
	    $picgal_tmp = $_FILES['travel_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_travel/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$_POST['id']."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO travel_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_editfm&id=$_POST[id]'</script>";
}

function travel_hidden_m() {
	$SQL_DISPLAY_travel="UPDATE travel SET travel_display_index='".$_GET['status']."' WHERE travel_id='".$_GET['id']."'";
	mysql_query($SQL_DISPLAY_travel) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_index'</script>";
}
function travel_hidden() {
	$travel_hid="UPDATE travel SET travel_display='".$_GET['status']."' WHERE travel_id='".$_GET['id']."'";
	mysql_query($travel_hid) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=travel&action=travel_index'</script>";
}
