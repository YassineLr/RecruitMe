<?php

    foreach($result as $row){
    
     
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = :row_id
                OR outgoing_msg_id = :row_id) AND (outgoing_msg_id = :outgoing_id 
                OR incoming_msg_id = :outgoing_id) ORDER BY msg_id DESC LIMIT 1";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':row_id', $row['id']);
        $stmt2->bindParam(':outgoing_id', $outgoing_id);
        $stmt2->execute();
        

        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        ($stmt2->rowCount() > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        
        ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['id'] .'">
                    <div class="content"> 
                    <div class="details">
                        <span>'. $row['username'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                </a>';
    }

?>