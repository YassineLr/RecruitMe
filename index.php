<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login and Signup Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="\draft6\css\style.css">
                
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
                    <form action="\draft6\includes\login.php" method="post">
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
                            <button type="submit" name="submit">Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                    </div>
                </div>

                <!-- <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="images/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div> -->

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>Signup</header>
                    
                    <form action="\draft6\includes\signup.php" method="post">
                        <div class="field input-field">
                            <input type="text" placeholder="Username" class="input" name="username">
                        </div>
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Create password" class="password" name="password">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Confirm password" class="password" name="cpassword">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-select-specify-account">
                           <select value="" name="user_type">
                            <option name="candidate" value="candidat">Candidat</option>
                            <option name="recruiter" value="recruteur">Recruteur</option>
                           </select>
                            
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="submit"  > Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                    </div>
                </div>
                
                <!-- <div class="line"></div>  

                 <div class="media-options">
                    <a href="#" class="field google">
                        <img src="images/google.png" alt="" class="google-img">
                        <span>Sign up with Google</span>
                    </a>
                </div> -->

            </div>
        </section>

        <!-- JavaScript -->
        <script src="\draft6\js\script.js"></script>
    </body>
</html>