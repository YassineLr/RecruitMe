<?php






                
if (!empty($_GET['idcandidat'])) {
    include_once('./db_classes.php');

    $database = new Dbhandler();
    $db = $database->connect();
    $sql = 'SELECT resume FROM candidats where id_candidat=?';

    $stmt = $db->prepare($sql);
    $stmt->execute([$_GET["idcandidat"]]);
    $path = $stmt->fetchColumn();
    $filepath = $path;

    if (file_exists($filepath)) {
        // Define Headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=cv.pdf");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");

        readfile($filepath);
        exit;
    } else {
        echo "This File Does not exist.";
    }
}
