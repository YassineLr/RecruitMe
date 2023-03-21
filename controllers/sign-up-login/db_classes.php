<?php
session_start();
class Dbhandler{

    public function connect(){
       try {
        $username = "root";
        $password = "";
        $dbh = new PDO('mysql:host=localhost;dbname=sign_up_database', $username, $password);
        return $dbh;
       } catch (PDOException $e) {
        print "Error!: " .$e->getMessage() ."<br/>";
        die();
       }
    }
}

?>