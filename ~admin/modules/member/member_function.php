<?php
function member_index(){
?>
	<section class="content-header">
		<h1>สมาชิก</h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="#">Examples</a></li>
	      <li class="active">Blank page</li>
	    </ol>
  	</section>
  	<!-- Main content -->
  	<section class="content">
    	<!-- Default box -->
    	<div class="box">
	      	<div class="box-header with-border">
	        	<h3 class="box-title">รายการสมาชิก</h3>
	        	<div class="box-tools pull-right">
	          		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	          		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	        	</div>
	      	</div>
      		<div class="box-body">
        		<table id="example1" class="table table-bordered table-hover">
					<thead>
					  	<tr>
							<th width="10%"><a href="#">เลือกทั้งหมด</a></th>
							<th width="20%">รหัสบัตรประชาชน</th>
							<th>ชื่อ - นามสกุล</th>
							<th width="20%">เบอร์โทร</th>
							<th width="10%">#</th>
					  	</tr>
					</thead>
					<tbody>
			  			<tr>
						    <td><input type="checkbox"></td>
						    <td>Internet Explorer 4.0</td>
						    <td>Win 95+</td>
						    <td> 4</td>
						    <td>
						    	<a href="#"><span class="glyphicon glyphicon-list-alt"></span></a> | 
						    	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | 
						    	<a href="#"><span class="glyphicon glyphicon-trash"></span></a>
						    </td>
					  	</tr>
					</tbody>
				</table>
      		</div><!-- /.box-body -->
    	</div><!-- /.box -->
  	</section>
<?php
}

function member_add(){
?>
	<section class="content-header">
		<h1>สมาชิก</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">เพิ่มสมาชิก</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        	<div class="row">
            <div class="col-lg-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">เพิ่มสมาชิก</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">เพิ่มพนักงาน</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  	<form class="form-horizontal">
                    <div class="row">
                    	<div class="form-group">
	                      <label class="col-sm-2 control-label">รหัส</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="กรอกรหัส 7 ตัว">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ชื่อผู้ใช้</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รหัสผ่าน</label>
	                      <div class="col-sm-10">
	                        <input type="password" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ยืนยันรหัสผ่าน</label>
	                      <div class="col-sm-10">
	                        <input type="password" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">วันเกิด</label>
	                      <div class="col-sm-10">
	                        <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
			                    </div>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ที่อยู่</label>
	                      <div class="col-sm-10">
	                      	<input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">จังหวัด</label>
	                      <div class="col-sm-10">
	                      	<select class="form-control">
		                        <option>option 1</option>
		                        <option>option 2</option>
		                        <option>option 3</option>
		                        <option>option 4</option>
		                        <option>option 5</option>
		                      </select>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">อำเภอ</label>
	                      <div class="col-sm-10">
	                      	<select class="form-control">
		                        <option>option 1</option>
		                        <option>option 2</option>
		                        <option>option 3</option>
		                        <option>option 4</option>
		                        <option>option 5</option>
		                      </select>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ตำบล</label>
	                      <div class="col-sm-10">
	                      	<select class="form-control">
		                        <option>option 1</option>
		                        <option>option 2</option>
		                        <option>option 3</option>
		                        <option>option 4</option>
		                        <option>option 5</option>
		                      </select>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รหัสไปรษณี</label>
	                      <div class="col-sm-10">
	                      	<input type="number" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">เบอร์โทร</label>
	                      <div class="col-sm-10">
	                      	<input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">อีเมล</label>
	                      <div class="col-sm-10">
	                      	<input type="email" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รูปภาพ</label>
	                      <div class="col-sm-10">
	                      	<input type="file">
                      		<p class="help-block">Example block-level help text here.</p>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">&nbsp;</label>
	                      <div class="col-sm-10">
	                      	<div class="row">
	                      		<div class="col-sm-3">
	                      			<button class="btn btn-block btn-primary">บันทึกข้อมูล</button>
	                      		</div>
	                      		<div class="col-sm-3">
	                      			<button class="btn btn-block btn-default">ล้างค่า</button>
	                      		</div>
	                      	</div>
	                      </div>
	                    </div>
	                  </div>
	                </form>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  	<form class="form-horizontal">
                    <div class="row">

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ชื่อผู้ใช้</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รหัสผ่าน</label>
	                      <div class="col-sm-10">
	                        <input type="password" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ยืนยันรหัสผ่าน</label>
	                      <div class="col-sm-10">
	                        <input type="password" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">วันเกิด</label>
	                      <div class="col-sm-10">
	                        <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
			                    </div>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ที่อยู่</label>
	                      <div class="col-sm-10">
	                      	<input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">จังหวัด</label>
	                      <div class="col-sm-10">
	                      	<select class="form-control">
		                        <option>option 1</option>
		                        <option>option 2</option>
		                        <option>option 3</option>
		                        <option>option 4</option>
		                        <option>option 5</option>
		                      </select>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">อำเภอ</label>
	                      <div class="col-sm-10">
	                      	<select class="form-control">
		                        <option>option 1</option>
		                        <option>option 2</option>
		                        <option>option 3</option>
		                        <option>option 4</option>
		                        <option>option 5</option>
		                      </select>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">ตำบล</label>
	                      <div class="col-sm-10">
	                      	<select class="form-control">
		                        <option>option 1</option>
		                        <option>option 2</option>
		                        <option>option 3</option>
		                        <option>option 4</option>
		                        <option>option 5</option>
		                      </select>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รหัสไปรษณี</label>
	                      <div class="col-sm-10">
	                      	<input type="number" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">เบอร์โทร</label>
	                      <div class="col-sm-10">
	                      	<input type="text" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">อีเมล</label>
	                      <div class="col-sm-10">
	                      	<input type="email" class="form-control" placeholder="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">รูปภาพ</label>
	                      <div class="col-sm-10">
	                      	<input type="file">
                      		<p class="help-block">Example block-level help text here.</p>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">&nbsp;</label>
	                      <div class="col-sm-10">
	                      	<div class="row">
	                      		<div class="col-sm-3">
	                      			<button class="btn btn-block btn-primary">บันทึกข้อมูล</button>
	                      		</div>
	                      		<div class="col-sm-3">
	                      			<button class="btn btn-block btn-default">ล้างค่า</button>
	                      		</div>
	                      	</div>
	                      </div>
	                    </div>
	                  </div>
	                	</form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
          </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section>
<?php
}
?>