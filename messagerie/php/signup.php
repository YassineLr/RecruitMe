<?php
    
    session_start();
    include_once "config.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) > 0){
                echo "$email - This email already exists!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                $stmt = $conn->prepare("INSERT INTO users (id, fname, lname, email, password, img, status)
                                    VALUES (:ran_id, :fname, :lname, :email, :encrypt_pass, :new_img_name, :status)");
                                $stmt->bindValue(':ran_id', $ran_id, PDO::PARAM_INT);
                                $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
                                $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
                                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                                $stmt->bindValue(':encrypt_pass', $encrypt_pass, PDO::PARAM_STR);
                                $stmt->bindValue(':new_img_name', $new_img_name, PDO::PARAM_STR);
                                $stmt->bindValue(':status', $status, PDO::PARAM_STR);
                                if($stmt->execute()){
                                    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                                    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if(count($result) > 0){
                                        $_SESSION['id'] = $result[0]['id'];
                                        echo "success";
                                    }else{
                                        echo "This email address does not exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }






?>