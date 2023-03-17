<?php
session_start();

include "../sign-up-login/db_classes.php";
include "../sign-up-login/signup-classes.php";
include "../sign-up-login/signup-controller.php";
if (isset($_POST["submit"])) {
    //grabbing the data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $user_type = $_POST["user_type"];
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["cpassword"] = $cpassword;
    $_SESSION["type"] = $user_type;
    $checked = false;
    

    $signup = new SignupContr($username, $email, $password, $cpassword, $user_type);
  

    //running error handlers and user signup 
    $signup->signupUser($checked);
 
 
    
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["checked"])){
        $checked = $_POST["checked"];
        $username = $_SESSION["username"] ;
        $email = $_SESSION["email"]  ;
        $password = $_SESSION["password"];
        $cpassword = $_SESSION["cpassword"] ;
        $user_type = $_SESSION["type"];
    
        echo $email;
        echo $username;
        echo $password;
        echo $cpassword;
        echo $user_type;
        
    
        $signup = new SignupContr($username, $email, $password, $cpassword, $user_type);
    
    
        $signup->signupUser($checked);
    
    }
    

}
