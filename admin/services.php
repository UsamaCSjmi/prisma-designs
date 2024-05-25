<?php
require 'top.inc.php';
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        
        $get_img="select icon from services where id='$id'";
        $res=mysqli_query($conn,$get_img);
        $row=mysqli_fetch_assoc($res);
        unlink(SERVER_PATH."/images/icons/".$row['icon']);
        
        //Deleting from database
        $delete_sql="delete from services where id='$id'";
        mysqli_query($conn,$delete_sql);
        
    }
}
$sql="select * from services";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Services </h4>
                    <h4 class="box-link"><a href="manage_services.php">Add Service</a> </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Content</th>
                                <th>Icon</th>
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
                                    <td><?php echo $row['heading']?></td>
                                    <td><?php echo $row['content']?></td>
                                    <td><img src="<?php echo SITE_PATH."/images/icons/".$row['icon']?>" alt=""></td>
                                    <td>
                                    <?php
                                    echo "<span class='badge badge-edit'><a href='manage_services.php?id=".$row['id']."' >Edit</a></span>&nbsp";
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