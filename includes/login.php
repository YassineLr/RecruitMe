<?php

if (isset($_POST["submit"])) {
    //grabbing the data
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    

    //instantiate signup controller class
    include "../classes/db_classes.php";
    include "../classes/login-classes.php";
    include "../classes/login-controller.php";

    $login = new LoginContr($email, $password);


    //running error handlers and user signup 
    $login->loginUser();
    //going back to front page 
    header("location: ../index.php?error=none");

    
    
}
?>