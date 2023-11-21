
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    NEWS
                    <small>by eng:yousef</small>
                </h1>

                <!-- First Blog Post -->

                <?php 

                if(isset($_POST['search_btn'])){ 
                    $keywords =$_POST['search_text'];



                    $sql = " SELECT * FROM `posts` WHERE `tags` LIKE '%$keywords%' " ;
                    $allposts = (mysqli_query( $connection , $sql));
                    $count = mysqli_num_rows($allposts);
                    if($count==0){
                        echo " <div class= 'bg-danger text-danger text-center' > 
                        <h1> no results</h1>

                        
                        </div>
                        
                        
                        ";
                    }

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
<div class= 'bg-danger text-danger text-center' > 
                        <h1>results = <?=$count?></h1>

                        
                        </div>

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
                    }   
                    ?> <!-- while -->
 

          

               

            </div> <!-- home -->
