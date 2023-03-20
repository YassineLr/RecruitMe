<!-- delete.php -->
<?php
    session_start();
    include_once('./db_classes.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM candidats WHERE id_candidats = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Member deleted successfully' : 'Something went wrong. Cannot delete member';
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
 
    }
    else{
        $_SESSION['message'] = 'Select member to delete first';
    }
    //change the file job post or page 
    header('location: view-candidates.php');
   
    // session_start();
    // include_once('connection.php');
 
    // if(isset($_GET['id'])){
    //     $database = new Connection();
    //     $db = $database->open();
    //     try{
    //         $stmt = $db->prepare("DELETE FROM job_list WHERE id = ?");
    //         $stmt->execute(array($_GET['id']));
    //         $_SESSION['message'] = ($stmt->rowCount() == 1) ? 'Member deleted successfully' : 'Something went wrong. Cannot delete member';
    //     }
    //     catch(PDOException $e){
    //         $_SESSION['message'] = $e->getMessage();
    //     }
 
    //     //close connection
    //     $database->close();
 
    // }
    // else{
    //     $_SESSION['message'] = 'Select member to delete first';
    // }
    // //change the file job post or page 
    // header('location: jobpost.php');
 
?>

    
 





