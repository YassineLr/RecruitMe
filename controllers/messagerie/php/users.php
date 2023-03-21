<?php

session_start();
require_once "../../sign-up-login/db_classes.php";
    $h = new Dbhandler();
    $db = $h->connect();
    $outgoing_id = $_SESSION['id_user'];
try{
    $sql = "SELECT * FROM users where user_type != ? ORDER BY id DESC";
    $stmt = $db->prepare($sql);
    $type = $_SESSION["usertype"];

    $stmt->execute([$type]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

catch(PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
          }
$output = "";
if($stmt->rowCount() == 0){
    $output .= "No users are available to chat";
}
elseif($stmt->rowCount()> 0){
    include_once "./data.php";
}
echo $output;
?>












