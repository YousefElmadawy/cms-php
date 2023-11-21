<?php 
include('./includes/admin_header.php');
include('./includes/admin_navbar.php');
?>

       
     
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="page-header">Admin Dashboard <small>Posts</small> </h1>
                <div class="row">
                    <div class="col-lg-12">

                    
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>
<?php 
      $sql = " SELECT * FROM `posts` " ;
      $allPosts = mysqli_query($connection , $sql );

      while($row = mysqli_fetch_assoc($allPosts)){
          $post_id = $row['post_id'];
          $title = $row['title'];
          $category =$row ['category'];
          $Author =$row ['Author'];
          $date =$row ['date'];
          $image =$row ['image'];
          $content =   $row ['content'] ;
          // $content =substr(  $row ['content'] , 0 , 200);
          $tags =$row ['tags'];
          $comments_count =$row ['comments_count'];
?>
                        <tr>
                            <td><?=$post_id?></td>
                            <td><?=$title?></td>
                            <td><?=$Author?></td>                            
                            <td> <img src="../images/<?=$image?>" alt="" height="50" > </td>
                            <td class="text-center"><a href="categories.php?edit=<?=$post_id?>" class="btn btn-primary"> <i class="fa fa-edit"></i> </a></td>
                            <td class="text-center"><a href="categories.php?delete=<?=$post_id?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
                        </tr>
   <?php }  ?>

   <?php
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

   $sql = " DELETE FROM `posts` WHERE `post_id` = '$id' " ;
   $DeletePost = mysqli_query($connection , $sql );
   header("Location:posts.php");
}
   ?>
                        </tbody>
                    </table>
                        
                    </div>
                </div><!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php 
include('./includes/admin_footer.php');
 
?>


   