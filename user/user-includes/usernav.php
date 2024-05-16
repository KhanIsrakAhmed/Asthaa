
<?php
session_start();

include('../config/db_connect.php'); ?>

<?php
$sql = "SELECT first_name FROM customer WHERE email = '{$_SESSION['email']}'"; 
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
} else {
    $first_name = ''; 
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  $_SESSION = array();

  session_destroy();
  header("Location: login.php"); 
  exit; 
}


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $_SESSION = array();
    session_destroy();
    header("Location: ../login.php");
    exit; 
}
?>






<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav" style=" background-color: #0c1010;" >
    <div class="navi" style="display: contents;"  >
      
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="homepage.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="#company">Company</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#policy">Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="../login.php">Admin Log In </a>
          </li>
        </ul>
        </div>

<div class="user" style="padding-left: 5%;">
    <li class="dropdown" style="color: #fff; text-transform: uppercase; font-weight: 600;">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i> <?php echo $first_name; ?> 
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="../login.php?action=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a> 
            </li>
        </ul>
    </li>
</div>
    </div>
  </nav>

 