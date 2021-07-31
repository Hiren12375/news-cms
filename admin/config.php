
<?php
$con=mysqli_connect("localhost","root","");
 mysqli_select_db($con,"news_site");

//$con=mysqli_connect("localhost","root","");
// mysqli_select_db($con,"news_site");
 
  if ($con) {
   echo  mysqli_connect_error($con);
  
  }
 
 $hostname="http://localhost/news-site";



?>