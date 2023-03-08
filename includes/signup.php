<?php

if (isset($_POST["submit"])) {
    //grabbing the data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $user_type = $_POST["user_type"];
    

    //instantiate signup controller class
    include "../classes/db_classes.php";
    include "../classes/signup-classes.php";
    include "../classes/signup-controller.php";

    $signup = new SignupContr($username, $email, $password, $cpassword, $user_type);


    //running error handlers and user signup 
    $signup->signupUser();
    //going back to front page 
    header("location: ../index.php?error=none");

    
    
}
?>