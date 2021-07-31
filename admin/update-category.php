<?php include "header.php";
if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }
 ?>
 <?php

        
   if (isset($_POST['submit'])) {
     include"config.php";

    $cat_id= mysqli_real_escape_string($con,$_POST['cat_id']);      
     $cat_name= mysqli_real_escape_string($con,$_POST['cat_name']);
   
        $sql= mysqli_query($con,"UPDATE category SET category_name ='".$cat_name."' WHERE category_id='".$cat_id."'") or 
          die("Query Error");

                    
           if ($sql) {
                 header("Location:http://localhost/news-site/admin/category.php"); 
               } else{
                 
                 echo mysqli_error($con);                              
       
               }   
  
   }
   
 ?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                 <?php include "config.php";
                       
                    $cat_id =mysqli_real_escape_string($con,$_GET['id']);   

          $sql=mysqli_query($con,"select * from category where category_id='{$cat_id}'")or die("Query Error");

                  if (mysqli_num_rows($sql) > 0) {
                  
                     while ($row=mysqli_fetch_assoc($sql)) {
                  

                 ?>

                  <form action="<?php $_SERVER['PHP_SELF'];  ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['cat_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                       }
                     }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
