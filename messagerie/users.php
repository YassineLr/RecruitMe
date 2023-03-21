<?php
session_start();
require_once "../classes/db_classes.php";

?>
<?php require_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $h = new Dbhandler();
          $db = $h->connect();
          $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
          $stmt->execute([$_SESSION['id']]);
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          
          <div class="details">
            <span>
              <?php echo $row['username'] ?>
            </span>
            
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['id']; ?>" class="logout">Logout</a>
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
  <script src="javascript/users.js"></script>
</body>

</html>