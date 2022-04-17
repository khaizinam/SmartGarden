<?php 

include 'conn.php';

$db= new DataBase();
$mi_id=$_GET['id'];

$query = "SELECT m.AIO_key as aioKey, m.ada_username as adaUserName
          FROM microbits m
          WHERE m.microbit_id ='$mi_id'";

$sql = $db->send($query);
$row=$sql->fetch_assoc();
$data=array('aioKey'=>$row["aioKey"],
            'adaUserName'=>$row['adaUserName']);
$json=($data);
$aioKey= $json['aioKey'];
$adaUserName= $json['adaUserName'];

$temp=$db->getTemp($adaUserName);
$humi=$db->getHumi($adaUserName);
$power=$db->getpower($adaUserName);
$auto=$db->getAuto($adaUserName);

$res = array('temp'=>$temp,
                  'humi'=>$humi,
                  'power'=>$power,
                  'auto'=>$auto,
);
echo json_encode($res);
?>