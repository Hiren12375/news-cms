<?php
include "config.php";

if(isset($_FILES['fileToUpload'])){

  $errors=array();

  $file_name = $_FILES['fileToUpload']['name'];
  $file_size = $_FILES['fileToUpload']['size'];
  $temp_name = $_FILES['fileToUpload']['tmp_name'];
  $file_type = $_FILES['fileToUpload']['type'];
  $results = explode('.', $file_name);
   $file_ext=end($results);
  //$file_ext=strtolower($txt);
  $extenction = array("jpeg","png","jpg");

  if(in_array($file_ext,$extenction)===false){

  	$errors[]="This File Type is not Allowed Please Enter jpg,png File";

  }

   if ($file_size>2097152) {
   	
   		$errors[]="File Size Must be less then 2 MB";
   }

       if (empty($errors)==true) {
       	
       	   move_uploaded_file($temp_name,"upload/".$file_name);
       }else{

       	print_r($errors);
       	die();
       }
}

$title= mysqli_real_escape_string($con,$_POST['post_title']);
$description= mysqli_real_escape_string($con,$_POST['postdesc']);
$category= mysqli_real_escape_string($con,$_POST['category']);
$date= date("d m,Y");

 session_start();
$author=$_SESSION['user_id'];


   $sql="insert into post(title ,description,category,post_date,author,post_img)values
   ('{$title}','{$description}','{$category}','{$date}',{$author},'{$file_name}');";
   $sql.= "update category set post = post + 1 where category_id ='{$category}'"; 

     if(mysqli_multi_query($con,$sql)){

         header("Location:http://localhost/news-site/admin/post.php");
     }else{

     /*	echo "<div class='alert alert-success' role='alert'>
                  Error ... 
                </div>";*/
        echo mysqli_error($con);
     }

?>