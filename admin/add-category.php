<?php include "header.php"; 

if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }

?>

    <?php

       include "config.php";

       if (isset($_POST['save'])) {
         
      $category=mysqli_real_escape_string($con,$_POST['cat']);
      $post=mysqli_real_escape_string($con,$_POST['post']);
     $sql=mysqli_query($con,"insert into category(category_name,post ) values('".$category."','".$post."') ")or mysqli_error($con);
        
       if ($sql) {
        
            echo "<div class='alert alert-success' role='alert'>
                 SuccessFully Inserted Record... 
                </div>";
        
       }else{

               echo mysqli_error($con);  

       }

       }


    ?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'];  ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <div class="form-group">
                          <label>No Of Post</label>
                          <input type="text" name="post" class="form-control" placeholder="Category Name" value="0" required>
                      </div>
                      
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
