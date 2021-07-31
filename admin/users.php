<?php include "header.php";

if($_SESSION["user_role"] =='0') {
                                        
         header("location:http://localhost/news-site/admin/post.php");                       
      }


 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                    <?php    
                 
                     include "config.php";
                     //pagination
                      $limit = 3;

                      if(isset($_GET['page'])){

                       $page=$_GET['page'];
                      }else{

                        $page = 1;
                      }
                        $offset=($page -1)*$limit;   
                     
                     //pagination

            $sql=mysqli_query($con,"select * from user order by user_id asc LIMIT {$offset},{$limit} ")or die("Query Error");
                  if (mysqli_num_rows($sql) >0) {
                    
                    ?>

                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>First Name</th>
                        <!--  <th>Last Name</th> -->
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

                          <?php 
                               $serial=$offset + 1;

                          while ($row=mysqli_fetch_assoc($sql)) {
                          
                          ?>
                          <tr>
                             <td class='id'><?php echo $serial;?></td>
                              <td><?php echo $row['first_name']."  ".$row['last_name'];?></td>
                             <!-- <td><?php //echo $row['last_name'];?></td>-->
                              <td><?php echo $row['username'];?></td>
                              <td><?php 
                                    if ($row['role']==1) {
                                      echo " Admin";
                                    }else{

                                      echo " User";
                                    }
                  
                              ?></td>


                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>


                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <tr>
                             <?php 
                                $serial ++;
                           } ?> 
                      </tbody>
                  </table>
                   <?php }
                                 // pagination 
                     $Query = mysqli_query($con,"select * from user")or die("Query Error");


                         if(mysqli_num_rows($Query)>0) {
                      
                         $total_record=mysqli_num_rows($Query);
                         

                         $totalpage=ceil($total_record / $limit);
                          echo '<ul class="pagination admin-pagination">';      
                          if ($page> 1) {
                            //echo'<li><a> Next</a></li>'; 
                            echo'<li><a href="users.php?page='.($page - 1).'">Prev</a></li>';
                          }
                         for ($i=1; $i<=$totalpage; $i++) { 
                            if ($i == $page) {
                              $active ="active";

                            }else{

                              $active=" ";
                            }

                           echo'<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                         }
                         if ($totalpage > $page) {
                            
                           echo'<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
                          }
                      echo'</ul>'; 
                     }
                                         // pagination complit
                    ?>
                  
                     <!-- <li class="active"><a>1</a></li>    -->            
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
