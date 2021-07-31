<?php include "header.php"; 
   if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }


   if(isset ($_POST['submit'])){
     include "config.php";
    
    $user_id= mysqli_real_escape_string($con,$_POST['user_id']);      
    $f_name= mysqli_real_escape_string($con,$_POST['f_name']);
    $l_name=mysqli_real_escape_string ($con,$_POST['l_name']);
    $username=mysqli_real_escape_string ($con,$_POST['username']);
    $role=mysqli_real_escape_string ($con,$_POST['role']);
   
    $sql= mysqli_query($con,"UPDATE `user` SET first_name ='".$f_name."',last_name ='".$l_name."',username ='".$username."',role='".$role."' WHERE user_id='".$user_id."'") or 
          die("Query Error");

                    
           if ($sql) {
               echo "<div class='alert alert-success' role='alert'>
                 SuccessFully Update  Record... 
                </div>";
                 
                 //header("Location:http://localhost/news-site/admin/users.php");
 
               
               } else{
                 
                 echo mysqli_error($con);                              
       
               }   
      
   }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php include "config.php";
                       
                    $user_id =mysqli_real_escape_string($con,$_GET['id']);   

                  $sql= mysqli_query($con,"select * from user where user_id='".$user_id."'")or die("Query Error");
                  
                  if (mysqli_num_rows($sql) > 0) {
                  
                     while ($row=mysqli_fetch_assoc($sql)) {
                  

                 ?>


                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'];?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                    <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                              <?php

                               if ($row['role']==1){
                                    echo"<option value='0'>normal User</option>
                                        <option value='1'selected>Admin</option>";
                              }else{

                              echo"<option value='0'selected>normal User</option>
                                   <option value='1'>Admin</option>";
                              }
                               ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php 
                   }

                   }

                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
