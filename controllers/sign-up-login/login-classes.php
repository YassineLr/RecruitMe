<?php
class Login extends Dbhandler{

    protected function getUser($email,$password){
        
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? OR password = ?;');


        
        
        
        if (!$stmt->execute(array($email,$password))) {  
            $stmt = null;
            
            header("location: ../../views/client/sign-up-login.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../../views/client/sign-up-login.php?error=usernotfound");
            exit();

        
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        $checkPwd = password_verify($password, $pwdHashed[0]["password"]);


        if($checkPwd == false){
            $stmt = null;
            header("location: ../../views/client/sign-up-login.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT password FROM users WHERE  email = ? AND password = ?;');

            if (!$stmt->execute(array($email,$password))) {  
                $stmt = null;
                
                header("location: ../../views/client/sign-up-login.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start(); 
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["email"] = $user[0]["email"];

        }
        $stmt = null;

       
    }

}


?>