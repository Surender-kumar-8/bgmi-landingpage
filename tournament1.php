<?php
session_start();
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email']) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
include("dashboard.php");
}else{
    echo "<h2>YOU ARE NOT A AUTHORISED PLAYERS SO PLEASE REGISTER FIRST</h2>";
}