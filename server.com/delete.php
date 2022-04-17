<?php 
include 'conn.php';
$db = new DataBase();
$id = $_GET['id'];
$query= "DELETE 
    FROM microbits
    WHERE microbit_id = $id";
$db->send($query);
echo 'done';
?>