<?php
  include"config.php";
if(empty($_FILES['new_image']['name'])){
    
   $file_name=$_POST['old_image'];
  }else{
   
   $errors=array();

  $file_name = $_FILES['new_image']['name'];
  $file_size = $_FILES['new_image']['size'];
  $temp_name = $_FILES['new_image']['tmp_name'];
  $file_type = $_FILES['new_image']['type'];
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
  
$sql=mysqli_query($con,"update post set title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}', category='{$_POST['category']}', post_img='{$_POST["file_name"]}' where post_id='{$_POST["post_id"]}'");

if ($sql) {
	
	header("Location:http://localhost/news-site/admin/post.php"); 
}else{

	echo mysqli_error($con);
}
  

?>