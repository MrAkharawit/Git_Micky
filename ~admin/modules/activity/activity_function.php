<?php
function activity_index() {
?>

	<section class="content-header">
		<h1>เพิ่มกิจกรรม</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li class="active">จัดการกิจกรรม</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มกิจกรรม</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<a href="main.php?module=activity&action=activity_add"><button class="btn btn-block btn-info btn-xm" style="width:160px">เพิ่มกิจกรรม</button></a><br>
					<form method="post" action="main.php?module=activity&action=activity_bkdleall">
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
											<a href="main.php?module=activity&action=activity_index&chkall=<?php echo $chknum; ?>">
												ALL
											</a>
										</th>
										<th>กิจกรรมเรื่อง</th>
										<th width="230">ลำดับ</th>
										<th width="40">#</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$result_activity=mysql_query("SELECT * FROM activity ORDER BY activity_sort ASC, activity_id DESC") or die(mysql_error());
				                	while ($row = mysql_fetch_array($result_activity)) {
				                	?>
									<tr role="row">
										<td class="text-center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" name="chkall[]" value="<?php echo $row['activity_id']; ?>" <?php echo $chkall; ?>>
												<span class="lbl"></span>
											</label>
										</td>
										<td>
											<?php echo $row['activity_title']."<br>".$row['activity_title_detail']; ?>
										</td>
										<td>
											<input type="hidden" value="<?php echo $row['activity_id']; ?>" name="id[]">
		          							<input style="width:80px;" class="form-control input-sm" type="number" name="sort[]" value="<?php echo $row['activity_sort']; ?>">

		          							<?php
		          							if (empty($row['activity_display'])||$row['activity_display']==0) {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=activity&action=activity_hidden&id=<?php echo $row['activity_id'] ?>&status=1">
			          								<span class="btn btn-sm btn-info">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														แสดง
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
		          							<?php
		          							}else {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=activity&action=activity_hidden&id=<?php echo $row['activity_id'] ?>&status=0">
			          								<span class="btn btn-sm btn-danger">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														ไม่แสดง
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
		          							<?php
		          							}
		          							?>

		          							<?php
			      							if (empty($row['activity_display_index'])||$row['activity_display_index']==0) {
			      							?>
			      								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=activity&action=activity_hidden_m&id=<?php echo $row['activity_id'] ?>&status=1">
			          								<span class="btn btn-sm btn-info">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														แนะนำ
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
			      							<?php
			      							}else {
			      							?>
			      								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=activity&action=activity_hidden_m&id=<?php echo $row['activity_id'] ?>&status=0">
			          								<span class="btn btn-sm btn-danger">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														ไม่แนะนำ
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
			      							<?php
			      							}
			      							?>
										</td>
										<td>
											<div class="action-buttons">
												<a class="green" href="main.php?module=activity&action=activity_editfm&id=<?php echo $row['activity_id']; ?>"><i class="ace-icon fa fa-pencil"></i></a>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="red" href="main.php?module=activity&action=activity_delete&id=<?php echo $row['activity_id']; ?>&cover=<?php echo $row['activity_pic']; ?>"><i class="ace-icon fa fa-trash-o"></i></a>
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

function activity_bkdleall() {
	if (!empty($_POST['chkall'])) {
		foreach ($_POST['chkall'] as $value) {

			$result_activity=mysql_query("SELECT activity_pic FROM activity WHERE activity_id='".$value."'") or die(mysql_error());
			$row = mysql_fetch_array($result_activity);
			@unlink("../upload/pic_activity/$row[activity_pic]");

			$query="DELETE FROM activity WHERE activity_id='".$value."'";
			mysql_query($query) or die(mysql_error());

			$result_activity_gal=mysql_query("SELECT * FROM activity_gallery WHERE activity_id='".$value."'") or die(mysql_error());
			while ($row_activity_gal = mysql_fetch_array($result_activity_gal)) {
				$sqlactivityGal="DELETE FROM activity_gallery WHERE activitygal_id='".$row_activity_gal['activitygal_id']."'";
				mysql_query($sqlactivityGal) or die(mysql_error());
				@unlink("../upload/pic_activity/$row_activity_gal[activitygal_name]");
			}
		}
	}

	if (!empty($_POST['id'])) {
		$b=0;
		foreach ($_POST['id'] as  $value) {
		  	$query="UPDATE activity SET activity_sort='".$_POST['sort'][$b]."' WHERE activity_id='".$value."'";
		  	mysql_query($query) or die(mysql_error());
			$b++;
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_index'</script>";
}

function activity_delete() {
	if (!empty($_GET['id'])) {
		@unlink("../upload/pic_activity/$_GET[cover]");

		$sql_delete_activity="DELETE FROM activity WHERE activity_id='".$_GET['id']."'";
		mysql_query($sql_delete_activity) or die(mysql_error());

		$result_activity_gal=mysql_query("SELECT * FROM activity_gallery WHERE activity_id='".$_GET['id']."'") or die(mysql_error());
		while ($row_activity_gal = mysql_fetch_array($result_activity_gal)) {
			$sqlactivityGal="DELETE FROM activity_gallery WHERE activitygal_id='".$row_activity_gal['activitygal_id']."'";
			mysql_query($sqlactivityGal) or die(mysql_error());
			@unlink("../upload/pic_activity/$row_activity_gal[activitygal_name]");
		}

		
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_index'</script>";
}

function activity_add() {
?>
	<section class="content-header">
		<h1>เพิ่มกิจกรรม</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=activity&action=activity_index"> จัดการกิจกรรม</a></li>
			<li class="active">เพิ่มกิจกรรม</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มกิจกรรม</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=activity&action=activity_insert" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> กิจกรรมเรื่อง</label>
							<div class="col-sm-10">
								<input type="text" placeholder="กิจกรรมเรื่อง" class="form-control" name="activity_title" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดกิจกรรม</label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดกิจกรรม" class="form-control" name="activity_title_detail" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="activity_detail"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="activity_cover" required>
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
										<input type="file" name="activity_pic[]" multiple>
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

function activity_insert() {
	$activity_title = mysql_real_escape_string($_POST['activity_title']);
	$activity_title_detail = mysql_real_escape_string($_POST['activity_title_detail']);
	$activity_detail = $_POST['activity_detail'];

	if ($_FILES['activity_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['activity_cover']['name']));
	    $piccover_tmp = $_FILES['activity_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_activity/$pic_cover");
	    }
	}else {
	    $pic_cover="";
	}


	$SQL_activity="INSERT INTO activity VALUES ('',
		'".$activity_title."',
		'".$activity_title_detail."',
		'".$activity_detail."',
		'0','0','0','0','".$pic_cover."','".date("Y-m-d")."')";
	mysql_query($SQL_activity) or die(mysql_error());


	$resultid=mysql_query("SELECT activity_id FROM activity ORDER BY activity_id DESC") or die(mysql_error());
	list($id) = mysql_fetch_row($resultid);

	if ($_FILES['activity_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['activity_pic']['name'];
	    $picgal_tmp = $_FILES['activity_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_activity/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$id."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO activity_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}

	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_index'</script>";
}

function activity_editfm() {
	$result_activity=mysql_query("SELECT * FROM activity WHERE activity_id='".$_GET['id']."'") or die(mysql_error());
	$row = mysql_fetch_array($result_activity);
?>
	<section class="content-header">
		<h1>&nbsp;</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=activity&action=activity_index"> จัดการกิจกรรม</a></li>
			<li class="active">แก้ไขกิจกรรม</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">แก้ไขกิจกรรม</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=activity&action=activity_edit&cover=<?php echo $row['activity_pic']; ?>" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> กิจกรรมเรื่อง</label>
							<div class="col-sm-10">
								<input type="hidden" name="id" value="<?php echo $row['activity_id']; ?>">
								<input type="text" placeholder="กิจกรรมเรื่อง" class="form-control" name="activity_title" value="<?php echo $row['activity_title']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดกิจกรรม</label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดกิจกรรม" class="form-control" name="activity_title_detail" value="<?php echo $row['activity_title_detail']; ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="activity_detail"><?php echo $row['activity_detail']; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="activity_cover">
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
				                    	if (!empty($row['activity_pic'])) {
				                    	?>
				                    		<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=activity&action=activity_delete_img&id=<?php echo $row['activity_id']; ?>&pictype=cover&cover=<?php echo $row['activity_pic']; ?>">
												<img width="120" src="../upload/pic_activity/<?php echo $row['activity_pic']; ?>">
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
										<input type="file" name="activity_pic[]" multiple>
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
										$result_activity_gal=mysql_query("SELECT * FROM activity_gallery WHERE activity_id='".$_GET['id']."'") or die(mysql_error());
										while ($row_activity_gal = mysql_fetch_array($result_activity_gal)) {
					                    	if (!empty($row_activity_gal['activitygal_name'])) {
												?>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=activity&action=activity_delete_img&id=<?php echo $row_activity_gal['activity_id'] ?>&idgal=<?php echo $row_activity_gal['activitygal_id'] ?>&pictype=gallery&gallery=<?php echo $row_activity_gal['activitygal_name'] ?>">
												<img width="120" src="../upload/pic_activity/<?php echo $row_activity_gal['activitygal_name']; ?>">
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

function activity_delete_img() {
	if (!empty($_GET['pictype'])) {
		if ($_GET['pictype']=="cover") {
			$sqlactivity="UPDATE activity SET activity_pic='' WHERE activity_id='".$_GET['id']."'";
			mysql_query($sqlactivity) or die(mysql_error());
			@unlink("../upload/pic_activity/$_GET[cover]");
		}elseif ($_GET['pictype']=="gallery") {
			$sqlactivityGal="DELETE FROM activity_gallery WHERE activitygal_id='".$_GET['idgal']."'";
			mysql_query($sqlactivityGal) or die(mysql_error());
			@unlink("../upload/pic_activity/$_GET[gallery]");
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_editfm&id=".$_GET['id']."'</script>";
}

function activity_edit() {
	$activity_title = mysql_real_escape_string($_POST['activity_title']);
	$activity_title_detail = mysql_real_escape_string($_POST['activity_title_detail']);
	$activity_detail = $_POST['activity_detail'];

	if ($_FILES['activity_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['activity_cover']['name']));
	    $piccover_tmp = $_FILES['activity_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_activity/$pic_cover");
	      @unlink("../upload/pic_activity/$_GET[cover]");
	    }
		
	    $sqlCover=",activity_pic='".$pic_cover."'";
	}else {
	    $sqlCover="";
	}

	$SQL_UPDATE_activity="UPDATE activity SET activity_title='".$activity_title."',
	activity_title_detail='".$activity_title_detail."',
	activity_detail='".$activity_detail."'$sqlCover WHERE activity_id='".$_POST['id']."'";
	mysql_query($SQL_UPDATE_activity) or die(mysql_error());

	if ($_FILES['activity_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['activity_pic']['name'];
	    $picgal_tmp = $_FILES['activity_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_activity/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$_POST['id']."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO activity_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_editfm&id=$_POST[id]'</script>";
}

function activity_hidden_m() {
	$SQL_DISPLAY_activity="UPDATE activity SET activity_display_index='".$_GET['status']."' WHERE activity_id='".$_GET['id']."'";
	mysql_query($SQL_DISPLAY_activity) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_index'</script>";
}
function activity_hidden() {
	$activity_hid="UPDATE activity SET activity_display='".$_GET['status']."' WHERE activity_id='".$_GET['id']."'";
	mysql_query($activity_hid) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=activity&action=activity_index'</script>";
}
