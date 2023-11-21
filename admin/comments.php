<?php
include('./includes/admin_header.php');
include('./includes/admin_navbar.php');
?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="page-header">Admin Dashboard <small>Comments</small> </h1>
        <div class="row">
            <div class="col-lg-12"> </div>
            <table class="table table-hover table-bordered table-striped">
                <thead   >
                    <tr>
                        <th>ID</th>
                        <th>comment content</th>
                        <th>Status</th>
                        <th>Approved</th>
                        <th>Disapproved</th>
                        
                         
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = " SELECT * FROM `comments` ";
                    $allComments = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_assoc($allComments)) {
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $status = $row['status'];
                    ?>
                        <tr>
                            <td><?= $comment_id?></td>
                            <td><?= $comment_content?></td>
                            <td><?= $status?></td>
                            <td class="text-center"><a href="comments.php?Approved=<?= $comment_id?>" class="btn btn-primary">  Approved  </a></td>
                            <td class="text-center"><a href="comments.php?Disapproved=<?= $comment_id?>" class="btn btn-danger"> Disapproved</a></td>
                        </tr>
                    <?php }  ?>

                     <?php
                            if (isset($_GET['Approved'])) {
                                $id = $_GET['Approved'];

                                $sql = "UPDATE `comments` SET `status` = 'Approved' WHERE `comment_id` = '$id'";
                                $updateCategory = mysqli_query($connection, $sql);
                                header("Location:comments.php");
                            }
                            ?>  

                     <?php
                            if (isset($_GET['Disapproved'])) {
                                $id = $_GET['Disapproved'];

                                $sql = "UPDATE `comments` SET `status` = 'Not Approved' WHERE `comment_id` = '$id'";
                                $updateCategory = mysqli_query($connection, $sql);
                                header("Location:comments.php");
                            }
                            ?>  

                </tbody>
            </table>

        </div><!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
include('./includes/admin_footer.php');

?>