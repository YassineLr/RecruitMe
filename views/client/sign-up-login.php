<?php 

session_start();
if(isset($_SESSION["token"])){
    header("location: /RecruitMe/controllers/candidat-forms/dashboard.php");

}

?>


<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../public/stylesheets/resume-form.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <title>Login and Signup Form </title>
        <script>
            // window.history.forward();
            // localStorage.setItem("token", "userToken");
        </script>
        <!-- CSS -->
        <link rel="stylesheet" href="/RecruitMe/public/stylesheets/sign-up-login.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <!-- login page -->
        <div class="header-patern"></div>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>
                    <form action="/RecruitMe/controllers/includes/login.php" method="post">
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="submit" id="login-btn">Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                    </div>
                </div>

              

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>Signup</header>
                    
                    <form action="/RecruitMe/controllers/includes/signup.php" method="post">
                        <div class="field input-field">
                            <input type="text" placeholder="Username" class="input" name="username">
                        </div>
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" id="signup-email" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Create password" class="password" name="password">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Confirm password" class="password" name="cpassword">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-select-specify-account">
                           <select class="form-select" value="" name="user_type">
                            <option name="candidate" value="candidat">Candidat</option>
                            <option name="recruiter" value="recruteur">Recruteur</option>
                           </select>
                            
                        </div>

                        <div class="field button-field">
                            <button type="submit" id="signup-btn" name="submit">Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                    </div>
                </div>
                
      

            </div>
        </section>

        <!-- JavaScript -->
        <script src="/RecruitMe/public/javascript/sign-up-login.js"></script>
    </body>
</html>