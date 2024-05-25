
<?php
require 'top.inc.php';
$msg='';
$name='';
$post='';
$content='';
$image='';
$image_required='required';


if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from events where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $post=$row['post'];
        $content=$row['content'];
        $image=$row['image'];
    }
    else{
        header('Location:events.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $name = get_safe_value($conn, $_POST['name']);
    $post = get_safe_value($conn, $_POST['post']);
    $content = get_safe_value($conn, $_POST['content']);
    $res= mysqli_query($conn,"select * from events where name='$name'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }
            else{
                $msg="Event already exist";
            }
        } 
        else{
            $msg="Event already exist";
        }
    }

    if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/svg+xml' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')){
        $msg ="Please select only PNG/JPG/JPEG/SVG Formats";
        
    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
                
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PATH."/images/events/".$image);

                $update_sql="update events set name='$name',post='$post',content='$content',image='$image' where id='$id'";
            }
            else{
                $update_sql="update events set name='$name',post='$post',content='$content' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
        }
        else{
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PATH."/images/events/".$image);
            mysqli_query($conn,"insert into services (heading, post, content, image) values('$name', '$post', '$content','$image')");
            $id=mysqli_insert_id($conn);
        }
        echo "
        <script>
            window.location.href = 'events.php';
        </script>

        ";
        // header('Location:events.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Upcoming Event</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Event Name</label>
                                <input type="text" name="name" placeholder="Enter Event Name" class="form-control" required value="<?php echo $name?>">
                            </div>
                            <div class="form-group">
                                <label for="post" class=" form-control-label">Date</label>
                                <input type="text" name="post" placeholder="Enter Event Date" class="form-control" required value="<?php echo $post?>">
                            </div>
                            <div class="form-group">
                                <label for="content" class=" form-control-label">Content  </label>
                                <input type="text" name="content" placeholder="Enter Content" class="form-control" required value="<?php echo $content?>">
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
                                                    <a target="_blank" href="'.SITE_PATH."/images/events/".$image.'">
                                                        <img src="'.SITE_PATH."/images/events/".$image.'" alt="image">
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