<?php 

include 'conn.php';

$db= new DataBase();
// $microbit_id=$_GET['microbit_id'];

// test ===================
$microbit_id=16;

// lay thong tin dieu kien cua microbit 
    //  aioKey
    // adausername
    // lay nhiet do va do am rôi tra ve
    // lay powr voi auto 



    // lay aio_key cua microbit
$query = "SELECT m.AIO_key as aioKey, m.ada_username as adaUserName
          FROM microbits m
          WHERE m.microbit_id ='$microbit_id'";

$sql = $db->send($query);
$row=$sql->fetch_assoc();
$data=array('aioKey'=>$row["aioKey"],
            'adaUserName'=>$row['adaUserName']);
// $json=json_encode($data);
$json=($data);
$aioKey= $json['aioKey'];
$adaUserName= $json['adaUserName'];

// echo $aioKey ;
// echo '<br>';
// echo $adaUserName;




?>