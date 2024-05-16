<?php
session_start();
include('config/db_connect.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function  send_password_reset($get_name,$get_email,$token){
             
          $get_email->isSMTP();                                            
          $get_email->Host       = "smtp.example.com";                    
          $get_email->SMTPAuth   = true;                                 
          $get_email->Username   = "user@example.com";                   
          $get_email->Password   = '';                              
          $get_email->SMTPSecure = "tls";      
          $get_email->Port       = 465;                                    
      
          $get_email->setFrom("from@example.com", $get_name);
          $get_email->addAddress('$email',$get_email); 
          
          $get_email->isHTML(true);
          $get_email->Subject("Reset password notification");                               
          
          $email_template = "
          <h2>Hello</>
          <h3>You are recieving this email because we recieved a password reset request from your account.<h3/>
           <br><br/>
           <a href='http://localhost/Asthaa/pass-res-code.php?token = $token & email = $get_email'> Click Here </a>     
          ";
}

if(isset($_POST['password_reset_link']))
{
          $email = mysqli_real_escape_string($conn,$_POST['password_reset_link']);
          $token = md5(rand());

          $check_email = "SELECT email FROM customer WHERE email ='$email' LIMIT 1";
          $check_email_run = mysqli_query($conn,$check_email);

          if(mysqli_num_rows($check_email_run)>0)
          {
             $row = mysqli_fetch_array($check_email_run);
             $get_name = $row['name'];
             $get_email = $row ['email'];

             $update_token = "UPDATE customer SET verify_token '$token' WHERE email='$get_email'LIMIT 1 ";
             $update_token_run = mysqli_query($con,$update_token);

             if($update_token_run)
             {
                send_password_reset($get_name,$get_email,$token);
                $_SESSION['sttatus'] = 'We sent you a password reset link.';
                header("Location: re-set.php");
                exit(0);
             }      
             else{
                    
                    $_SESSION['sttatus'] = 'Something went wrong! #1';
                    header("Location: re-set.php");
                    exit(0);
             }       

          }else
          {
                    $_SESSION['sttatus'] = 'Email Not Found!';
                    header("Location: re-set.php");
                    exit(0);
          }

}

?>