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
          <?php
          $strSQL = "SELECT * FROM activity WHERE activity_display!='1' && activity_display_index='1' ";
          $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
          $Num_Rows = mysql_num_rows($objQuery);

          $Per_Page = 5;   // Per Page

          @$Page = $_GET["Page"];
          if(@!$_GET["Page"])
          {
            $Page=1;
          }

          $Prev_Page = $Page-1;
          $Next_Page = $Page+1;

          $Page_Start = (($Per_Page*$Page)-$Per_Page);
          if($Num_Rows<=$Per_Page)
          {
            $Num_Pages =1;
          }
          else if(($Num_Rows % $Per_Page)==0)
          {
            $Num_Pages =($Num_Rows/$Per_Page) ;
          }
          else
          {
            $Num_Pages =($Num_Rows/$Per_Page)+1;
            $Num_Pages = (int)$Num_Pages;
          }

          $strSQL .=" ORDER BY activity_sort_index ASC, activity_id DESC LIMIT $Page_Start , $Per_Page";
          $objQuery  = mysql_query($strSQL);
          while ($row = mysql_fetch_array($objQuery)) {
          ?>
          <article>
            <div class="row">
              <div class="col-lg-2">
                <img width="100%" src="upload/pic_activity/<?php echo $row['activity_pic']; ?>">
              </div>
              <div class="col-lg-10">
                <time class="updated"><?php echo $row['activity_date']; ?></time>
                <h3 class="entry-title"><a href="activity_detail.php?id=<?php echo $row['activity_id']; ?>"><?php echo $row['activity_title']; ?></a></h3>
                <div class="entry-summary">
                  <p><?php echo $row['activity_title_detail']; ?></p>
                </div>
              </div>
            </div>
          </article>
          <hr>
          <?php } ?>

          <br><br>

        </div>
        
        <div class="row head-news"><img src="img/head_news.png"></div>
        <div class="col-lg-12">
          <?php
          $strSQL = "SELECT * FROM news WHERE news_display!='1' && news_display_index='1' ";
          $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
          $Num_Rows = mysql_num_rows($objQuery);

          $Per_Page = 5;   // Per Page

          @$Page = $_GET["Page"];
          if(@!$_GET["Page"])
          {
            $Page=1;
          }

          $Prev_Page = $Page-1;
          $Next_Page = $Page+1;

          $Page_Start = (($Per_Page*$Page)-$Per_Page);
          if($Num_Rows<=$Per_Page)
          {
            $Num_Pages =1;
          }
          else if(($Num_Rows % $Per_Page)==0)
          {
            $Num_Pages =($Num_Rows/$Per_Page) ;
          }
          else
          {
            $Num_Pages =($Num_Rows/$Per_Page)+1;
            $Num_Pages = (int)$Num_Pages;
          }

          $strSQL .=" ORDER BY news_sort_index ASC, news_id DESC LIMIT $Page_Start , $Per_Page";
          $objQuery  = mysql_query($strSQL);
          while ($row = mysql_fetch_array($objQuery)) {
          ?>
          <article>
            <div class="row">
              <div class="col-lg-2">
                <img width="100%" src="upload/pic_news/<?php echo $row['news_pic']; ?>">
              </div>
              <div class="col-lg-10">
                <time class="updated"><?php echo $row['news_date']; ?></time>
                <h3 class="entry-title"><a href="news_detail.php?id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?></a></h3>
                <div class="entry-summary">
                  <p><?php echo $row['news_title_detail']; ?></p>
                </div>
              </div>
            </div>
          </article>
          <hr>
          <?php } ?>


        </div>
      </div>
    </div>

    <?php box_footer(); ?>

    <?php box_script(); ?>
  </body>
</html>