<?php

session_start();
require_once "../../classes/db_classes.php";
    $h = new Dbhandler();
    $db = $h->connect();
    $outgoing_id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE NOT id = :outgoing_id ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute(['outgoing_id' => $outgoing_id]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = "";
if(count($result) == 0){
    $output .= "No users are available to chat";
}elseif(count($result)> 0){
    include_once "data.php";
}
echo $output;
?>












