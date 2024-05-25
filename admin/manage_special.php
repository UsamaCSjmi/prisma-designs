
<?php
require 'top.inc.php';
$text="";
$isImg = false;
$msg="";


if(!isset($_GET['type']) || $_GET['type']==''){
    header('Location:special.php');
    die();
}

$type = $_GET['type'];
if($type == "heading"){
    $text = "Heading";
}
elseif($type == "content"){
    $text = "Content";
}
elseif($type == "list1"){
    $text = "List Item 1";
}
elseif($type == "list2"){
    $text = "List Item 2";
}
elseif($type == "list3"){
    $text = "List Item 3";
}
elseif($type == "list4"){
    $text = "List Item 4";
}
elseif($type == "big_img"){
    $text = "Big Image";
    $isImg = true;
}
elseif($type == "mid_img"){
    $text = "Medium Image";
    $isImg = true;
}
elseif($type == "small_img"){
    $text = "Small Image";
    $isImg = true;
}
else{
    header('Location:special.php');
    die();
}

if(isset($_POST['submit'])){
    if($isImg){
        if($_FILES[$type]['name']!=''){
            $image=rand(111111111,999999999).'_'.$_FILES[$type]['name'];
            move_uploaded_file($_FILES[$type]['tmp_name'],"../images/three/".$image);
            $update_sql="update special set $type='$image' where 1=1";
        }
    }
    else{
        $content =  $_POST[$type];
        $update_sql = "UPDATE special SET $type = '$content' WHERE 1=1";
    }
    $res= mysqli_query($conn,$update_sql);
    if($res){
        $msg="Updated Successfully ";
        header('Location:special.php');
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
                <div class="card-header"><strong>Three Images Section</strong><small> Form</small></div>
                    <form action="manage_special.php?type=<?php echo $type?>" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="<?php echo $type?>" class=" form-control-label"><?php echo $text?></label>
                                <?php 
                                if(!$isImg){
                                ?>
                                <input name="<?php echo $type?>" placeholder="Enter <?php echo $text?>" class="form-control" required/>
                                <?php
                                }
                                else{
                                ?>
                                <input type="file" name="<?php echo $type?>" required/>
                                <?php
                                }
                                ?>
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
<?php
require 'footer.inc.php';?>
