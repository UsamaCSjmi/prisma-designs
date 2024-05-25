<?php
require 'top.inc.php';
$sql="select * from images";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Images </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>ID</th>
                                <th>Image Type</th>
                                <th>Image</th>
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
                                    <td><?php echo $row['image_type']?></td>
                                    <td><img src="<?php echo SITE_PATH."/images/others/".$row['image']?>" alt=""></td>
                                    <td>
                                    <?php
                                    echo "<span class='badge badge-edit'><a href='manage_images.php?id=".$row['id']."' >Edit</a></span>&nbsp";
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