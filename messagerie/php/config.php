<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sign_up_database";

  try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
  }
?>


  
  

