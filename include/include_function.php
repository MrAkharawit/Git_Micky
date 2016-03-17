<?php
function box_header() {
  include('~admin/class/connect_db.php')
?>
	<header>
      <div class="container">
        <div class="col-lg-12 rrd">
          logo-tel
        </div>
        <div class="col-lg-12">
          <!-- Slideshow 1 -->
          <div class="row">
            <ul class="rslides" id="slider">
              <li><img src="img/1.png" alt=""></li>
              <li><img src="img/2.png" alt=""></li>
            </ul>
          </div>
          
        </div>
        
      </div>
    </header>
<?php
}

function box_link() {
?>
	<!-- Bootstrap -->
    <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="asset/dist/css/style.css">
    <link rel="stylesheet" type="text/css" href="asset/responsiveslides/responsiveslides.css">
    <link rel="stylesheet" href="asset/lightbox/css/lightbox.css">
<?php
}

function box_menu() {
?>
	<nav id="nav-origi">
        <img src="img/nav-origi.png">
        <ul>
          <li><a href="index.php">หน้าแรก</a></li>
          <li><a href="activity.php">กิจกรรม</a></li>
          <li><a href="news.php">ข่าวสาร</a></li>
          <li><a href="contact.php">ติดต่อเรา</a></li>
        </ul>
      </nav>

     <div class="row">
        <nav class="navbar navbar-default" id="nav-res">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">หน้าแรก</a></li>
                <li><a href="#">กิจกรรม</a></li>
                <li><a href="#">ข่าวสาร</a></li>
                <li><a href="#">ติดต่อเรา</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
     </div>
<?php
}

function box_menu_left() {
?>
  <div class="col-lg-3 menu_left">
    <a href="~admin/"><img src="img/pic2.png"></a>
    <a href="travel.php"><img src="img/pic1.png"></a>
    <a href="tambon.php"><img src="img/pic3.png"></a>
    <a href="otop.php"><img src="img/pic4.png"></a>
  </div>
<?php
}

function box_script() {
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="asset/bootstrap/js/bootstrap.min.js"></script>
  <script src="asset/lightbox/js/lightbox-plus-jquery.min.js"></script>
  <script src="asset/lightbox/js/lightbox.min.js"></script>
  <script src="asset/responsiveslides/responsiveslides.min.js"></script>
  <script src="asset/js/script.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
<?php
}

function box_footer() {
?>
	<footer>
    &nbsp;
  </footer>
<?php
}
?>