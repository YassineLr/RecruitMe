<?php
include '../vendor/autoload.php';

include "/RecruitMe/controllers/candidat-forms/Resume.php";
include "/RecruitMe/controllers/candidat-forms/send-resume-controller.php";




include "../sign-up-login/db_classes.php";

include '../vendor/autoload.php';


class CandidatsResume extends Dbhandler
{
    public function setResume($form)
    {

        $pers_count = 0;
        $edu_count = 0;
        $exp_count = 0;
        $skill_count = 0;
        $lang_count = 0;

        // Loop through all form inputs
        foreach ($_POST as $name => $value) {
            // Check if input belongs to personal category
            if (strpos($name, 'pers-input-') === 0) {
                $pers_count++;
            }
            // Check if input belongs to education category
            elseif (strpos($name, 'education-input-') === 0) {
                $edu_count++;
            } elseif (strpos($name, 'exp-input-') === 0) {
                $exp_count++;
            } elseif (strpos($name, 'skill-input-') === 0) {
                $skill_count++;
            } elseif (strpos($name, 'lang-input-') === 0) {
                $lang_count++;
            }
        }

        // Print the counts for each category
        echo "Number of personal inputs: " . $pers_count . "<br>";
        echo "Number of education inputs: " . $edu_count . "<br>";
        echo "Number of education inputs: " . $exp_count . "<br>";
        echo "Number of education inputs: " . $skill_count . "<br>";
        echo "Number of education inputs: " . $lang_count . "<br>";

        for ($x = 0; $x < $pers_count; $x++) {
            $pers_array[$x] = $form["pers-input-" . $x];
        }

        for ($x = 0; $x < 6; $x++) {
            $edu_array[$x] = $form["education-input-" . $x];
        }

        for ($x = 0; $x < 6; $x++) {
            $exp_array[$x] = $form["exp-input-" . $x];
        }

        for ($x = 0; $x < $skill_count; $x++) {
            $skill_array[$x] = $form["skill-input-" . $x];
        }

        for ($x = 0; $x < $lang_count; $x++) {
            $lang_array[$x] = $form["lang-input-" . $x];
        }


        try {
            $stmt = $this->connect()->prepare('SELECT id FROM users WHERE email = ?');
            $stmt->execute([$form["pers-input-3"]]);
            $user = $stmt->fetch();
            $pers_array[12]=$user[0];
            echo "<pre>";
            print_r($pers_array);
            echo "</pre>";
            echo "<pre>";
            print_r($edu_array);
            echo "</pre>";
            echo "<pre>";
            print_r($exp_array);
            echo "</pre>";
            echo "<pre>";
            print_r($skill_array);
            echo "</pre>";
            echo "<pre>";
            print_r($lang_array);
            echo "</pre>";
            $stmt = $this->connect()->prepare('SELECT id_user FROM candidats WHERE email = ?');
            $stmt->execute([$form["pers-input-3"]]);
            $user_exist = $stmt->fetch();

            echo $user;
            // $stmt=null;
            // if ($user) {
            //     if($user_exist){
            //         header("location: /RecruitMe/views/candidats/dashboard.php");

            //     }
            //     else{
            //         $stmt = $this->connect()->prepare('INSERT INTO candidats (photo, fname, lname, email, phone, adress, city, zip_code, birth_date, birth_city, origin, gender,id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            //         $stmt->execute($pers_array);
            //         for($x = 0; $x < $edu_count; $x++){
            //             $stmt = $this->connect()->prepare('INSERT INTO education (diplomat, establishment, city, b_date, f_date, description, id_candidat) VALUES (?, ?, ?, ?, ?, ?, ?)');
            //             $stmt->execute($edu_array);
            //         }
            //         header("location: /RecruitMe/views/candidats/dashboard.php");

            //     }
            //     // If the user exists, insert a new row into the candidats table with the specified user ID
                
                



            // } else {
            //     // If the user does not exist, handle the error here
            //     echo "Error: user with ID $user does not exist";
            // }
        } catch (PDOException $e) {
            // Handle the exception here
            echo "Error: " . $e->getMessage();
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //grabbing the data
    foreach ($_POST as $formName => $formData) {
        // Store the input values in the array
        $formDataArray[$formName] = $formData;
    }

    $formSend = new CandidatsResume();
    $formSend->setResume($formDataArray);
}
