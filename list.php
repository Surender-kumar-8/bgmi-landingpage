<?php
include("connection.php");

$sql= "SELECT * FROM players";
$result=mysqli_query($conn,$sql);
