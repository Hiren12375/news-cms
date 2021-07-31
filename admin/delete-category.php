<?php
  if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }

   include "config.php";

     $cat_id= mysqli_real_escape_string($con,$_GET['id']); 
  
   $sql=mysqli_query($con, "delete from category where category_id='".$cat_id."'")or 
   die("Query Error");

     if ($sql) {
               header("Location:http://localhost/news-site/admin/category.php");
 

            }else{

     	echo mysqli_error($con);
     }
?>