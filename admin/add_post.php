<?php
include('./includes/admin_header.php');
include('./includes/admin_navbar.php');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header"> Admin DashBoard <small>Add New Post</small> </h1>
        <div class="row">

        <?php
        if(isset($_POST['add_post'])){
            $title = $_POST['title'];
            $category =$_POST ['category'];
            $Author =$_POST['author'];
            $Date =date('d-m-y');
            $content =$_POST['content'];
            $tags =$_POST['tags'];
            $image_name =$_FILES['image']['name'];
            $image_tmp =$_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp , "../images/$image_name");

            $insertSql = " INSERT INTO
             `posts`(`title`, `category`, `Author`, `date`, `image`, `content`, `tags`)
              VALUES 
              ('$title','$category','$Author',' $Date','$image_name','$content','$tags') " ;
            
            $insert_post= mysqli_query($connection , $insertSql);
            header("Location:posts.php");
            

        }

        
        ?>

            <div class="col-lg-12">
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" class="form-control" name="title">
                    </div> <!-- Title -->

                    <div class="form-group">
                        <label for="">Post Category</label>
                        <select class="form-control" name="category">
                            <?php
                            $sql = " SELECT * FROM categories ";
                            $allCategories = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_assoc($allCategories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                            ?>
                                <option value="<?= $cat_id ?>"> <?= $cat_title ?> </option>

                            <?php }  ?>
                        </select>
                    </div> <!--  category-->

                    <div class="form-group">
                        <label for="">Post Author</label>
                        <input type="text" class="form-control" name="author">
                    </div> <!-- author -->

                    <div class="form-group">
                        <label for="">Post Image</label>
                        <input type="file" class="form-control" name="image">
                    </div> <!-- image -->

                    <div class="form-group">
                        <label for="">Post Tags</label>
                        <input type="text" class="form-control" name="tags">
                    </div> <!-- tages -->

                    <div class="form-group">
                        <label for="">Post Content</label>
                        <textarea class="form-control" name="content" rows="7"></textarea>
                    </div> <!-- content -->

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success btn-block btn-lg" name="add_post" value="Add Post">
                    </div>

                </form>
            </div><!-- col-lg-12 -->

        </div> <!-- /.row -->

    </div> <!-- /.container-fluid -->

</div> <!-- /#page-wrapper -->
<?php include('./includes/admin_footer.php'); ?>