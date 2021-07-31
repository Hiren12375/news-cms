<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php   
                    //  include"config.php";
                            if (isset($_GET['cid'])) {
                                $cat_id=$_GET['cid'];
                             }
                     $Query = mysqli_query($con,"select * from category where category_id='".$cat_id."'")or die("Query Error for pagination ");
                        $res=mysqli_fetch_assoc($Query);
                    ?>
                  <h2 class="page-heading"><?php echo $res['category_name'];?></h2>
                     <?php
                         include"config.php";
                             if (isset($_GET['cid'])) {
                                $cat_id=$_GET['cid'];
                             }

                           /*  Offset Value Count Pagination*/
                        $limit = 5;

                      if(isset($_GET['page'])){

                       $page=$_GET['page'];
                      }else{

                        $page = 1;
                      }
                        $offset=($page -1)*$limit;   
                     

                   /*  Offset Value Count Pagination*/
                         $sql=mysqli_query($con,"select post.post_id,post.title,post.author,
                          post.description,post.post_date,post.post_img,post.category,category.
                            category_name,user.username
                           from post left join category ON post.category = category.category_id left join user ON post.author = user.user_id where post.category='".$cat_id."' 
                           order by post.post_id desc LIMIT {$offset},{$limit}")or die("Query Error"); 
           
                                  if (mysqli_num_rows($sql)>0 ) {
                                   while ($row=mysqli_fetch_assoc($sql)) {    
                      ?>                        

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']?>"><img src="admin/upload/<?php echo $row['post_img']?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']?>'><?php echo $row['title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category'];?>'><?php echo $row['category_name'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['author'];?>'><?php echo $row['username'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date'];?>
                                            </span>
                                        </div>
                                        <p class="description">
                                              
                                              <?php 
                                              //echo substr($row['description'],0, 100)."....";?>

                                    
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua....
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                         }
                     }else{
                          
                            echo "<div class='alert alert-danger' role='alert'>
                                 No Record Found... 
                                </div>";
                     }
                          
                          /*  Pagination Start*/   
                        //$Query = mysqli_query($con,"select * from category where category_id='".$cat_id."'")or die("Query Error");


                         if(mysqli_num_rows($Query)>0) {
                      
                         $total_record=$res['post'];
                         

                         $totalpage=ceil($total_record / $limit);
                          echo '<ul class="pagination admin-pagination">';      
                          if ($page> 1) {
                            //echo'<li><a> Next</a></li>'; 
                            echo'<li><a href="index.php?cid='.$cat_id.'&page='.($page - 1).'">Prev</a></li>';
                          }
                         for ($i=1; $i<=$totalpage; $i++) { 
                            if ($i == $page) {
                              $active ="active";

                            }else{

                              $active=" ";
                            }

                           echo'<li class="'.$active.'"><a href="index.php?cid='.$cat_id.'&page='.$i.'">'.$i.'</a></li>';
                         }
                         if ($totalpage > $page) {
                            
                           echo'<li><a href="index.php?cid='.$cat_id.'&page='.($page + 1).'">Next</a></li>';
                          }
                        echo'</ul>'; 
                     }
             
                    /*  Pagination End*/


                        ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>