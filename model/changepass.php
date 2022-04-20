<?php 
include "conn.php";
$db = new DataBase();
$id = $_GET['id'];
$password = $_GET['pass'];
$query="UPDATE users SET `user_password`='$password'
        WHERE user_id ='$id'";
$db->send($query);
?>