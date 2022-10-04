<?php 

session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
     echo "<script> alert('Please Login ');</script>";
     header("Location: login.php");
    
}
?>