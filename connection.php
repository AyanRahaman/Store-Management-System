<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "store_db";


$conn = new mysqli($hostname,$username,$password,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//   echo "Connected successfully";



?>