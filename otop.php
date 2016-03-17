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
        <div class="row head-news"><img src="img/head_otop.png"></div>
        <div class="col-lg-12">
          <?php
          $strSQL = "SELECT * FROM otop WHERE otop_display!='1'";
          $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
          $Num_Rows = mysql_num_rows($objQuery);

          $Per_Page = 6;   // Per Page

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

          $strSQL .=" ORDER BY otop_sort ASC, otop_id DESC LIMIT $Page_Start , $Per_Page";
          $objQuery  = mysql_query($strSQL);
          while ($row = mysql_fetch_array($objQuery)) {
          ?>
          <article>
             <div class="row">
                <div class="col-lg-2">
                    <img width="100%" src="upload/pic_otop/<?php echo $row['otop_pic']; ?>">
                </div>
                <div class="col-lg-10">
                    <time class="updated"><?php echo $row['otop_date']; ?></time>
                    <h3 class="entry-title"><a href="otop_detail.php?id=<?php echo $row['otop_id']; ?>"><?php echo $row['otop_title']; ?></a></h3>
                    <div class="entry-summary">
                        <p><?php echo $row['otop_title_detail']; ?><br>
                          <?php echo $row['otop_contact']; ?>
                        </p>
                    </div>
                </div>
              </div>
          </article>
          <hr>
          <?php } ?>
          
          <nav class="paget">
            <ul class="pagination">
                <?php
                if($Prev_Page) {
                ?>
                <li>
                    <a href="<?php echo $_SERVER['SCRIPT_NAME']."?Page=".$Prev_Page; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                }

                for($i=1; $i<=$Num_Pages; $i++){
                  if($i != $Page)
                  {
                    echo "<li><a href=\"$_SERVER[SCRIPT_NAME]?Page=$i'\">$i</a></li>";
                  }
                  else
                  {
                    echo "<li class='active'><a href=\"#\">$i</a></li>";
                  }
                }
                if($Page!=$Num_Pages)
                {
                ?>
                <li>
                    <a href="<?php echo $_SERVER['SCRIPT_NAME']."?Page=".$Next_Page; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php
                }
                ?>
                
            </ul>
          </nav>
          
        </div>
      </div>
    </div>

    <?php box_footer(); ?>

    <?php box_script(); ?>
  </body>
</html>