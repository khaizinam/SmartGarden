<?php 
include "conn.php";
$db = new DataBase();
// $token = $_GET['token'];
// $microbit_id=$_GET['microbit_id'];
// $auto_watering = $_GET['auto_watering'];
// $is_watering=$_GET['is_watering'];
// $pump_on=$_GET['pump_on'];

//test
$microbit_id=1;
$auto_watering = 1;
$is_watering= 1;
$pump_on= 1;

if (!empty($microbit_id)){
    $query="UPDATE pump_status
        SET auto_watering = $auto_watering, is_watering= $is_watering, pump_on = $pump_on
        WHERE microbit_id = $microbit_id";
    $db->send($query);
    echo 'Success!';
}


?>