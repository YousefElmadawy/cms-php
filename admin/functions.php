<?php
//deletecategory
function deletecategory()
{

    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $sql = " DELETE FROM `categories` WHERE `cat_id` = '$id' ";
        $DeleteCategory = mysqli_query($connection, $sql);
        header("Location:categories.php");
    } //if

}     //deletecategory
?>
<?php
// getcategories
function getcategories()
{

    global $connection;
    $sql = " SELECT * FROM `categories` ";
    $allCategories = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($allCategories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
?>
        <tr>
            <td><?= $cat_id ?></td>
            <td><?= $cat_title ?></td>
            <td class="text-center"><a href="categories.php?edit=<?= $cat_id ?>" class="btn btn-primary"> <i class="fa fa-edit"></i> </a></td>
            <td class="text-center"><a href="categories.php?delete=<?= $cat_id ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
        </tr>
<?php }
}
//addcategory
?>

<?php
function addcategory()
{

    global $connection;

    if (isset($_POST['add_category'])) {
        $cat_title = $_POST['cat_title'];
        // echo $cat_title; //for test
        if ($cat_title == "" || empty($cat_title)) {
            echo " <div class='alert alert-danger text-center'>
                                <h1>This Field Should Not Be Empty </h1>
                                 </div>";
        } else {
            $addCatSql = "INSERT INTO `categories` (`cat_title`) VALUES ('$cat_title')";
            $insertCat =  mysqli_query($connection, $addCatSql);
            header("Location:categories.php");
        }
    } // if isset


}  // addcategory
?>


<?php
function editcategory(){
    global $connection;

    if (isset($_GET['edit'])) :
        $id = $_GET['edit'];
    ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="">Category Title</label>
                <?php
                $sql = " SELECT * FROM `categories` WHERE `cat_id` = '$id' ";
                $allCategories = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($allCategories)) :
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                ?>
                    <input type="text" class="form-control" value="<?= $cat_title ?>" name="cat_title">
                <?php endwhile; ?>
            </div>
            <?php
            if (isset($_POST['update_category'])) {
                $cat_title = $_POST['cat_title'];
                $updateSql = " UPDATE `categories` SET `cat_title`='$cat_title' WHERE `cat_id` = '$id' ";
                $UpdateCategory = mysqli_query($connection, $updateSql);
                header("Location:categories.php");
            }
            ?>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-warning" name="update_category" value="Update category">
            </div>
        </form>
    <?php endif;

}
?>