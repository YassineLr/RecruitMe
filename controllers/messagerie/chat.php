<?php 
  session_start();
  require_once "../sign-up-login/db_classes.php";
  $h = new Dbhandler();
  $db = $h->connect();
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = $_GET['user_id'];
          $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
          $stmt->execute([$user_id]);
          $row = $stmt->fetch();
          if(!$row){
            header("location: users.php");
            exit();
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <div class="details">
          <span><?php echo $row['username'] ?></span>
        </div>
      </header>
      <div class="chat-box"></div>
      <form action="#" class="typing-area">
        <input type="hidden" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>">
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/chat.js"></script>
</body>
</html>