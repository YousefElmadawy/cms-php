<?php include ('inc/Header.php')?>
<?php include ('inc/navbar.php')?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php 

                 $pid = $_GET['pid'];
                 $sql = " SELECT * FROM `posts` WHERE `post_id` = '$pid'  " ;
                 $allposts = mysqli_query( $connection , $sql);

                    while($row = mysqli_fetch_assoc($allposts)):
                        $post_id = $row ['post_id'];
                        $title =$row ['title'];
                        $category =$row ['category'];
                        $Author =$row ['Author'];
                        $date =$row ['date'];
                        $image =$row ['image'];
                        $content =   $row ['content'] ;
                        // $content =substr(  $row ['content'] , 0 , 200);
                        $tags =$row ['tags'];
                        $comments_count =$row ['comments_count'];
                    
                    ?>

                <!-- Title -->
                <h1><?=$title?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?=$Author?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on  <?=$date?> /p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?=$image?>" alt="">

                <hr>

                <!-- Post Content -->
                
                <p><?=$content?> </p>

                <hr>
                <?php 
                    endwhile;
                    ?>

                <!-- Blog Comments -->

                <?php
                if(isset($_POST['add_comment'])){
                    $pid = $_GET['pid'];
                    $comment_content =$_POST['comment_content'];

                    $addcommentSql= " INSERT INTO 
                    `comments`(`comment_post_id`, `comment_date`, `comment_content`) 
                    VALUES
                     ('$pid',now(),'$comment_content') ";

                     $insert_comment= mysqli_query($connection,$addcommentSql);
                     header("Location:post.php?pid=$pid");


                }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->


                <?php
                $comSql = " SELECT * FROM `comments` WHERE `comment_post_id`= '$pid' AND `status` = 'Approved' " ;
                $allcomments = mysqli_query( $connection , $comSql);
                while($COrow = mysqli_fetch_assoc($allcomments)):
                    $comment_id=$COrow['comment_id'];
                    $comment_post_id=$COrow['comment_post_id'];
                    $comment_date=$COrow['comment_date'];
                    $comment_content=$COrow['comment_content'];
                 
                ?>
 


                <!-- Comment -->
                <div class="media">
                    <!-- <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a> -->
                    <div class="media-body">
                        <h3 class="media-heading text-primary ">Comments
                            <small><?=$comment_date?></small>
                        </h3>
                        <?=$comment_content?>
                    
                    </div>
                </div>

                <?php 
                    endwhile;
                    ?>

              

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
        <div class="well">
                <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">

                  <ul class="list-unstyled">
                    <?php 
                    $sql = " SELECT * FROM `categories`   " ;
                    $allcategories = (mysqli_query( $connection , $sql));

                    while($row = mysqli_fetch_assoc($allcategories)){
                        $cat_id = $row ['cat_id'];
                        $cat_title =$row ['cat_title'];
                    
                    ?>


                     <li> <a href="#"><?=$cat_title?></a>     </li>
                    <?php    }?>
                   </ul>
                </div>
            </div>
        </div>
                       
                    <!-- /.row -->
                

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

<?php include ('inc/footer.php')?>