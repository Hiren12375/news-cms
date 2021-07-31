<?php
  if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }

   include "config.php";

     $user_id= mysqli_real_escape_string($con,$_GET['id']); 
  
   $sql=mysqli_query($con, "delete from user where user_id='".$user_id."'")or 
   die("Query Error");

     if ($sql) {
               header("Location:http://localhost/news-site/admin/users.php");
 

            }else{

     	echo mysqli_error($con);
     }
?>