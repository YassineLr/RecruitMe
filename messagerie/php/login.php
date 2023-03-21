<?php 
    
    session_start();
    include_once "config.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!empty($email) && !empty($password)){
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $stmt2 = $conn->prepare("UPDATE users SET status = :status WHERE id = :id");
                $stmt2->bindParam(':status', $status);
                $stmt2->bindParam(':id', $row['id']);
                if($stmt2->execute()){
                    $_SESSION['id'] = $row['id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }


?>