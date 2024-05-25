
<?php
require 'top.inc.php';
$msg='';
$image_type='';
$image='';
$image_required='required';


if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from images where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $image_type=$row['image_type'];
        $image=$row['image'];
    }
    else{
        header('Location:images.php');
        die();
    }
}
if(isset($_POST['submit'])){

    if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/svg+xml' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')){
        $msg ="Please select only PNG/JPG/JPEG/SVG Formats";
        
    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
                
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PATH."/images/others/".$image);

                $update_sql="update images set image='$image' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
        }
        header('Location:images.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Site Image</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <h3><?php echo $image_type?></h3>
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
                                                    <a target="_blank" href="'.SITE_PATH."/images/others/".$image.'">
                                                        <img src="'.SITE_PATH."/images/others/".$image.'" alt="image">
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
<?php
require 'footer.inc.php';?>