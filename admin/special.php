<?php
require 'top.inc.php';
$sql="select * from special";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Three Image Section</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Title</th>
                                <th>Item</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $row=mysqli_fetch_assoc($res);?>
                                <tr>
                                    <td class="serial">1</td>
                                    <td>Heading</td>
                                    <td><?php echo $row['heading']?></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=heading' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">2</td>
                                    <td>Content</td>
                                    <td><?php echo $row['content']?></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=content' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">3</td>
                                    <td>List Item 1</td>
                                    <td><?php echo $row['list1']?></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=list1' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">4</td>
                                    <td>List Item 2</td>
                                    <td><?php echo $row['list2']?></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=list2' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">5</td>
                                    <td>List Item 3</td>
                                    <td><?php echo $row['list3']?></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=list3' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">6</td>
                                    <td>List Item 4</td>
                                    <td><?php echo $row['list4']?></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=list4' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">7</td>
                                    <td>Big Image</td>
                                    <td><img src="../images/three/<?php echo $row['big_img']?>" alt="Big Image"></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=big_img' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">8</td>
                                    <td>Medium Image</td>
                                    <td><img src="../images/three/<?php echo $row['mid_img']?>" alt="Medium Image"></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=mid_img' >Edit</a></span></td>
                                </tr>
                                <tr>
                                    <td class="serial">9</td>
                                    <td>Small Image</td>
                                    <td><img src="../images/three/<?php echo $row['small_img']?>" alt="Small Image"></td>
                                    <td><span class='badge badge-edit'><a href='manage_special.php?type=small_img' >Edit</a></span></td>
                                </tr>
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