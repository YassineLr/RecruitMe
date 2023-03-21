

<?php
    session_start();
    include_once('./db_classes.php');
 
    if(isset($_POST['categorie'])){
        $database = new Dbhandler();
        $db = $database->connect();
        print_r($_POST);
        try{
            //use prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO job_list(categorie, titre_emploi, type_emploi, competence, salaire, annee, adresse, expiration, description) VALUES (:categorie, :titre_emploi, :type_emploi, :competence, :salaire, :annee, :adresse, :expiration, :description)");
            //if-else statement in executing our prepared statement 
            $_SESSION['message'] = ( $stmt->execute(array(':categorie' => $_POST['categorie'], ':titre_emploi' => $_POST['titre'],':type_emploi' => $_POST['type-emploi'], ':competence' => $_POST['competence'], ':salaire' => $_POST['salaire'], ':annee' => $_POST['experience'], ':adresse' => $_POST['adresse'], ':expiration' => $_POST['date'], ':description' => $_POST['description'])) ) ? 'Member added successfully' : 'Something went wrong. Cannot add member';  
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
    }
 
    else{
        $_SESSION['message'] = 'Fill up add form first';
    }
 



    //change the file to either view-resume or page 
     header('location: /RecruitMe/controllers/candidat-forms/dashboard-rec.php');


     
?>
 





 