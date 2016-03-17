<?php session_start();
include("class/connect_db.php");
include("include/function.php");
include("modules/home/home_function.php");
include("modules/depositmoney/depositmoney_function.php");
include("modules/customer/customer_function.php");
include("modules/member/member_function.php");

include("modules/pageindex/pageindex_function.php");
include("modules/activity/activity_function.php");
include("modules/news/news_function.php");
include("modules/travel/travel_function.php");
include("modules/otop/otop_function.php");
include("modules/contact/contact_function.php");

$module=empty($_GET['module'])?"":$_GET['module'];
$action=empty($_GET['action'])?"":$_GET['action'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="asset/plugins/datatables/dataTables.bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="asset/dist/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="asset/index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="asset/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="main.php?module=home&action=home_index"><i class="fa fa-book"></i> <span>หน้าหลัก</span></a></li>
            <li><a href="main.php?module=depositmoney&action=depositmoney_index"><i class="fa fa-book"></i> <span>ฝากเงิน / ถอนเงิน</span></a></li>
            <li><a href="main.php?module=depositmoney&action=depositmoney_interest"><i class="fa fa-book"></i> <span>รายการดอกเบี้ย</span></a></li>
            <li><a href="main.php?module=depositmoney&action=depositmoney_confirm"><i class="fa fa-book"></i> <span>รายงาน (งวด)</span></a></li> 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>จัดการสมาชิก</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="main.php?module=member&action=member_index"><i class="fa fa-circle-o"></i> สมาชิก</a></li>
                <li><a href="main.php?module=member&action=member_add"><i class="fa fa-circle-o"></i> เพิ่มสมาชิก</a></li>
                <li><a href="main.php?module=customer&action=customer_index"><i class="fa fa-circle-o"></i> พนักงาน</a></li>
              </ul>
            </li>

            <li class="header">จัดการหน้าบ้าน</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-tv"></i>
                <span>จัดการหน้าบ้าน</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="main.php?module=pageindex&action=pageindex_index"><i class="fa fa-cogs text-aqua"></i> <span>จัดการหน้าหลัก</span></a></li>
                <li><a href="main.php?module=activity&action=activity_index"><i class="fa fa-globe text-aqua"></i> <span>จัดการกิจกรรม</span></a></li>
                <li><a href="main.php?module=news&action=news_index"><i class="fa fa-newspaper-o text-aqua"></i> <span>จัดการข่าวสาร</span></a></li>
                <li><a href="main.php?module=travel&action=travel_index"><i class="fa fa-automobile text-aqua"></i> <span>จัดการสถานที่ท่องเที่ยว</span></a></li>
                <li><a href="main.php?module=otop&action=otop_index"><i class="fa fa-circle-o text-aqua"></i> <span>จัดการสินค้า OTOP</span></a></li>
              </ul>
            </li>

            <li><a href="main.php?module=contact&action=contact_index"><i class="fa fa-commenting"></i> <span>ติดต่อเรา</span></a></li> 
          
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
        if(!empty($module)){
            getmodules($module,$action);
        }
        ?>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

    <!-- jQuery 2.1.4 -->
    <script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/editor/ckeditor.js"></script>
    <!-- DataTables -->
    <script src="asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="asset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="asset/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="asset/dist/js/demo.js"></script>
    <script src="asset/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- InputMask -->
    <script src="asset/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        //Datemask dd/mm/yyyy
        $("[data-mask]").inputmask();
      });

      $(function(){
        CKEDITOR.replace( 'editor1', { skin : 'moono', toolbar : [ ['Paste','Source','-','Templates','-','Maximize','-','FontSize','Font','Table','-','Bold','Italic','Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','TextColor','BGColor','-','Outdent','Indent','-','Link','-','Image','-','NumberedList','-','BulletedList'] ], });
        CKEDITOR.replace( 'editor2', { skin : 'moono', toolbar : [ ['Paste','Source','-','Templates','-','Maximize','-','FontSize','Font','Table','-','Bold','Italic','Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','TextColor','BGColor','-','Outdent','Indent','-','Link','-','Image','-','NumberedList','-','BulletedList'] ], });
      });
    </script>
  </body>
</html>
