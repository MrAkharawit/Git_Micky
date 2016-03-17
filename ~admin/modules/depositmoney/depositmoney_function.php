<?php
function depositmoney_index(){
?>
	<section class="content-header">
      <h1>
        ฝากเงิน/ถอนเงิน
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-sm-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">รายการแสดง ฝากเงินและถอนเงิน</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12">
                  <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                      <input type="text" name="q" class="form-control" placeholder="ค้นหา...">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>

                  <table>
                    <tr>
                      <td>เลขที่บัญชี</td>
                      <td>&nbsp;</td>
                      <td>00001</td>
                    </tr>
                    <tr>
                      <td>ยอดคงเหลือ</td>
                      <td>&nbsp;</td>
                      <td>5000.00฿</td>
                    </tr>
                  </table>
                </div>
              </div>

              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>วันที่ / เวลา</th>
                    <th>จำนวนเงิน</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>11/11/56<br>03:00<br>ถอน/ฝาก</td>
                    <td>500.-</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>

        <div class="col-sm-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ฝากเงิน/ถอนเงิน</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">ฝากเงิน</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">ถอนเงิน</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">ผู้รับฝาก</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="พรเทพศรี" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">จำนวนเงิน</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" placeholder="กรอกเป็นตัวเลข">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">&nbsp;</label>
                          <div class="col-sm-8">
                            <button class="btn btn-block btn-primary">ยืนยัน</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">ผู้รับถอน</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="พรเทพศรี" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">จำนวนเงิน</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" placeholder="กรอกเป็นตัวเลข">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">&nbsp;</label>
                          <div class="col-sm-8">
                            <button class="btn btn-block btn-primary">ยืนยัน</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
<?php
}

function depositmoney_confirm() {
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
          <h3 class="box-title">ยืนยังพนักงาน</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th width="20%">งวดที่ / วันที่</th>
            <th>หมายเหตุ</th>
            <th width="15%">สถานะ</th>
            <th width="10%">#</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>11 / 11 june 2100</td>
              <td>Win 95+</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger btn-xs">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                  </ul>
                </div>
              </td>
              <td>
                <a href="index.php?module=depositmoney&action=depositmoney_list_detail"><span class="glyphicon glyphicon-list-alt"></span></a> | 
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

function depositmoney_list_detail() {
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
          <h3 class="box-title">งวดที่ 1 วันที่ 11 เมษายน 2558</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="10%">รหัสสมาชิก</th>
                <th>ชื่อ - นามสกุล</th>
                <th width="10%">ฝาก</th>
                <th width="10%">ถอน</th>
                <th width="12%">คงเหลือ</th>
                <th width="12%">ดอกเบี้ย</th>
                <th width="12%">คงเหลือสุทธิ</th>
                <th width="10%">#</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>0001 </td>
                <td>พรเทพศรี อาญาคำ</td>
                <td>100</td>
                <td> - </td>
                <td>500</td>
                <td>1</td>
                <td>501</td>
                <td>
                  <a href="index.php?module=depositmoney&action=depositmoney_index"><span class="glyphicon glyphicon-list-alt"></span></a> | 
                  <a href="#"><span class="glyphicon glyphicon-edit"></span></a> | 
                  <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>&nbsp;</th>
                <th>รวมทั้งหมด</th>
                <th>100</th>
                <th>100</th>
                <th>100</th>
                <th>100</th>
                <th>100</th>
                <th>&nbsp;</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section>
<?php
}

function depositmoney_interest() {
?>
  <section class="content-header">
    <h1>รายการดอกเบี้ย</h1>
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
          <h3 class="box-title">รายการดอกเบี้ย</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                <th width="10%">รหัส</th>
                <th>ชื่อ - นามสกุล</th>
                <th width="15%">เงินคงเหลือ</th>
                <th width="15%">ดอกเบี้ยรวม</th>
                <th width="15%">เงินคงเหลือสุทธิ</th>
                <th width="15%">#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td>0001</td>
                  <td>พรเทพศรี  อาญาคำ</td>
                  <td>100</td>
                  <td>100</td>
                  <td>100</td>
                  <td>
                    <a href="index.php?module=depositmoney&action=depositmoney_interest_detail">รายละเอียดเพิ่มเติม</a>
                  </td>
                </tr>
            </tbody>
          </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section>
<?php
}

function depositmoney_interest_detail() {
?>
  <section class="content-header">
    <h1>รายการดอกเบี้ย</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="row">
      <div class="col-sm-7">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">รายการดอกเบี้ย</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
                <table>
                  <tr>
                    <td>เลขที่บัญชี</td>
                    <td>&nbsp;</td>
                    <td>00001</td>
                  </tr>
                  <tr>
                    <td>ยอดคงเหลือ</td>
                    <td>&nbsp;</td>
                    <td>5000.00฿</td>
                  </tr>
                </table>
              </div>
            </div>

            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>วันที่ / เวลา</th>
                  <th>จำนวนเงิน</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>11/11/56<br>03:00<br>ดอกเบี้ย</td>
                  <td>500.-</td>
                </tr>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section>
<?php
}
?>