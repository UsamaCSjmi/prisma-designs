
<?php
require 'top.inc.php';
$msg='';
$categories_id='';
$sub_categories_id='';
$name='';
$image='';
$image_required='required';

if(isset($_GET['pi']) && $_GET['pi']>0){
    $pi=get_safe_value($conn,$_GET['pi']);
    $id=get_safe_value($conn,$_GET['id']);
    header('location:manage_product.php?id='.$id);
    die();
}

if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories_id=$row['categories_id'];
        $sub_categories_id=$row['sub_categories_id'];
        $name=$row['name'];
        $image=$row['image'];
    }
    else{
        header('Location:product.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $categories_id = get_safe_value($conn, $_POST['categories_id']);
    $sub_categories_id = get_safe_value($conn, $_POST['sub_categories_id']);
    $name = get_safe_value($conn, $_POST['name']);
    // $image = get_safe_value($conn, $_POST['image']);
    $res= mysqli_query($conn,"select * from product where name='$name'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }
            else{
                $msg="Product already exist";
            }
        } 
        else{
            $msg="Product already exist";
        }
    }

    if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')){
        $msg ="Please select only PNG/JPG/JPEG Formats";
    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                $update_sql="update product set categories_id='$categories_id',sub_categories_id= NULLIF('$sub_categories_id',''),name='$name',image='$image' where id='$id'";
            }
            else{
                $update_sql="update product set categories_id='$categories_id',sub_categories_id= NULLIF('$sub_categories_id','') ,name='$name' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
        }
        else{
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($conn,"insert into product (categories_id,sub_categories_id,name,status,is_protected,image) values('$categories_id',NULLIF('$sub_categories_id',''),'$name','1','1','$image')");
            $id=mysqli_insert_id($conn);
        }
        header('Location:product.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Product</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="categories" class=" form-control-label">Categories</label>
                                        <select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
                                            <option>Select Categories</option>
                                            <?php
                                            $res=mysqli_query($conn,"select id,categories from categories order by categories asc");
                                            while($row=mysqli_fetch_assoc($res)){
                                                if($row['id']==$categories_id){
                                                    echo " <option selected value=".$row['id'].">".$row['categories']."</option>";
                                                }
                                                else{
                                                    echo " <option value=".$row['id'].">".$row['categories']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="categories" class=" form-control-label">Sub Categories</label>
                                        <select class="form-control" name="sub_categories_id" id="sub_categories_id">
                                            <option>Select Sub Categories</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Product Name</label>
                                <input type="text" name="name" placeholder="Enter Product name" class="form-control" required value="<?php echo $name?>">
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
                                                    <a target="_blank" href="'.PRODUCT_IMAGE_SITE_PATH.$image.'">
                                                        <img src="'.PRODUCT_IMAGE_SITE_PATH.$image.'" alt="">
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
<script>
    function get_sub_cat(sub_categories_id){
        var categories_id=jQuery("#categories_id").val();
        jQuery.ajax({
            url:'get_sub_cat.php',
            type:'post',
            data:'categories_id='+categories_id+'&sub_categories_id='+sub_categories_id,
            success:function(result){
                jQuery('#sub_categories_id').html(result)
            }
        });
    }
</script>
<?php
require 'footer.inc.php';?>
<script>
<?php if(isset($_GET['id'])){ ?>
        get_sub_cat('<?php echo $sub_categories_id?>');
<?php } ?>
</script>