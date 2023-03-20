<?php
session_start();


if (isset($_POST["submit"])) {
    //grabbing the data
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //instantiate signup controller class
    include "../sign-up-login/db_classes.php";
    include "../sign-up-login/login-classes.php";
    include "../sign-up-login/login-controller.php";

    $login = new LoginContr($email, $password);


    // //running error handlers and user signup 
    $login->loginUser();
    //going back to front page 
    $_SESSION["token"] = "true";
    // print_r($_SESSION);
    $usertype = $_SESSION["usertype"];
    // echo $usertype;

    if($usertype == "candidat"){
        header("location: /RecruitMe/controllers/candidat-forms/dashboard.php");
        // echo $usertype;

    }
    elseif($usertype == "recruteur"){
        header("location: /RecruitMe/controllers/candidat-forms/dashboard-rec.php");

    }
    else{
        // header("location: /RecruitMe/controllers/candidat-forms/dashboard-rec.php");
        echo "error";
    }
}

?>