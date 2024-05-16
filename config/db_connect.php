<?php
$conn = new mysqli('localhost', 'root', '', 'asthaa');

if(!$conn){
    echo 'Connection error: ';
    // . mysqli_connect_error()
}

?>