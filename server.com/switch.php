<?php

include "conn.php";
$db = new DataBase();
// $mode=$_GET['mode'];
// $microbit_id=$_GET['microbit_id'];
// $type = $_GET['type'];
// test
$mode= 1;
$microbit_id= 1;
$type = 'auto';

$query="SELECT *
        FROM microbits
        WHERE microbit_id='$microbit_id'";

$sql=$db->send($query);
$row=$sql->fetch_assoc();
    $user_name = $row['ada_username'];
    $AIO_key = $row['AIO_key'];
    

echo $user_name, $AIO_key;

if ($type=='auto'){
    $db->Auto($user_name, $AIO_key, $mode);
}
else if ($type=='power'){
    $db->Power($user_name, $AIO_key, $mode);
}
?>