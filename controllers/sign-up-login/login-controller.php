<?php

class LoginContr extends Login{
   //variables are the properties inside the class
    
     private $email;
     private $password;
     

     public function __construct($email, $password){// variables we grab from the user 
        
        $this->email = $email;
        $this->password = $password;

        
     }


     public function loginUser(){
      if ($this->emptyInput() == false) {
         // echo "empty input!!;
         header("location: ../../views/client/sign-up-login.php?error=none");
         exit();
      }

      

      
      $this->getUser($this->email, $this->password); 


  }



     private function emptyInput(){
         $result = null;
         if(empty($this->email) || empty($this->password)){
            $result = false;
         }else{
            $result = true;
         }
         return $result;
     }

    

}








?>