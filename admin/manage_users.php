<?php
require 'top.inc.php';
$categories='';
$msg='';

if(isset($_POST['submit'])){
    $uname = get_safe_value($conn, $_POST['uname']);
    $email = get_safe_value($conn, $_POST['email']);
    $password = get_safe_value($conn, $_POST['password']);

    $res= mysqli_query($conn,"select * from users where email='$email'");
    $check=mysqli_num_rows($res);

    if($check>0){
        
        $msg="User already exist";
        
    }
    if($msg==''){
        $added_on = date('Y-m-d h:i:s');
        mysqli_query($conn,"insert into users (name,password,email,added_on) values('$uname','$password','$email','$added_on')");
        header('Location:users.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>User</strong><small> Form</small></div>
                    <form method="post" action="">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="uname" class=" form-control-label">Username</label>
                                <input type="text" name="uname" placeholder="Enter User name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Password</label>
                                <input type="text" name="password" placeholder="Enter Password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
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
<?php require 'footer.inc.php';?>