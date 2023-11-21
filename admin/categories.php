<?php
include('./includes/admin_header.php');
include('./includes/admin_navbar.php');
include('functions.php');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header"> Admin DashBoard <small>Categories</small> </h1>
        <div class="row">

            <div class="col-md-6">

                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php getcategories(); ?>
                        <?php deletecategory(); ?>
                    </tbody>
                </table>

            </div><!-- left table-->

            <div class="col-md-6">
                <?php addcategory(); ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Category Title</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" name="add_category" value="add category">
                    </div>
                </form>

                <!-- Edit -->

                <?php  editcategory(); ?>

            </div><!-- right form-->

        </div> <!-- /.row -->

    </div> <!-- /.container-fluid -->

</div> <!-- /#page-wrapper -->
<?php include('./includes/admin_footer.php'); ?>