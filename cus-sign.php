<?php 

include('config/db_connect.php');

$empmsg = $empmsg2 = $empmsg3 = $empmsg4 = $empmsg5 = $empmsg6 = $empmsg7 = '';

if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $NID = $_POST['NID'];
    $mobile_no = $_POST['mobile_no'];
    $DOB = $_POST['DOB'];
    $email = $_POST['email'];
    $cust_password = $_POST['cust_password'];

    if(empty($first_name))
    {
        $empmsg = 'Please enter first name';
    }
    if(empty($last_name))
    {
        $empmsg2 = 'Please enter last name';
    }
    if(empty($NID))
    {
        $empmsg3 = 'Please enter NID number';
    }
    if(empty($mobile_no))
    {
        $empmsg4 = 'Please enter mobile number';
    }
    if(empty($DOB))
    {
        $empmsg5 = 'Please enter DOB';
    }
    if(empty($email))
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        { 
            $empmsg6 = 'Email is invalid <br />';
        }
        else
        {
            $empmsg6 = 'Please enter your Email <br />';
        }
    }
    if(empty($cust_password))
    {
        $empmsg7 = 'Please enter Password';
    }
    if (!empty($first_name) && !empty($last_name) && !empty($NID) && !empty($mobile_no) && !empty($DOB) && !empty($email) && !empty($cust_password)) {
        $hashed_password = password_hash($cust_password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO  customer (first_name, last_name, Nid, phone_no, date_of_birth, email, customer_password) 
                VALUES ('$first_name', '$last_name', '$NID', '$mobile_no', '$DOB', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            header('location: login.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

?>


<?php  include"includes/header.php";?>


<?php  include"includes/nav.php";?>   


          <div class="head"style="margin-left: 60px; text-align:center;margin-bottom: 20px; margin-top: 100px;"><h1 style="color:#090b17;font-family: Circular, Arial, sans-serif;font-size: 40px;font-weight: 700;" >Welcome To ASTHAA</h1><p>Signup here</p></div>
            <div class="container">
                  <div class="row" style="margin:0px 29% 0; padding-left: 6%;">
                        <div class="col-4"></div>
                        <div class="col-4" style="background-color: whitesmoke; border: 0 solid #000000; border-radius: 15px;box-shadow: 0 4px 8px 10px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding-left: 5%;  ">
                              <form action="cus-sign.php" method="POST"  style="padding-right:10px;">
                              <div class="name" style="margin-top : 60px ;display: flex;" >
                              <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                First Name
                                          </label>
                                          <input type="first_name" class="form-control" name="first_name"placeholder="FIRST NAME" value="<?php if(isset($_POST['submit'])){echo $first_name; } ?>">
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg."</span>";} ?>
                                    </div>
                                    <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                Last Name
                                          </label>
                                          <input type="last_Name" class="form-control" name="last_name" placeholder="LAST NAME" value="<?php if(isset($_POST['submit'])){echo $last_name; } ?>">
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg2."</span>";} ?>

                                    </div>
                              </div>
                              <div class="numb"style="display: flex;" >
                                    <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                National ID
                                          </label>
                                          <input type="last_name" class="form-control" name="NID" placeholder="NID" value="<?php if(isset($_POST['submit'])){echo $NID; } ?>">
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg3."</span>";} ?>

                                    </div>
                                    <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                Mobile No.
                                          </label>
                                          <input type="mobile_no" class="form-control" name="mobile_no" placeholder="MOBILE NUMBER" value="<?php if(isset($_POST['submit'])){echo $mobile_no; } ?>">
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg4."</span>";} ?>

                                    </div>
                               </div>
                                    <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                Date of birth
                                          </label>
                                          <input type="date" class="form-control" name="DOB" id="Test_DatetimeLocal" value="<?php if(isset($_POST['submit'])){echo $DOB; } ?>">
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg5."</span>";} ?>
                                    </div>
                              <div class="log"style="display: flex;">
                                   <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                          <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >
                                                Email
                                          </label>
                                          <input type="email" class="form-control" name="email" placeholder="EMAIL" value="<?php if(isset($_POST['submit'])){echo $email ; } ?>">
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg6."</span>";} ?>
                                    </div>
                                    <div class="mt-1.5" style="margin-top : 10px ;margin-right : 6px;">
                                    <label class="form-label" style="font-family: sans-serif; font-weight: 600;" >Password</label>
                                          <input type="password" class="form-control" name="cust_password" placeholder="PASSWORD" >
                                          <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$empmsg7."</span>";} ?>

                                    </div>
                              </div>
                                    <div class="mt-3"  style=" padding-bottom: 5%; margin-top: 4%;" >
                                    <a href="login.php">
                                    <button class="btn btn-success" name="submit" value="submit" >SignUp</button>
                                    </div>
                                  
                              </form>
                             
                        </div>
                        <dive class="col-4"></dive>
                  </div>
            </div>

<?php include"includes/footer.php";?>  
