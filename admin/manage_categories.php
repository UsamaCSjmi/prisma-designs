<?php
require 'top.inc.php';
$categories='';
$image_required='required';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];
        $image = $row['image'];
        $image_required='';
    }
    else{
        echo '
            <script>
            window.location.href = "categories.php";
            </script>
        ';
        // header('Location:categories.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $categories = get_safe_value($conn, $_POST['categories']);

    $res= mysqli_query($conn,"select * from categories where categories='$categories'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }
            else{
                $msg="Category already exist";
            }
        } 
        else{
            $msg="Category already exist";
        }
    }
    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($conn,"update categories set categories='$categories' where id='$id'");
        }
        else{
            mysqli_query($conn,"insert into categories (categories,status) values('$categories','1')");
        }
        echo '
            <script>
            window.location.href = "categories.php";
            </script>
        ';
        // header('Location:categories.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form method="post" action="">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categories</label>
                                <input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
                            </div>
                            <div class="form-group">
                                <div class="row" id="image_box">
                                    <div class="col-lg-6">
                                        <label for="image" class=" form-control-label">Image</label>
                                        <input type="file" name="image" class="form-control" <?php echo $image_required?> >
                                    </div>
                                    <?php 
                                        if($image!=''){
                                            echo '<div class="col-lg-3">
                                                    <a target="_blank" href="'.IMAGE_SITE_PATH.'categories/'.$image.'">
                                                        <img src="'.IMAGE_SITE_PATH.'categories/'.$image.'" alt="">
                                                    </a>
                                                  </div>';
                                        }
                                        ?>
                                    
                                </div>
                            </div>  
                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount" >Submit</span>
                            </button>
                            <div class="feild_error"><?php echo $msg; ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php';?>