
<?php
require 'top.inc.php';
$id='';
$head='';
$content='';
$msg="";

if(isset($_GET['id']) && $_GET['id']!=''){
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from banners where banner_id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $id=$row['banner_id'];
        $head=$row['head'];
        $content=$row['content'];
    }
    else{
        header('Location:banners.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $id = get_safe_value($conn, $_POST['type']);
    
    $head =  $_POST['head'];
    $content =  $_POST['content'];
    $updated_on = date('Y-m-d h:i:s');
    $update_sql = "UPDATE banners SET content = '$content', head = '$head' WHERE banner_id = $id";

    $res= mysqli_query($conn,$update_sql);
    if($res){
        $msg="Updated Successfully ";
        header('Location:banners.php');
        die();
    }
    else{
        $msg="Failed";
    }
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Banner</strong><small> Form</small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- <label for="type" class=" form-control-label">Page Name</label> -->
                                        <input class="form-control"  type="hidden" name="type" id="type" value="<?php echo $id?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="head" class=" form-control-label">Heading</label>
                                <input name="head" placeholder="Enter Heading" class="form-control" value="<?php echo $head?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="content" class=" form-control-label">Content</label>
                                <textarea name="content" placeholder="Enter Content" class="form-control" rows=15 style="resize:none" required ><?php echo $content?></textarea>
                            </div>
                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount" >Submit</span>
                            </button>
                            <div class="feild_success"><?php echo $msg; ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./ckeditor/ckeditor.js"></script>
<?php
require 'footer.inc.php';?>
