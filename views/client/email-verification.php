
<?php

session_start();
$vercode = "334526656fghwDFGR7";
$vercode .= substr($_SESSION['code'],0,2);
$vercode .= "24ynh4fdgb35";
$vercode .= substr($_SESSION['code'],2,4);
$vercode .= "dfvbre334";
$vercode .= substr($_SESSION['code'],4,6);
$vercode .= "4367wfwreg234r3s3";
if($_SESSION['type']=='candidat'){
    $vercode .= "1";
}
else{
    $vercode .= "9";

}
setcookie("vercode", $vercode, time() + 60);

//334526656fghwDFGR75624ynh4fdgb356512dfvbre334124367wfwreg234r3s31



?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/stylesheets/email-verification.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <title>Login and Signup Form </title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <!-- login page -->
    <div class="header-patern"></div>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <i class="fa-regular fa-lock-keyhole" style="font-size: 70px; color: #00b4ff;"></i>
                <h1>Vérification</h1>
                <span style="text-align: left;">
                    Entrer le code de vérification:
                </span>
                <div class="codes-wrapper">
                    <input name='code' class='code-input' required />
                    <input name='code' class='code-input' required />
                    <input name='code' class='code-input' required />
                    <input name='code' class='code-input' required />
                    <input name='code' class='code-input' required />
                    <input name='code' class='code-input' required />
                </div>
                <div class="timer">
                    <p>Le code expirera dans: </p>
                    <label id="minutes">01</label>:<label id="seconds">00</label>
                </div>
                <a href="/RecruitMe/views/client/sign-up-login.php" id="notice">Envoyer un autre code</a>

            </div>

        </div>


        <!-- JavaScript -->
        <script src="/RecruitMe/public/javascript/email-verification.js"></script>
</body>

</html>

