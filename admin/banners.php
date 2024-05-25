<?php
require 'top.inc.php';
$sql="select banners.*,pages.page from banners JOIN pages ON banners.page_id = pages.page_id";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Banners</h4>
                    <!-- <h4 class="box-link"><a href="manage_banners.php">Change Details</a> </h4> -->
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Page</th>
                                <th>Heading</th>
                                <th>Content</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                while($row=mysqli_fetch_assoc($res)){?>
                                <tr>
                                    <td class="serial"><?php echo $i; ?></td>
                                    <td><?php echo $row['page']?></td>
                                    <td><?php echo $row['head']?></td>
                                    <td><?php echo $row['content']?></td>
                                    <td>
                                    <?php
                                    echo "<span class='badge badge-edit'><a href='manage_banners.php?id=".$row['banner_id']."' >Edit</a></span>";
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