<?php
function pageindex_index() {
?>

	<section class="content-header">
		<h1>จัดการภาพเคลื่อนไหว </h1>
		<ol class="breadcrumb">
			<li class="active">หน้าหลัก </li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">จัดการภาพเคลื่อนไหว </h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-xm-12">
					<form class="form-horizontal" method="post" action="main.php?module=pageindex&action=insert_fade" enctype="multipart/form-data">
						<div class="form-group" style="margin-bottom: -20px;">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> เพิ่มภาพเคลื่อนไหว </label>
							<div class="col-sm-10">
								<div class="form-group">
									<div class="col-xs-12">
										<input class="btn-default btn-xs" type="file" accept="image/gif, image/jpeg, image/png" name="filefade[]" multiple>
										<p class="help-block">*select more than one photo and size 1370 x 450.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-10">
								<button class="btn btn-sm btn-info btn-flat pull-left">ยืนยัน</button><br>
							</div>
						</div>
			        </form>
				</div>
				<div class="col-xm-12">
					<div class="col-xm-12">
						<form method="post" action="main.php?module=pageindex&action=fade_bkdleall">
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
												<a href="main.php?module=pageindex&action=pageindex_index&chkall=<?php echo $chknum; ?>">
													ALL
												</a>
											</th>
						                    <th>รูปภาพ</th>
						                    <th width="100">ลำดับ</th>
						                    <th width="30">#</th>
				                  		</tr>
				                	</thead>
				                	<tbody>
				                  		<?php
				                  		$result=mysql_query("SELECT * FROM fade ORDER BY fade_sort ASC") or die(mysql_error());
				                  		while(list($fade_id,$fade_name,$fade_sort) = mysql_fetch_row($result)){
				                  		?>
				                  		<tr>
				                    		<td class="text-center">
				                    			<label class="pos-rel">
													<input type="checkbox" class="ace" name="chkall[]" value="<?php echo $fade_id; ?>" <?php echo $chkall; ?>>
													<span class="lbl"></span>
												</label>
				                    		</td>
				                    		<td><img src="../upload/pic_fade/<?php echo $fade_name; ?>" height="40"></td>
				                    		<td>
				                      			<input type="hidden" value="<?php echo $fade_id; ?>" name="id[]">
				                      			<input style="width:100%" class="form-control input-sm" type="number" name="sort[]" value="<?php  echo $fade_sort; ?>">
				                    		</td>
				                    		<td>
				                     			<a onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" href="main.php?module=pageindex&action=fade_delete&id=<?php echo $fade_id; ?>&fadename=<?php echo $fade_name; ?>"><span class="glyphicon glyphicon-trash"></span></a>
				                    		</td>
				                  		</tr>
				                  		<?php } ?>
				                	</tbody>
				              	</table>
				              	<table>
				                	<tr>
				                  		<td><button onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="btn btn-block btn-danger btn-sm" style="width:100px">Delete</button></td>
				                  		<td>&nbsp;</td>
				                  		<td><button onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" class="btn btn-block btn-success btn-sm" style="width:130px">confirm sort</button></td>
				                	</tr>
				              	</table>
				            </div>
			            </form>
					</div>
				</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				&nbsp;
			</div><!-- /.box-footer-->
		</div><!-- /.box -->

		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">จัดการภาพเคลื่อนไหว </h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-xm-12">
					<form method="post" action="main.php?module=pageindex&action=activity_bkdleall_m">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center" width="7%">
											&nbsp;
										</th>
										<th>ความรู้</th>
										<th>ลำดับ/สถานะ</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									$result_activity=mysql_query("SELECT * FROM activity WHERE activity_display_index='1' ORDER BY activity_sort_index ASC") or die(mysql_error());
				                	while ($row = mysql_fetch_array($result_activity)) {
				                	?>
									<tr role="row">
										<td class="center">
											<?php echo $i; ?>
										</td>
										<td><?php echo $row['activity_name']; ?></td>
										<td>
											<input type="hidden" value="<?php echo $row['activity_id']; ?>" name="id[]">
		          							<input style="width:80px;" class="form-control input-sm" type="number" name="sort[]" value="<?php echo $row['activity_sort_index']; ?>">

		          							<?php
			      							if (empty($row['activity_display_index'])||$row['activity_display_index']==0) {
			      							?>
			      								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=activity&action=activity_hidden_m&id=<?php echo $row['activity_id'] ?>&status=1">
			          								<span class="btn btn-xs btn-info" style="margin-top: -6px;">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														โปรแนะนำ
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
			      							<?php
			      							}else {
			      							?>
			      								<a onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" href="main.php?module=activity&action=activity_hidden_m&id=<?php echo $row['activity_id'] ?>&status=0">
			          								<span class="btn btn-xs btn-danger" style="margin-top: -6px;">
														<i class="ace-icon fa fa-bolt bigger-110"></i>
														ไม่แนะนำ
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</span>
			          							</a>
			      							<?php
			      							}
			      							?>
										</td>
									</tr>
									<?php $i++; } ?>
								</tbody>
							</table>
							<table>
					            <tbody>
					            	<tr>
					            		<td><button onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" class="btn btn-block btn-success btn-xs" style="width:130px">confirm sort</button></td>
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

function fade_bkdleall(){
	if (!empty($_POST['chkall'])) {

		foreach ($_POST['chkall'] as  $value) {
			$query="DELETE FROM fade WHERE fade_id='".$value."'";
			mysql_query($query) or die(mysql_error());
		}
	}

	if (!empty($_POST['id'])) {
		$b=0;
		foreach ($_POST['id'] as  $value) {
			$query="UPDATE fade SET fade_sort='".$_POST['sort'][$b]."' WHERE fade_id='".$value."'";
			mysql_query($query) or die(mysql_error());
			$b++;
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=pageindex&action=pageindex_index'</script>";
}

function insert_fade(){
	if ($_FILES['filefade']['name'][0]!="") {
		$typegallery_pic = $_FILES['filefade']['name'];
		$typegallery_tmp = $_FILES['filefade']['tmp_name'];
		$sql="";
		$i=0;
		foreach ($typegallery_pic as $key => $value) {
		  	$pic = $key.md5(microtime()).".".end(explode(".",$value));
		  	copy($typegallery_tmp[$i], "../upload/pic_fade/$pic");
		  	$i == 0 ? $st="" : $st=",";
		  	$sql .= "$st('','".$pic."','0')";
		  	$i++;
		}
		$query="INSERT INTO fade VALUES $sql";
		mysql_query($query) or die(mysql_error());
		mysql_close();
	}
	echo "<script language='javascript'>window.location='main.php?module=pageindex&action=pageindex_index'</script>";
}

function fade_delete(){
	$id=$_GET['id'];
	$query="DELETE FROM fade WHERE fade_id='".$id."'";
	@unlink("../upload/pic_fade/$_GET[fadename]");
	mysql_query($query) or die(mysql_error());

	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=pageindex&action=pageindex_index'</script>";
}

function activity_bkdleall_m() {
	if (!empty($_POST['chkall'])) {
		foreach ($_POST['chkall'] as $value) {
			$query="UPDATE activity SET activity_display_index='0' WHERE activity_id='".$value."'";
			mysql_query($query) or die(mysql_error());
		}
	}

	if (!empty($_POST['id'])) {
		$b=0;
		foreach ($_POST['id'] as  $value) {
		  	$query="UPDATE activity SET activity_sort_index='".$_POST['sort'][$b]."' WHERE activity_id='".$value."'";
		  	mysql_query($query) or die(mysql_error());
			$b++;
		}
	}
	mysql_close();
	echo "<script language='javascript'>window.location='main.php?module=pageindex&action=pageindex_index'</script>";
}

?>