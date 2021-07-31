<?php

/*echo "<pre>";
 print_r($_SERVER);
 echo "</pre>";
 

include"config.php";
 $page=basename($_SERVER['PHP_SELF']);

switch ($page) {
    case "single.php":
        if (isset($_GET['id'])) {
      $sql_title=mysqli_query($con,"select * from post where post_id={$_GET['id']}")or die("title Query Error");
        $row_title=mysqli_fetch_assoc($sql_title);
         $title=$row_title['title'];
        }else{
          $title="No Record Found";
        }
        break;
    
    default:
        # code...
        break;
}
  */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php  ?> News </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                 include"config.php";
                     
                     if (isset($_GET['cid'])) {
                         $cat_id=$_GET['cid'];
                     }
                      //$cat_id=$_GET['cid'];
                     $sql=mysqli_query($con,"select * from category where post > 0 ")or 
                                        die(" category Query  Error ");

                     if (mysqli_num_rows($sql)>0) {
                     $active="";    
         
                ?>

                <ul class='menu'>
                    
                   <li><a href='<?php echo "http://localhost/news-site/index.php"?>'>Home</a></li>

                    <?php while($row=mysqli_fetch_assoc($sql)) { 
                         if (isset($_GET['cid'])) {
                            if ($row['category_id']==$cat_id) {
                                    
                                   $active="active"; 
                                 } 
                                 else{
                                 $active=""; 

                                }     
                         }  

                echo"<li><a class='{$active}' href='category?cid={$row['category_id']}'>{$row['category_name']}</a></li>";         
                   }
                ?>
                </ul>
                <?php
                 }                 
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
