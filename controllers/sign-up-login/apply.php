<?php

$id_job = $_GET["idjob"];
$id_candidat = $_GET["idcandidat"];

include_once('./db_classes.php');

$database = new Dbhandler();
$db = $database->connect();

try {
    $sql = 'INSERT INTO applies (id_candidat, id_job)VALUES (?,?) ;';
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_candidat,$id_job]);

} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}

header("location: /RecruitMe/controllers/candidat-forms/dashboard.php");




?>