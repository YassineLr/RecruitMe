<?php 
   
    session_start();
    if(isset($_SESSION['id_user'])){
        include_once "../../sign-up-login/db_classes.php";
        $outgoing_id = $_SESSION['id_user'];
        $incoming_id = $_POST['incoming_id'];
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = :outgoing_id AND incoming_msg_id = :incoming_id)
                OR (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id) ORDER BY msg_id desc";
        $h = new Dbhandler();
        $db = $h->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':outgoing_id', $outgoing_id);
        $stmt->bindParam(':incoming_id', $incoming_id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['outgoing_msg_id'] == $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: /RecruitMe/views/client/sign-up-login.php");
    }


















?>