 <?php 
   
    session_start();
    if(isset($_SESSION['id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if(!empty($message)){
            $stmt = $conn->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES (:incoming_id, :outgoing_id, :message)");
            $stmt->bindParam(':incoming_id', $incoming_id);
            $stmt->bindParam(':outgoing_id', $outgoing_id);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
        }
    }else{
        header("location: ../login.php");
    }
?>


    













   
