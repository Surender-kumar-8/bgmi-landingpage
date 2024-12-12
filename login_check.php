<?php
session_start();
include("connection.php");

$email = $_POST['eml'];
$password = $_POST['pwd'];


$_SESSION["error"] = [];
if(empty($email)){
    $_SESSION["error"]["email_error"] = "* Email is Required.";
}  
if(empty($password)){
    $_SESSION["error"]["password_error"] = "* Password is Required.";
} 

$sql = "SELECT * from players WHERE email='$email' AND password='$password' ";

$result = mysqli_query($conn,$sql);

$numRow = mysqli_num_rows($result);
// echo "<pre>";echo print_r($numRow);echo "</pre>";die;
if($numRow == 0){
    header("location:tournament1.php?error".mysqli_connect_error());
}else{
    $userData = mysqli_fetch_assoc($result);
    $_SESSION['user_email']=$email;
    $_SESSION['user_id']=$userData['id'];
    $_SESSION['user_data']=$userData; 
    header("location:tournament1.php");
}