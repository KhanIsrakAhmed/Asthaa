<?php
session_start();

include('../config/db_connect.php');

?>

<?php
$sql = "SELECT first_name FROM customer WHERE email = '{$_SESSION['email']}'"; 
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
} else {
    $first_name = ''; 
}
?>
<?php  include "user-includes/userheader.php";?>

<?php  include "user-includes/usernav.php";?>


<div class="profile">
                 <h1> Hello <?php echo  $first_name; ?> </h1>
</div>


  <?php  include "user-includes/userfooter.php";?>
