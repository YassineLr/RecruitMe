<?php
include "./db_classes.php";

class Login extends Dbhandler
{

    public function getUser($email, $password)
    {

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? OR password = ?;');

        if (!$stmt->execute(array($email, $password))) {
            $stmt = null;

            header("location: ../../views/client/sign-up-login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../../views/client/sign-up-login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["password"]);


        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../../views/client/sign-up-login.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT password FROM users WHERE  email = ? AND password = ?;');

            if (!$stmt->execute(array($email, $password))) {
                $stmt = null;

                header("location: ../../views/client/sign-up-login.php?error=stmtfailed");
                exit();
            }
            $userinfos = array("user"=>[],"edu"=>[],"exp"=>[],"skills"=>[],"lang"=>[]);
            session_start();
            $stmt = $this->connect()->prepare('SELECT * FROM candidats WHERE email = ?');
            if ($stmt->execute([$email])) {
                $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);
                // $_SESSION["user"] = $userinfo;
                $userinfos["user"] = $userinfo;

                $stmt = null;

                if ($userinfo["id_candidat"]) {
                    $stmt = $this->connect()->prepare('SELECT education.* FROM education JOIN candidats ON candidats.id_candidat = education.id_candidat WHERE candidats.id_candidat=?');
                    $stmt->execute([$userinfo["id_candidat"]]);
                    $userEdu = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $userinfos["edu"] = $userEdu;


                    $stmt = null;
                    $stmt = $this->connect()->prepare('SELECT experience.* FROM experience JOIN candidats ON candidats.id_candidat = experience.id_candidat WHERE candidats.id_candidat=?');
                    $stmt->execute([$userinfo["id_candidat"]]);
                    $userExp = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $userinfos["exp"] = $userExp;


                    $stmt = null;
                    $stmt = $this->connect()->prepare('SELECT skills.* FROM skills JOIN candidats ON candidats.id_candidat = skills.id_candidat WHERE candidats.id_candidat=?');
                    $stmt->execute([$userinfo["id_candidat"]]);
                    $userSkills = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $userinfos["skills"] = $userSkills;

                    $stmt = null;
                    $stmt = $this->connect()->prepare('SELECT languages.* FROM languages JOIN candidats ON candidats.id_candidat = languages.id_candidat WHERE candidats.id_candidat=?');
                    $stmt->execute([$userinfo["id_candidat"]]);
                    $userLang = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $userinfos["lang"] = $userLang;

                    
                }
                $_SESSION["user"] = $userinfos;


                // try{

                // }
                // catch (PDOException $e) {
                //     // Handle the exception here
                //     echo "Error: " . $e->getMessage();
                // }

            }
        }
        $stmt = null;
    }
}

// $t = new Login();
// $t->getUser("fbelkhyate@gmail.com","1234");

// $y = $_SESSION["userEdu"];
// echo $y["diplomat"];
