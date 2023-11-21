<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">

    <div class="input-group">
        <input type="text"  name="search_text" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="search_btn" >
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    <!-- /.input-group -->
    </form>
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



                <li><a href="#"> <?=$cat_title?></a>
                </li>   
                
                <?php 
                    }
                    ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
        
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div><!-- sidebar -->