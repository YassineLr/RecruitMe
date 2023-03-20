<?php
include '../vendor/autoload.php';

class Signup extends Dbhandler
{
    
    protected function checkEmail($username, $email)
    {

        $_SESSION["gmail"] = $email;
        $verification_code = rand(100000, 999999);
        $_SESSION["code"] = $verification_code;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($user_agent, 'MSIE') !== false) {
            $browser_name = 'Internet Explorer';
        } elseif (strpos($user_agent, 'Trident') !== false) { // IE 11
            $browser_name = 'Internet Explorer';
        } elseif (strpos($user_agent, 'Edge') !== false) {
            $browser_name = 'Microsoft Edge';
        } elseif (strpos($user_agent, 'Firefox') !== false) {
            $browser_name = 'Mozilla Firefox';
        } elseif (strpos($user_agent, 'Chrome') !== false) {
            $browser_name = 'Google Chrome';
        } elseif (strpos($user_agent, 'Safari') !== false) {
            $browser_name = 'Apple Safari';
        } else {
            $browser_name = 'Unknown';
        }
        $os = PHP_OS;
        if ($os == "Darwin") {
            $os = "MacOS";
        }

        $subject = "[RecruitMe] Veuillez verifier votre appareil";

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fbelkhyate@gmail.com'; // replace with your Gmail email address
        $mail->Password = 'rbuecudacrfalope'; // replace with your Gmail password
        $mail->SMTPSecure = 'tls'; // set TLS encryption
        $mail->Port = 587;
        // Set the email details
        $mail->setFrom('fbelkhyate@gmail.com', 'Recruit Me'); // replace with your name and email address
        $mail->addAddress($email, 'Client');
        $mail->isHTML(true);

        $mail->Subject = $subject;

        $mail->Body = "<html>
        <head>
            <title>Vérification</title>
        </head>
        <body>
            <h1>Bonjour {$username}!</h1>
            <p> Une tentative de connexion nécessite une vérification supplémentaire car nous n'avons pas reconnu votre appareil.</p>
            <p> Pour terminer la connexion, entrez le code de vérification sur l'appareil non reconnu. Appareil : {$browser_name} sur {$os} <br>Code de vérification : {$verification_code}</p>
            <h1 style=color:#00b4ff;align-text:center;width:100%;>RecruitMe</h1>
        </body>
        </html>";

        // Attempt to send the email
        if ($mail->send()) {
            header("location: /RecruitMe/views/client/email-verification.php");
        } else {
            echo 'Error: ' . $mail->ErrorInfo;
        }
    }

    protected function setUser($username, $email, $password, $user_type)
    {
        $_SESSION["type"] = $user_type;


        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)');


        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);


        if (!$stmt->execute(array($username, $email, $hashedpwd, $user_type))) {
            $stmt = null;

            header("location: ../../views/client/sign-up-login.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }



    protected function checkUser($username, $email)
    {

        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        //we want to know about if the sql stmt fails 
        if (!$stmt->execute(array($username, $email))) {  //we used an array because we have more than one piece of data
            $stmt = null;
            //send the user back to index page if the stmt fails
            header("location: ../../views/client/sign-up-login.php?error=stmtfailed");
            exit();
        }

        //check if any rows that returned from the query  
        $resultCheck = null;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}
