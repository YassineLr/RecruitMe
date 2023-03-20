<?php
include '../vendor/autoload.php';

include "../sign-up-login/db_classes.php";

session_start();
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


        for ($x = 0; $x < $pers_count; $x++) {
            $pers_array[$x] = $form["pers-input-" . $x];
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
            $email = $form["pers-input-3"];
            $stmt = $this->connect()->prepare('SELECT id FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user_exist = $stmt->fetch();
            echo $email;
            echo $user_exist[0];
            $emailPath = $_SESSION["emailupload"];
            $pers_array[12] = $user_exist[0];
            $pers_array[13] = $emailPath;


            $user = null;

            // $_SESSION["userId"] = $user[0];
    

            if ($user_exist) {

                if ($user) {
                    header("location: /RecruitMe/controllers/candidat-forms/dashboard.php");
                } else {
                    $stmt = $this->connect()->prepare('INSERT INTO candidats (photo, fname, lname, email, phone, adress, city, zip_code, birth_date, birth_city, origin, gender,id_user,resume) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                    $stmt->execute($pers_array);
                    $stmt = null;

                    $stmt = $this->connect()->prepare('SELECT id_candidat FROM candidats WHERE email = ?');
                    $stmt->execute([$email]);
                    $user = $stmt->fetch();

                    $edu_array[6] = $user[0];
                    $num_arrays = ceil($edu_count / 6); // calculate the number of arrays needed

                    for ($i = 0; $i < $num_arrays; $i++) {

                        $edu_array = array();

                        $start_index = $i * 6;
                        $end_index = min($start_index + 6, $edu_count);

                        for ($j = $start_index; $j < $end_index; $j++) {
                            $edu_array[$j % 6] = $form["education-input-" . $j];
                        }
                        $edu_array[6] = $user[0];

                        echo "<pre>";
                        print_r($edu_array);
                        echo "</pre>";

                        $stmt = $this->connect()->prepare('INSERT INTO education (diplomat, establishment, city, b_date, f_date, description, id_candidat) VALUES (?, ?, ?, ?, ?, ?, ?)');
                        $stmt->execute($edu_array);
                    }

                    $num_arrays = ceil($exp_count / 6); // calculate the number of arrays needed

                    for ($i = 0; $i < $num_arrays; $i++) {

                        $exp_array = array();

                        $start_index = $i * 6;
                        $end_index = min($start_index + 6, $exp_count);

                        for ($j = $start_index; $j < $end_index; $j++) {
                            $exp_array[$j % 6] = $form["exp-input-" . $j];
                        }
                        $exp_array[6] = $user[0];

                        echo "<pre>";
                        print_r($exp_array);
                        echo "</pre>";

                        $stmt = $this->connect()->prepare('INSERT INTO experience (role, city, entreprise, b_date, f_date, description, id_candidat) VALUES (?, ?, ?, ?, ?, ?, ?)');
                        $stmt->execute($exp_array);
                    }

                    $num_arrays = ceil($skill_count / 2); // calculate the number of arrays needed

                    for ($i = 0; $i < $num_arrays; $i++) {

                        $skill_array = array();

                        $start_index = $i * 2;
                        $end_index = min($start_index + 2, $skill_count);

                        for ($j = $start_index; $j < $end_index; $j++) {
                            $skill_array[$j % 2] = $form["skill-input-" . $j];
                        }
                        $skill_array[2] = $user[0];

                        echo "<pre>";
                        print_r($skill_array);
                        echo "</pre>";

                        $stmt = $this->connect()->prepare('INSERT INTO skills (skill_name, level, id_candidat) VALUES (?, ?, ?)');
                        $stmt->execute($skill_array);
                    }


                    $num_arrays = ceil($lang_count / 2); // calculate the number of arrays needed

                    for ($i = 0; $i < $num_arrays; $i++) {

                        $lang_array = array();

                        $start_index = $i * 2;
                        $end_index = min($start_index + 2, $lang_count);

                        for ($j = $start_index; $j < $end_index; $j++) {
                            $lang_array[$j % 2] = $form["lang-input-" . $j];
                        }
                        $lang_array[2] = $user[0];

                        echo "<pre>";
                        print_r($lang_array);
                        echo "</pre>";

                        $stmt = $this->connect()->prepare('INSERT INTO languages (lang, level, id_candidat) VALUES (?, ?, ?)');
                        $stmt->execute($lang_array);
                    }
                    echo "erjg";

                    header("location: /RecruitMe/controllers/candidat-forms/dashboard.php");
                }
            } else {
                // If the user does not exist, handle the error here
                echo "Error: user with ID $user_exist[0] does not exist";
            }
        } catch (PDOException $e) {
            // Handle the exception here
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUser($id,$attr)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM candidats WHERE id_candidat = ?');
        $stmt->execute([$id]);
        $userinfo = $stmt->fetch();
        // echo $userinfo['email'];
        return $userinfo[$attr];
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //grabbing the data
    foreach ($_POST as $formName => $formData) {
        // Store the input values in the array
        $formDataArray[$formName] = $formData;
    }


    $formSend = new CandidatsResume();
    $_SESSION["token"] = "true";
    $formSend->setResume($formDataArray);
    // echo $formSend->getUser("14", "email");
}
