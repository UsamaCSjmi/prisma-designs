
<?php
require 'top.inc.php';
$msg='';
$heading='';
$content='';
$icon='';
$image_required='required';


if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from services where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $heading=$row['heading'];
        $content=$row['content'];
        $icon=$row['icon'];
    }
    else{
        header('Location:services.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $heading = get_safe_value($conn, $_POST['heading']);
    $content = get_safe_value($conn, $_POST['content']);
    $res= mysqli_query($conn,"select * from services where heading='$heading'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }
            else{
                $msg="Service already exist";
            }
        } 
        else{
            $msg="Service already exist";
        }
    }

    if($_FILES['icon']['type']!='' && ($_FILES['icon']['type']!='image/png' && $_FILES['icon']['type']!='image/svg+xml' && $_FILES['icon']['type']!='image/jpg' && $_FILES['icon']['type']!='image/jpeg')){
        $msg ="Please select only PNG/JPG/JPEG/SVG Formats";
        
    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['icon']['name']!=''){
                
                $image=rand(111111111,999999999).'_'.$_FILES['icon']['name'];
                move_uploaded_file($_FILES['icon']['tmp_name'],SERVER_PATH."/images/icons/".$image);

                $update_sql="update services set heading='$heading',content='$content',icon='$image' where id='$id'";
            }
            else{
                $update_sql="update services set heading='$heading',content='$content' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
        }
        else{
            $image=rand(111111111,999999999).'_'.$_FILES['icon']['name'];
            move_uploaded_file($_FILES['icon']['tmp_name'],SERVER_PATH."/images/icons/".$image);
            mysqli_query($conn,"insert into services (heading, content, icon) values('$heading', '$content','$image')");
            $id=mysqli_insert_id($conn);
        }
        header('Location:services.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Service</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="heading" class=" form-control-label">Service Heading</label>
                                <input type="text" name="heading" placeholder="Enter Service Heading" class="form-control" required value="<?php echo $heading?>">
                            </div>
                            <div class="form-group">
                                <label for="content" class=" form-control-label">Service Content</label>
                                <input type="text" name="content" placeholder="Enter Service Content" class="form-control" required value="<?php echo $content?>">
                            </div>
                         
                            <div class="form-group">
                                <div class="row" id="image_box">
                                    <div class="col-lg-6">
                                        <label for="icon" class=" form-control-label">Icon</label>
                                        <input type="file" name="icon" class="form-control" <?php echo $image_required?> >
                                    </div>
                                    <?php 
                                        if($icon!=''){
                                            echo '<div class="col-lg-3">
                                                    <a target="_blank" href="'.SITE_PATH."/images/icons/".$icon.'">
                                                        <img src="'.SITE_PATH."/images/icons/".$icon.'" alt="Icon">
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