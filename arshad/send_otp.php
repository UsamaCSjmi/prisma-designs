<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require ('connection.inc.php');
require ('functions.inc.php');
$type=get_safe_value($conn,$_POST['type']);
if($type=='email'){

    $email=get_safe_value($conn,$_POST['email']);

    $check_email=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
    if($check_email>0){
        echo "present";
    }
    else{
        $otp = rand(111111,999999);
        $_SESSION['EMAIL_OTP']=$otp;
        $html = "$otp is your OTP";
        
        require 'PHPMailer/PHPMailer/src/Exception.php';
        require 'PHPMailer/PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/PHPMailer/src/SMTP.php';

        $id='arshad@prismadesigns.in';
        $pass='webfjhwe@#wedj2334Uah';
        $subject="Email verification from Campus Connect";

        $mail = new PHPMailer(true);
        $mail->isSMTP();                                           
        $mail->SMTPDebug = 0;
        $mail->Host       = 'smtp.hostinger.com';                    
        $mail->SMTPAuth   = true;                                
        $mail->Username   = $id;                   
        $mail->Password   = $pass;                               
        $mail->Port       = 465;   
        // $mail->SMTPSecure = 'tls';                                 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->setFrom($id,'Campus Connect');
        $mail->addAddress($email); 
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $html;

        $mail->send();
        if($mail){
        echo 'done';    
        }
        else{
            echo 'failed';
        }
    }
}
if($type=='forgot'){

    $email=get_safe_value($conn,$_POST['email']);

    $check_email=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
    if($check_email>0){
        $otp = rand(111111,999999);
        $_SESSION['EMAIL_OTP']=$otp;
        $html = "$otp is your OTP";
        
        require 'PHPMailer/PHPMailer/src/Exception.php';
        require 'PHPMailer/PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/PHPMailer/src/SMTP.php';

        $id='arshad@prismadesigns.in';
        $pass='webfjhwe@#wedj2334Uah';
        $subject="Email verification from Campus Connect";

        $mail = new PHPMailer(true);
        $mail->isSMTP();                                           
        $mail->SMTPDebug = 1;
        $mail->Host       = 'smtp.hostinger.com';                    
        $mail->SMTPAuth   = true;                                
        $mail->Username   = $id;                   
        $mail->Password   = $pass;                               
        $mail->Port       = 465;        
        // $mail->SMTPSecure = 'tls';                            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->setFrom($id,'Campus Connect');
        $mail->addAddress($email); 
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $html;

        $mail->send();
        if($mail){
        echo 'done';    
        }
        else{
            echo 'failed';
        }
    }
    else{
        echo "invalid";
    }
}
if($type=='verify'){

    $otp=get_safe_value($conn,$_POST['otp']);

    if($_SESSION['EMAIL_OTP']==$otp){
        echo "verified";
    }
    else{
        echo "invalid";
    }
}

?>