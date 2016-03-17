<?php
function customer_index(){
?>
	<section class="content-header">
			<h1>พนักงาน</h1>
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
          <h3 class="box-title">รายการพนักงาน</h3>
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
?>