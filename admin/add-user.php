<?php include "header.php"; 
   
    if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }


  if(isset($_POST['save'])){

  include "config.php";
           
    $f_name= mysqli_real_escape_string($con,$_POST['fname']);
    $l_name=mysqli_real_escape_string ($con,$_POST['lname']);
    $username=mysqli_real_escape_string ($con,$_POST['user']);
    $password=mysqli_real_escape_string ($con,md5($_POST['password']));
    $role=mysqli_real_escape_string ($con,$_POST['role']);
   
    $sql= mysqli_query($con,"select username FROM user where username='".$username."'") or 
          die("Query Error");

     if (mysqli_num_rows($sql)> 0 ) {
          
         echo "<div class='alert alert-danger' role='alert'>
             Username alredy Exist Please Correct Username 
             </div>";
        
  
          }else{
          
      $sql1= mysqli_query($con,"insert into user(first_name,last_name,username,password,role)
             values('".$f_name."','".$l_name."','".$username."','".$password."','".$role."')   
        ") ;
               
           if ($sql1) {
                 header("Location:http://localhost/news-site/admin/users.php");
                 echo "<div class='alert alert-success' role='alert'>
                 SuccessFully Inserted Record... 
                </div>";
        

               } else{
                 
                 echo mysqli_error($con);                              
       
               }   
          }     

  }



?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];  ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
