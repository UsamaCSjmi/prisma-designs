<?php
require 'top.inc.php';
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($conn,$_GET['operation']);
        $id=get_safe_value($conn,$_GET['id']);
        if($operation=='active'){
            $status='1';
        }
        else{
            $status='0';
        }
        $update_status_sql="update product set status='$status' where id='$id'";
        mysqli_query($conn,$update_status_sql);
        
    }
    if($type=='protection'){
        $operation=get_safe_value($conn,$_GET['operation']);
        $id=get_safe_value($conn,$_GET['id']);
        if($operation=='1'){
            $status='1';
        }
        else{
            $status='0';
        }
        $update_status_sql="update product set is_protected='$status' where id='$id'";
        mysqli_query($conn,$update_status_sql);
    }
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        
        //Deleting Product from folder
        $get_img="select image from product where id='$id'";
        $res=mysqli_query($conn,$get_img);
        $row=mysqli_fetch_assoc($res);
        unlink(PRODUCT_IMAGE_SERVER_PATH.$row['image']);
        
        //Deleting from database
        $delete_sql="delete from product where id='$id'";
        mysqli_query($conn,$delete_sql);
        
    }
}
$sql="select product.*,categories.categories,sub_categories.sub_categories from product LEFT JOIN categories ON product.categories_id=categories.id LEFT JOIN sub_categories ON product.sub_categories_id = sub_categories.id order by product.id desc";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Products </h4>
                    <h4 class="box-link"><a href="manage_product.php">Add Product</a> </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Protected</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                while($row=mysqli_fetch_assoc($res)){?>
                                <tr>
                                    <td class="serial"><?php echo $i; ?></td>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['categories']?></td>
                                    <td><?php echo $row['sub_categories']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt=""></td>
                                    <td>
                                        <?php
                                        if($row['is_protected']==1){
                                            echo "<span class='badge badge-complete'><a href='?type=protection&operation=0&id=".$row['id']."' >Protected</a></span>&nbsp";
                                        }
                                        else{
                                            echo "<span class='badge badge-pending'><a href='?type=protection&operation=1&id=".$row['id']."' >Not Protected</a></span>&nbsp";
                                        }
                                        
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                    if($row['status']==1){
                                        echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."' >Active</a></span>&nbsp";
                                    }
                                    else{
                                        echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."' >Deactive</a></span>&nbsp";
                                    }
                                    echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."' >Edit</a></span>&nbsp";
                                    echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."' >Delete</a></span>";
                                    
                                    ?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php';?>