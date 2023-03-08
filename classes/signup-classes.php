<?php
class Signup extends Dbhandler{

    protected function setUser($username, $email,$password,$user_type){
        
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)');


        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        
        
        if (!$stmt->execute(array($username, $email,$hashedpwd, $user_type))) {  
            $stmt = null;
            
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;

       
    }



    protected function checkUser($username, $email){
        
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');
        
        //we want to know about if the sql stmt fails 
        if (!$stmt->execute(array($username, $email))) {  //we used an array because we have more than one piece of data
            $stmt = null;
            //send the user back to index page if the stmt fails
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        //check if any rows that returned from the query  
        $resultCheck = null;
        if ($stmt->rowCount() >0) {
            $resultCheck = false;
            
        }else{
            $resultCheck = true;
        }

        return $resultCheck;
    }

}


?>