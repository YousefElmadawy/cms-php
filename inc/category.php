
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    NEWS
                    <small>by eng:yousef</small>
                </h1>

                <!-- First Blog Post -->
                <?php 
                    $cid = $_GET['cid'];
                    $sql = " SELECT * FROM `posts` WHERE `category` = '$cid' " ;
                    $allposts = (mysqli_query( $connection , $sql));

                    while($row = mysqli_fetch_assoc($allposts)){
                        $post_id = $row ['post_id'];
                        $title =$row ['title'];
                        $category =$row ['category'];
                        $Author =$row ['Author'];
                        $date =$row ['date'];
                        $image =$row ['image'];
                        $content =substr(  $row ['content'] , 0 , 200);
                        $tags =$row ['tags'];
                        $comments_count =$row ['comments_count'];
                    
                    ?>
                <h2>
                    <a href="post.php?pid=<?=$post_id?>"><?=$title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?=$Author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?=$date?></p>
                <hr>
                <img class="img-responsive" src="images/<?=$image?>" alt="">
                <hr>
                <p><?=$content?></p>
                <a class="btn btn-primary" href="post.php?pid=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php 
                    }
                    ?> <!-- while -->
 

          

               

            </div> <!-- home -->
