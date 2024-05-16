<?php
session_start();

include('config/db_connect.php');

$emptyemail = $emptypass = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $cust_password = $_POST['password'];

    if (empty($email)) {
        $emptyemail = 'Please enter your email address';
    }
    if (empty($cust_password)) {
        $emptypass = 'Please enter your password';
    }

    if (!empty($email) && !empty($cust_password)) {
        $sql = "SELECT email, customer_password FROM customer WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['customer_password'];
            if (password_verify($cust_password, $hashed_password)) { 
                $_SESSION['email'] = $email;
                header('location: user/homepage.php');
                exit; 
            } else {
                echo 'Incorrect password';
            }
        } else {
            echo 'Email not found';
        }
    }
}
?>



<?php  include"includes/header.php";?>


<?php  include"includes/nav.php";?>   


<div class="top" style="margin-left: 60px; text-align:center;margin-bottom: 20px; margin-top: 100px;">
                  <h1 style="color:#090b17;font-family: Circular, Arial, sans-serif;font-size: 40px;font-weight: 700;" >Welcome To ASTHAA</h1>
                  <p>Login here</p>
            </div>
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4" style=" background-color: whitesmoke; border: 0 solid #000000; border-radius: 15px;  width:36%;margin: 0 35% 0; box-shadow: 0 4px 8px 10px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
            <form action="login.php" method="post" style=" margin:5%;">
                <div class="mt-2.5" style="margin-top : 50px;">
                    <label class="form-label" style=" margin-top : 5% ; font-family: sans-serif; font-weight: 600;">
                        Email
                    </label>
                    <input type="email" class="form-control" name="email" placeholder="TYPE YOUR EMAIL"
                           value="<?php if (isset($_POST['submit'])) {
                               echo $email;
                           } ?>">
                    <?php if (isset($_POST['submit'])) {
                        echo "<span class='text-danger'>" . $emptyemail . "</span>";
                    } ?>

                </div>
                <div class="mt-2.5" style=" margin-top: 10px;">
                    <label class="form-label" style="font-family: sans-serif; font-weight: 600;">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="TYPE YOUR PASSWORD">
                    <?php if (isset($_POST['submit'])) {
                        echo "<span class='text-danger'>" . $emptypass . "</span>";
                    } ?>

                </div>
                <div class="box" style="display: flex; margin-top: 10px;">
                    <div class="CheckboxField" style="margin-top: 4px;">
                        <div class="field"><input id="rememberme" type="checkbox" data-gtm-form-interact-field-id="0">
                        </div>
                    </div>
                    <h6 style="margin-left: 5px;" class="rem" color="black"><label for="rememberme">Stay signed
                            in</label></h6>
                </div>
                <div class="mt-3" style="display :flex;">
                    <form action="homepage.php" method="post" style=" margin:5%;">
                    <button class="btn btn-success" name="submit" style="width: 20%;" value="submit">Login</button>
                    <p class="re-set" style="margin-left: 120px; margin-top: 4px;">
                        Forgot your password?
                        <a href="re-set.php">Reset</a>
                    </p>
                </div>
            </form>
           <div class="register" style= "margin-left: 5%;">
           <div class="reg" style="margin-top:50px; margin-left:3px">
                <h4>Register</h4>
            </div>
               
            <div class="sign-up" style="display:flex;">
                                    <h5 style="margin-right :25px">                                                                           
                                    <a href="cus-sign.php"><button class="btn btn-success" name="submit" value="submit" style="border-radius:5%;width: 100%;" >Signup</button></a>                         
                                </h5>                        
                      </div>     
                  </div>  
              </div>
        <div class="col-4"></div>
    </div>
</div>

<?php include"includes/footer.php";?>  