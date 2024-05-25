
<?php
require 'top.inc.php';
$msg='';
$heading='';
$content='';
$image='';
$image_required='required';


if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from process where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $heading=$row['heading'];
        $content=$row['content'];
        $image=$row['image'];
    }
    else{
        echo "
        <script>
            window.location.href='process.php';
        </script> 
        ";
        die();
    }
}
if(isset($_POST['submit'])){
    $heading = get_safe_value($conn, $_POST['heading']);
    $content = get_safe_value($conn, $_POST['content']);
    $res= mysqli_query($conn,"select * from process where heading='$heading'");
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

    if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/svg+xml' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')){
        $msg ="Please select only PNG/JPG/JPEG/SVG Formats";
        
    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
                
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PATH."/images/process/".$image);

                $update_sql="update process set heading='$heading',content='$content',image='$image' where id='$id'";
            }
            else{
                $update_sql="update process set heading='$heading',content='$content' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
        }
        else{
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PATH."/images/process/".$image);
            mysqli_query($conn,"insert into process (heading, content, image) values('$heading', '$content','$image')");
            $id=mysqli_insert_id($conn);
        }
        header('Location:process.php');
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
                                        <label for="image" class=" form-control-label">Image</label>
                                        <input type="file" name="image" class="form-control" <?php echo $image_required?> >
                                    </div>
                                    <?php 
                                        if($image!=''){
                                            echo '<div class="col-lg-3">
                                                    <a target="_blank" href="'.SITE_PATH."/images/process/".$image.'">
                                                        <img src="'.SITE_PATH."/images/process/".$image.'" alt="image">
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