<?php
session_start();
class SignupContr extends Signup{
   //variables are the properties inside the class
     private $username;
     private $email;
     private $password;
     private $cpassword;
     private $user_type;
   

     public function __construct($username, $email, $password, $cpassword, $user_type){// variables we grab from the user 
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->user_type = $user_type; 

     }


     public function signupUser($checked){
      if ($this->emptyInput() == false) {
         // echo "empty input!!;
         header("location: ../../views/client/sign-up-login.php?error=emptyinput");
         exit();
      }

      if ($this->invalidUid() == false) {
         // echo "invalid username!!;
         header("location: ../../views/client/sign-up-login.php?error=username");
         exit();
      }

      if ($this->invalidEmail() == false) {
         // echo "invalid email!!;
         header("location: ../../views/client/sign-up-login.php?error=email");
         exit();
      }

      if ($this->pwdMatch() == false) {
         // echo "passwords don't match!!;
         header("location: ../../views/client/sign-up-login.php?error=passwordmatch");
         exit();
      }

      if ($this->uidTakenCheck() == false) {
         // echo "username or email taken!!;
         header("location: ../../views/client/sign-up-login.php?error=useroremailtaken");
         exit();
      }
      // if ($this->checkEmail() == false)
      
      if($checked==true){
         $this->setUser($this->username,$this->email, $this->password, $this->user_type);
         $_SESSION["token"] = "true";
      }
      else{
         $this->checkEmail($this->username,$this->email);

      }
      
   

  }

  

     private function emptyInput(){
         $result = null;
         if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->cpassword) || empty($this->user_type)){
            $result = false;
         }else{
            $result = true;
         }
         return $result;
     }

     private function invalidUid(){

      $result = null;
      if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){
         $result = false;
      }else{
         $result = true;
      }
      return $result;
     }

     private function invalidEmail(){
      $result = null;
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
         $result = false;
      }else{
         $result = true;
      }
      return $result;
     }
     private function pwdMatch(){
      $result = null;
      if($this->password !== $this->cpassword){
         $result = false;
      }else{
         $result = true;
      }
      return $result;
     }

     private function uidTakenCheck(){
      $result = null;
      if(!$this->checkUser( $this->username,$this->email)){
         $result = false;
      }else{
         $result = true;
      }
      return $result;
     }

}
