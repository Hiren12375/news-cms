<?php
  
  include "config.php";

   $post_id=$_GET['id'];
   $cat_id=$_GET['cat_id'];

  $sqli=mysqli_query($con,"select * from post where post_id='".$post_id."'")or die("Image Query Error");
  $row=mysqli_fetch_assoc($sqli);

  unlink("upload/".$row['post_img']);

   $sql = "delete from post where post_id ='".$post_id."';";
   $sql.= "UPDATE category SET post = post-1 WHERE cat_id='".$cat_id; 

   if (mysqli_multi_query($con,$sql)) {

     header("location:http://localhost/news-site/admin/post.php");
   }else{

   	echo mysqli_error($con);
   }
?>