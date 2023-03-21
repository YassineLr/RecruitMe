<?php
session_start();
require_once "../sign-up-login/db_classes.php";

?>
<?php 
require_once "/Applications/XAMPP/xamppfiles/htdocs/RecruitMe/controllers/messagerie/header.php";
 ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          try{
          $h = new Dbhandler();
          $db = $h->connect();
          $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");

          $stmt->execute([$_SESSION['id_user']]);
            
          
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
          catch(PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
          }
          ?>
          
          <div class="details">
            <span>
              <?php 
              echo $row['username'];
               ?>
            </span>
            
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Sélectionnez un utilisateur pour démarrer le chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      </div>
    </section>
  </div>
  <script src="/RecruitMe/controllers/messagerie/javascript/users.js"></script>
</body>

</html>