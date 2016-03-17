<?php
function news_index() {
?>

	<section class="content-header">
		<h1>เพิ่มข่าวสาร</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li class="active">จัดการข่าวสาร</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มข่าวสาร</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<a href="main.php?module=news&action=news_add"><button class="btn btn-block btn-info btn-xm" style="width:160px">เพิ่มข่าวสาร</button></a><br>
					<form method="post" action="main.php?module=news&action=news_bkdleall">
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
											<a href="main.php?module=news&action=news_index&chkall=<?php echo $chknum; ?>">
												ALL
											</a>
										</th>
										<th>ข่าวสารเรื่อง</th>
										<th width="230">ลำดับ</th>
										<th width="40">#</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$result_news=mysql_query("SELECT * FROM news ORDER BY news_sort ASC, news_id DESC") or die(mysql_error());
				                	while ($row = mysql_fetch_array($result_news)) {
				                	?>
									<tr role="row">
										<td class="text-center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" name="chkall[]" value="<?php echo $row['news_id']; ?>" <?php echo $chkall; ?>>
												<span class="lbl"></span>
											</label>
										</td>
										<td>
											<?php echo $row['news_title']."<br>".$row['news_title_detail']; ?>
										</td>
										<td>
											<input type="hidden" value="<?php echo $row['news_id']; ?>" name="id[]">
		          							<input style="width:80px;" class="form-control input-sm" type="number" name="sort[]" value="<?php echo $row['news_sort']; ?>">

		          							<?php
		          							if (empty($row['news_display'])||$row['news_display']==0) {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=news&action=news_hidden&id=<?php echo $row['news_id'] ?>&status=1">
			          								<span class="btn btn-sm btn-info">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														แสดง
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
		          							<?php
		          							}else {
		          							?>
		          								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=news&action=news_hidden&id=<?php echo $row['news_id'] ?>&status=0">
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
			      							if (empty($row['news_display_index'])||$row['news_display_index']==0) {
			      							?>
			      								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=news&action=news_hidden_m&id=<?php echo $row['news_id'] ?>&status=1">
			          								<span class="btn btn-sm btn-info">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														แนะนำ
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
			      							<?php
			      							}else {
			      							?>
			      								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=news&action=news_hidden_m&id=<?php echo $row['news_id'] ?>&status=0">
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
												<a class="green" href="main.php?module=news&action=news_editfm&id=<?php echo $row['news_id']; ?>"><i class="ace-icon fa fa-pencil"></i></a>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="red" href="main.php?module=news&action=news_delete&id=<?php echo $row['news_id']; ?>&cover=<?php echo $row['news_pic']; ?>"><i class="ace-icon fa fa-trash-o"></i></a>
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

function news_bkdleall() {
	if (!empty($_POST['chkall'])) {
		foreach ($_POST['chkall'] as $value) {

			$result_news=mysql_query("SELECT news_pic FROM news WHERE news_id='".$value."'") or die(mysql_error());
			$row = mysql_fetch_array($result_news);
			@unlink("../upload/pic_news/$row[news_pic]");

			$query="DELETE FROM news WHERE news_id='".$value."'";
			mysql_query($query) or die(mysql_error());

			$result_news_gal=mysql_query("SELECT * FROM news_gallery WHERE news_id='".$value."'") or die(mysql_error());
			while ($row_news_gal = mysql_fetch_array($result_news_gal)) {
				$sqlnewsGal="DELETE FROM news_gallery WHERE newsgal_id='".$row_news_gal['newsgal_id']."'";
				mysql_query($sqlnewsGal) or die(mysql_error());
				@unlink("../upload/pic_news/$row_news_gal[newsgal_name]");
			}
		}
	}

	if (!empty($_POST['id'])) {
		$b=0;
		foreach ($_POST['id'] as  $value) {
		  	$query="UPDATE news SET news_sort='".$_POST['sort'][$b]."' WHERE news_id='".$value."'";
		  	mysql_query($query) or die(mysql_error());
			$b++;
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_index'</script>";
}

function news_delete() {
	if (!empty($_GET['id'])) {
		@unlink("../upload/pic_news/$_GET[cover]");

		$sql_delete_news="DELETE FROM news WHERE news_id='".$_GET['id']."'";
		mysql_query($sql_delete_news) or die(mysql_error());

		$result_news_gal=mysql_query("SELECT * FROM news_gallery WHERE news_id='".$_GET['id']."'") or die(mysql_error());
		while ($row_news_gal = mysql_fetch_array($result_news_gal)) {
			$sqlnewsGal="DELETE FROM news_gallery WHERE newsgal_id='".$row_news_gal['newsgal_id']."'";
			mysql_query($sqlnewsGal) or die(mysql_error());
			@unlink("../upload/pic_news/$row_news_gal[newsgal_name]");
		}

		
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_index'</script>";
}

function news_add() {
?>
	<section class="content-header">
		<h1>เพิ่มข่าวสาร</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=news&action=news_index"> จัดการข่าวสาร</a></li>
			<li class="active">เพิ่มข่าวสาร</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">เพิ่มข่าวสาร</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=news&action=news_insert" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ข่าวสารเรื่อง</label>
							<div class="col-sm-10">
								<input type="text" placeholder="ข่าวสารเรื่อง" class="form-control" name="news_title" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดข่าวสาร</label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดข่าวสาร" class="form-control" name="news_title_detail" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="news_detail"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="news_cover" required>
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
										<input type="file" name="news_pic[]" multiple>
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

function news_insert() {
	$news_title = mysql_real_escape_string($_POST['news_title']);
	$news_title_detail = mysql_real_escape_string($_POST['news_title_detail']);
	$news_detail = $_POST['news_detail'];

	if ($_FILES['news_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['news_cover']['name']));
	    $piccover_tmp = $_FILES['news_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_news/$pic_cover");
	    }
	}else {
	    $pic_cover="";
	}


	$SQL_news="INSERT INTO news VALUES ('',
		'".$news_title."',
		'".$news_title_detail."',
		'".$news_detail."',
		'0','0','0','0','".$pic_cover."','".date("Y-m-d")."')";
	mysql_query($SQL_news) or die(mysql_error());


	$resultid=mysql_query("SELECT news_id FROM news ORDER BY news_id DESC") or die(mysql_error());
	list($id) = mysql_fetch_row($resultid);

	if ($_FILES['news_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['news_pic']['name'];
	    $picgal_tmp = $_FILES['news_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_news/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$id."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO news_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}

	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_index'</script>";
}

function news_editfm() {
	$result_news=mysql_query("SELECT * FROM news WHERE news_id='".$_GET['id']."'") or die(mysql_error());
	$row = mysql_fetch_array($result_news);
?>
	<section class="content-header">
		<h1>&nbsp;</h1>
		<ol class="breadcrumb">
			<li><a href="main.php?module=pageindex&action=pageindex_index"> หน้าหลัก</a></li>
			<li><a href="main.php?module=news&action=news_index"> จัดการข่าวสาร</a></li>
			<li class="active">แก้ไขข่าวสาร</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">แก้ไขข่าวสาร</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="main.php?module=news&action=news_edit&cover=<?php echo $row['news_pic']; ?>" data-toggle="validator" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ข่าวสารเรื่อง</label>
							<div class="col-sm-10">
								<input type="hidden" name="id" value="<?php echo $row['news_id']; ?>">
								<input type="text" placeholder="ข่าวสารเรื่อง" class="form-control" name="news_title" value="<?php echo $row['news_title']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียดข่าวสาร</label>
							<div class="col-sm-10">
								<input type="text" placeholder="รายละเอียดข่าวสาร" class="form-control" name="news_title_detail" value="<?php echo $row['news_title_detail']; ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รายละเอียด</label>
							<div class="col-sm-10">
								<textarea id="editor1" name="news_detail"><?php echo $row['news_detail']; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> รูปภาพหลัก </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="file" name="news_cover">
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
				                    	if (!empty($row['news_pic'])) {
				                    	?>
				                    		<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=news&action=news_delete_img&id=<?php echo $row['news_id']; ?>&pictype=cover&cover=<?php echo $row['news_pic']; ?>">
												<img width="120" src="../upload/pic_news/<?php echo $row['news_pic']; ?>">
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
										<input type="file" name="news_pic[]" multiple>
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
										$result_news_gal=mysql_query("SELECT * FROM news_gallery WHERE news_id='".$_GET['id']."'") or die(mysql_error());
										while ($row_news_gal = mysql_fetch_array($result_news_gal)) {
					                    	if (!empty($row_news_gal['newsgal_name'])) {
												?>
												<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=news&action=news_delete_img&id=<?php echo $row_news_gal['news_id'] ?>&idgal=<?php echo $row_news_gal['newsgal_id'] ?>&pictype=gallery&gallery=<?php echo $row_news_gal['newsgal_name'] ?>">
												<img width="120" src="../upload/pic_news/<?php echo $row_news_gal['newsgal_name']; ?>">
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

function news_delete_img() {
	if (!empty($_GET['pictype'])) {
		if ($_GET['pictype']=="cover") {
			$sqlnews="UPDATE news SET news_pic='' WHERE news_id='".$_GET['id']."'";
			mysql_query($sqlnews) or die(mysql_error());
			@unlink("../upload/pic_news/$_GET[cover]");
		}elseif ($_GET['pictype']=="gallery") {
			$sqlnewsGal="DELETE FROM news_gallery WHERE newsgal_id='".$_GET['idgal']."'";
			mysql_query($sqlnewsGal) or die(mysql_error());
			@unlink("../upload/pic_news/$_GET[gallery]");
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_editfm&id=".$_GET['id']."'</script>";
}

function news_edit() {
	$news_title = mysql_real_escape_string($_POST['news_title']);
	$news_title_detail = mysql_real_escape_string($_POST['news_title_detail']);
	$news_detail = $_POST['news_detail'];

	if ($_FILES['news_cover']['tmp_name']) {
	    $pic_cover = md5(time()).".".end(explode(".",$_FILES['news_cover']['name']));
	    $piccover_tmp = $_FILES['news_cover']['tmp_name'];
	    if (!empty($pic_cover)) {
	      copy($piccover_tmp, "../upload/pic_news/$pic_cover");
	      @unlink("../upload/pic_news/$_GET[cover]");
	    }
		
	    $sqlCover=",news_pic='".$pic_cover."'";
	}else {
	    $sqlCover="";
	}

	$SQL_UPDATE_news="UPDATE news SET news_title='".$news_title."',
	news_title_detail='".$news_title_detail."',
	news_detail='".$news_detail."'$sqlCover WHERE news_id='".$_POST['id']."'";
	mysql_query($SQL_UPDATE_news) or die(mysql_error());

	if ($_FILES['news_pic']['name'][0]!="") {
	    $piccover_pic = $_FILES['news_pic']['name'];
	    $picgal_tmp = $_FILES['news_pic']['tmp_name'];
	    $sql="";
	    $i=0;
	    foreach ($piccover_pic as $key => $value) {
			$pic_gal = $key.md5(microtime()).".".end(explode(".",$value));
			copy($picgal_tmp[$i], "../upload/pic_news/$pic_gal");
			$i == 0 ? $st="" : $st=",";
			$sql .= "$st('','".$_POST['id']."','".$pic_gal."')";
			$i++;
	    }
		$querygal="INSERT INTO news_gallery VALUES $sql";
		mysql_query($querygal) or die(mysql_error());
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_editfm&id=$_POST[id]'</script>";
}

function news_hidden_m() {
	$SQL_DISPLAY_news="UPDATE news SET news_display_index='".$_GET['status']."' WHERE news_id='".$_GET['id']."'";
	mysql_query($SQL_DISPLAY_news) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_index'</script>";
}
function news_hidden() {
	$news_hid="UPDATE news SET news_display='".$_GET['status']."' WHERE news_id='".$_GET['id']."'";
	mysql_query($news_hid) or die(mysql_error());
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=news&action=news_index'</script>";
}
