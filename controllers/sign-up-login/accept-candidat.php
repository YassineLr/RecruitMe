<?php


$id_candidat = $_GET["idcandidat"];
$id_job = $_GET["idjob"];

include_once('./db_classes.php');

$database = new Dbhandler();
$db = $database->connect();

try {
    $sql = 'UPDATE applies SET accepted=? where id_candidat=? and id_job=?;';
    $stmt = $db->prepare($sql);
    $stmt->execute([true,$id_candidat,$id_job]);

} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}

header("location: /RecruitMe/controllers/candidat-forms/dashboard-rec.php");



?>