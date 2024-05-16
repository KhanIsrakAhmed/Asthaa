<?php
session_start();
include '../config/db_connect.php';

if (isset($_POST['buy_now'])) {
    if (!isset($_SESSION['customer_id'])) {
        header("Location: login.php");
        exit; 
    }
    
    $customer_id = $_SESSION['customer_id'];
    $purchase_value = 80000;
    $policy_id = 1; 
    
    $sql = "INSERT INTO purchase (policy_id, customer_id, purchase_value) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $policy_id, $customer_id, $purchase_value);
    
    if ($stmt->execute()) {
        header("Location: purchase_confirmation.php");
        exit;
    } else {
        
        exit; 
    }
}
?>


<?php  include "user-includes/userheader.php";?>
<?php  include "user-includes/usernav.php";?>

<div class="card" style="background-image:url(img/house.jpg); margin: 10%; margin-left: 45%; width: 23rem; height: 400px; width: 18rem; background-color: rgba(255, 255, 255, 0.7); border: 0 solid #000000; border-radius: 15px; box-shadow: 0 4px 8px 10px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background-size: cover;">

  <div class="card-body">
    <h2 class="card-title" style="color: #000;background-color: #f5f5dca1;"><b>Home Policy</b></h2>
    <p class="card-text" style="color: #000;background-color: #f5f5dca1;"><span>Enjoy your 12 months policy only at 80000$</span></p>
    <div class="buy"style="margin: 23%; margin-top: 180px;" >
    <h1 class="" style="color: #000;background-color: #f5f5dca1;">80000$</h1>
    <a href="purchase.php" class="btn btn-primary" style="margin-left: 15%;">Buy Now</a>
    </div>
  </div>
</div>
<?php  include "user-includes/userfooter.php";?>
