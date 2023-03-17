<?php

$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=localhost;dbname=recruit_me",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} catch(PDOException $e){
    echo "Connection failed" . $e->getMessage();
}

?>