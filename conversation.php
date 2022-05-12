<?php
include_once('connect.php');

function getConversation($user_id, $conn){

    //getting conversation for active user
  

    $sql = "SELECT * FROM conversations
            WHERE user_1=? OR user_2=?
            ORDER BY conversation_id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt ->num_rows() > 0){
        $conversations = $stmt->fetchAll();
        // array for storing conversations
        $user_data = [];

        foreach($conversations as $conversation){
            if($conversation['user_1'] == $user_id){
                $sql2  = "SELECT name, last_seen
                FROM user_validation WHERE user_id=?";
                $stmt2  = $conn->prepare($sql2);
                $stmt2 -> execute([$conversation['user_2']]);
            }else{
                $sql2 = "SELECT name, last_seen
                FROM user_validation WHERE user_id=?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2 -> execute([$conversation['user_1']]);

            }
            $allConversations = $stmt2->fetchAll();
            array_push($user_data, $allConversations[0]);
        }
        return $user_data;

    }else{

        $conversations = [];
        return $conversations;
    }
}




?>