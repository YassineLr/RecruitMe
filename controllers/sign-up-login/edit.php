<!-- edit.php -->

<?php
    session_start();
    include_once('./db_classes.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $categorie = $_POST['categorie'];
            $titre_emploi  = $_POST['titre_emploi'];
            $type_emploi = $_POST['type_emploi'];
            $competence = $_POST['competence'];
            $salaire = $_POST['salaire'];
            $annee = $_POST['annee'];
            $adresse = $_POST['adresse'];
            $expiration = $_POST['expiration'];
            $description = $_POST['description'];
 
            $sql = "UPDATE job_list SET categorie = '$categorie', titre_emploi = '$titre_emploi', competence = '$competence', salaire = '$salaire', annee = '$annee', adresse = '$adresse', expiration = '$expiration', description = '$description' WHERE id = '$id' ";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Member updated successfully' : 'Something went wrong. Cannot update member';
 
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Fill up edit form first';
    }
 

    //change the file 
    header('location: view-resume.php');
 


?>


