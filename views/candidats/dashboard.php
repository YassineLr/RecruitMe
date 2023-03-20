
<?php
// require_once '/RecruitMe/controllers/candidatforms/send-resume.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu | Side Navigation Bar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../public/stylesheets/resume-form.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    if(!localStorage.getItem("token")){
      window.location.href = "/RecruitMe/views/client/sign-up-login.php"
    };
  </script>
  
  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


  <!-- CSS -->
  <link rel="stylesheet" href="/RecruitMe/public/stylesheets/dashboard.css" />

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
</head>

<body>
  <div class="content-wrapper profile active" id="content-wrapper-profile">
    
  </div>
  <div class="content-wrapper opportunities" id="content-wrapper-opportunities">
    
  </div>
  <div class="content-wrapper messages" id="content-wrapper-messages">
    
  </div>
  <nav>
    <div class="logo">
      <i class="bx bx-menu menu-icon"></i>
      <span class="logo-name">RecruitMe</span>
    </div>

    <div class="sidebar">
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">RecruitMe</span>
      </div>

      <div class="sidebar-content">
        <ul class="lists">
          <li class="list">
            <a href="#" id="profile-link" class="nav-link">
              <i class="bx bx-home-alt icon"></i>
              <span class="link">Profile</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-bar-chart-alt-2 icon"></i>
              <span class="link">Opportunité</span>
            </a>
          </li>
          <li id="message" class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-message-rounded icon"></i>
              <span class="link">Messages</span>
            </a>
          </li>
        </ul>

        <div class="bottom-cotent">
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-heart icon"></i>
              <span class="link">Sauvegarde</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-cog icon"></i>
              <span class="link">Paramètres</span>
            </a>
          </li>
          <li class="list">
            <a href="/RecruitMe/controllers/includes/logout.php" id="logout" class="nav-link">
              <i class="bx bx-log-out icon"></i>
              <span class="link">Logout</span>
            </a>
          </li>
        </div>
      </div>
    </div>
  </nav>

  <section class="overlay"></section>

  <script src="/RecruitMe/public/javascript/dashboard-candidat.js"></script>
</body>

</html>