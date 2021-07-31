<?php include "header.php";

if ($_SESSION["user_role"]=='0') {
    
     header("location:http://localhost/news-site/admin/post.php"); 
}

 ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <?php
                  include"config.php";
                      /*  Offset Value Count Pagination*/
                        $limit = 3;

                      if(isset($_GET['page'])){

                       $page=$_GET['page'];
                      }else{

                        $page = 1;
                      }
                        $offset=($page -1)*$limit;   
                     

                   /*  Offset Value Count Pagination*/
 


                  $sql=mysqli_query($con,"select * from category order by category_id asc LIMIT {$offset},{$limit}")or die("Query Error");         
                ?>

                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                             if (mysqli_num_rows($sql)>0) {
                       
                               $serial=$offset +1;
                            while ($row=mysqli_fetch_assoc($sql)) {
                     
                        ?>
                        <tr>
                            <td class='id'><?php echo $serial; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'><a href='update-category.php?id=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id=<?php echo $row['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        
                    <?php 
                             $serial++;

                      }?>
                    </tbody>
                </table>
               <?php }
                   
                       /*  Pagination Start*/   
                        $Query = mysqli_query($con,"select * from category")or die("Query Error");


                         if(mysqli_num_rows($Query)>0) {
                      
                         $total_record=mysqli_num_rows($Query);
                         

                         $totalpage=ceil($total_record / $limit);
                          echo '<ul class="pagination admin-pagination">';      
                          if ($page> 1) {
                            //echo'<li><a> Next</a></li>'; 
                            echo'<li><a href="category.php?page='.($page - 1).'">Prev</a></li>';
                          }
                         for ($i=1; $i<=$totalpage; $i++) { 
                            if ($i == $page) {
                              $active ="active";

                            }else{

                              $active=" ";
                            }

                           echo'<li class="'.$active.'"><a href="category.php?page='.$i.'">'.$i.'</a></li>';
                         }
                         if ($totalpage > $page) {
                            
                           echo'<li><a href="category.php?page='.($page + 1).'">Next</a></li>';
                          }
                      echo'</ul>'; 
                     }
             
                    /*  Pagination End*/

                     
               ?>
               <!-- <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
