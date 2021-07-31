<?php include "header.php";
 

 if($_SESSION["user_role"] == 0) {
          include"config.php";
          $post_id =mysqli_real_escape_string($con,$_GET['id']);   
      $sql2= mysqli_query($con,"select author from post where post_id='".$post_id."'")or 
              die("sql 2 Query Error");     
      
          $res=mysqli_fetch_assoc($sql2);     
       
       if ($res['author']!=$_SESSION['user_id']) {
         
         header("location:http://localhost/news-site/admin/post.php"); 
       }
                               
      }


 ?>




<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
      <?php include "config.php";
                       
        $post_id =mysqli_real_escape_string($con,$_GET['id']);   

  $sql=mysqli_query($con,"select post.post_id,post.title,post.description,post.post_img,
                                post.category,category.category_name
                           from post left join category ON post.category = category.category_id left join user ON post.author = user.user_id  where post.post_id='".$post_id."'")or die("Query Error "); 
       //echo $sql;
       //die();
                  if (mysqli_num_rows($sql) > 0) {
                  
                     while ($row=mysqli_fetch_assoc($sql)) {

                 ?>

        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'];?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title'];?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                    <?php echo $row['description'];?>
                   <?php /*Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation */ ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                  <option  disabled> Select Category</option>
                               <?php
                                  include "config.php";
                                  
                                  $sql1 =mysqli_query($con,"select * from category")or die("Query Error");
                                     
                                     if (mysqli_num_rows($sql1)>0) {
                                      
                                          while ($row1=mysqli_fetch_assoc($sql1)) {
                                          
                                          if ($row['category']==$row1['category_id']) {
                                              $selected="selected";
                                          }else{
                                            
                                            $selected=""; 
                                          }
                                         echo"<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                                          }
                                     }
                               ?>
 
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                 
                <img  src="upload/<?php echo $row['post_img'];?>" height="250px">
                <input type="hidden" name="old_image" value="<?php echo $row['post_img'];?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php
         }
         }else{

             echo "<div class='alert alert-danger' role='alert'>
                      Result Not Found...
                         </div>";
         }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>