<?php

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
    header("location: /RecruitMe/views/candidats/fill-method.php");
    
}

?>