<?php 
$page_title = "Password-reset-form";
include('config/db_connect.php');

?>
<html>
      <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Reset</title>
</head>
<body>
<div class="container">
       <div class="row">
       <div class="col-4"></div>
          <div class="col-4">

          <?php 
               if(isset($_SESSION['status']))
               {
                ?>
                <div class="alert alert-success">
                  <h5><? $_SESSION['status'];?></h5>
                </div>
                <?php
               unset($_SESSION['status']);
               }
             ?>

          <form action="pass-res-code.php" method="POST">
                              <div class="mt-2.5" style="margin-top : 250px;">
                                       <h2>Password Reset</h2>
                                        <p>Please enter your email address below. We will send you instructions to reset your password.</p>
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                Email
                                          </label>
                                        <input type="email" class="form-control" name="email" placeholder="TYPE YOUR EMAIL">
                              <div class="btn">
                                        <button type="submit" class="btn btn-success" name="password_reset_link" style="margin-left: -13px;" >Send your email</button>
                              </div>
                              </div>
          </form>
        </div>
          <div class="col-4"></div>
       </div>
</div>




</body>
</html>
