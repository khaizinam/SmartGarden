<?php
    if(!isset($_COOKIE["user-name"]) || !isset($_COOKIE["user-id"])){
        header("Location: login.php");
    }else {
        $username = "khaizinam";
        $password = "1";
        $query = "SELECT user_id AS id ,user_name as 'name'
        FROM users
        WHERE user_name='$username'
        AND user_password = '$password'
        LIMIT 1";
        if($db->num($query) == 0){
            header("Location: ../login.php");
        }else {
            $sql = $db->send($query);
            $row = $sql->fetch_assoc();
            setcookie("user-name", $row["name"], time() + (86400 * 7), "/");
            setcookie("user-id", $row["id"], time() + (86400 * 7), "/");
        }
    }
?>