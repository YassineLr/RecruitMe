<?php
    
    session_start();

    require_once "../../classes/db_classes.php";
    $h = new Dbhandler();
    $db = $h->connect();
    $outgoing_id = $_SESSION['id'];
    $searchTerm = $_POST['searchTerm'];

    $sql = "SELECT * FROM users WHERE NOT id = :outgoing_id AND (username LIKE :searchTerm)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':outgoing_id', $outgoing_id, PDO::PARAM_INT);
    $stmt->bindValue(':searchTerm', '%'.$searchTerm.'%', PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = "";
    if(count($result) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>











