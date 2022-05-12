<?php

function getUser($username, $conn){
    $sql = "SELECT * FROM user_validation WHERE name= ?";
    $stmt = $conn-> prepare($sql);

    $stmt -> execute([$username]);

    if($stmt -> rowCount() === 1){
        $username = $stmt-> fetch();
        return $username;
    }else{
        $username = [];
        return $username;
    }

}
