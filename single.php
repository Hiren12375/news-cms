<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                   <?php
                     include"config.php";
                        if (isset($_GET['cid'])) {
                           $cat_id=$_GET['cid'];
                        }
                      
                      $post_id=$_GET['id'];

                     $sql=mysqli_query($con,"select post.post_id,post.title,post.author,
                      post.description,post.post_date,post.post_img,post.category,
                       category.
                            category_name,user.username
                           from post left join category ON post.category = category.category_id left join user ON post.author = user.user_id where post_id='".$post_id."' ")or die("Query Error"); 
           
                                  if (mysqli_num_rows($sql)>0 ) {
                                   while ($row=mysqli_fetch_assoc($sql)) {  
                   ?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                  <a href='category.php?cid=<?php echo $row['category'];?>'> <?php echo $row['category_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['author'];?>'><?php echo $row['username']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                   <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']?>" alt=""/>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            </p>
                        </div>
                    </div>
                    <?php
                      }
                     }else{

                         echo "<div class='alert alert-danger' role='alert'>
                                 No Record Found... 
                                </div>";
                     }
                    ?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
