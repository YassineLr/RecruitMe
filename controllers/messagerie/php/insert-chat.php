 <?php 
   
    session_start();
    if(isset($_SESSION['id_user'])){
        include_once "../../sign-up-login/db_classes.php";
        try{
            $h = new Dbhandler();
            $db = $h->connect();
            $outgoing_id = $_SESSION['id_user'];
            $incoming_id = $_POST['incoming_id'];
         
            $message = $_POST['message'];
            if(!empty($message)){
                $stmt = $db->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES (?, ?, ?)");
       
                $stmt->execute([$incoming_id,$outgoing_id,$message]);
            }
        }
        
        catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                  }
    }else{
        header("location: ../login.php");
    }
?>


    













   
