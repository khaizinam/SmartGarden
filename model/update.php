<?php 
include 'conn.php';
$db = new DataBase();

$microbit_name = $_POST['mName'];
$aio_key = substr($_POST['aio'],5,12);
$aio_key_2 = substr($_POST['aio'],16,16);
$ada_username = $_POST['adaName'];
$id = $_POST['id'];

$query="UPDATE `microbits` SET `microbit_name`='$microbit_name',`AIO_key`='$aio_key',`AIO_key_2`='$aio_key_2',  `ada_username`='$ada_username'
        WHERE microbit_id ='$id'";
$db->send($query);
echo 'done';
?>