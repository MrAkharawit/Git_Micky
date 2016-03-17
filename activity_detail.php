<?php
include("include/include_function.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>v.1</title>

    <?php  box_link(); ?>
  </head>
  <body>
    <?php box_header(); ?>

    <div class="container">
      <?php box_menu(); ?>
    </div>

    <div class="container">
      <?php box_menu_left(); ?>

      <div class="col-lg-9">
        <div class="row head-news"><img src="img/head_acti.png"></div>
        <div class="col-lg-12">
          <div class="row">

            <?php
            $result_activity=mysql_query("SELECT * FROM activity WHERE activity_id='".$_GET['id']."'") or die(mysql_error());
            $row = mysql_fetch_array($result_activity);
            ?>
            <div class="col-lg-12 txt_detail">
              <time class="updated"><?php echo $row['activity_date']; ?></time>
              <h3 class="entry-title"><?php echo $row['activity_title']; ?></h3>
              <div class="entry-summary">
                <?php echo $row['activity_detail']; ?>
              </div>
              <div class="row">
                
                <?php
                $result_activity_gal=mysql_query("SELECT * FROM activity_gallery WHERE activity_id='".$_GET['id']."'") or die(mysql_error());
                while ($row_activity_gal = mysql_fetch_array($result_activity_gal)) {
                  if (!empty($row_activity_gal['activitygal_name'])) {
                    ?>
                    <div class="col-sm-3 col-xs-6 tvpic">
                      <a class="example-image-link" data-lightbox="example-set" href="upload/pic_activity/<?php echo $row_activity_gal['activitygal_name']; ?>">
                        <img width="100%" src="upload/pic_activity/<?php echo $row_activity_gal['activitygal_name']; ?>">
                      </a>
                    </div>
                <?php }} ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php box_footer(); ?>

    <?php box_script(); ?>
  </body>
</html>