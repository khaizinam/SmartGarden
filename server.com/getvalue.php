<?php 

include 'conn.php';

$db= new DataBase();
$mi_id=$_GET['id'];

$query = "SELECT m.AIO_key as aioKey, m.ada_username as adaUserName
          FROM microbits m
          WHERE m.microbit_id ='$mi_id'";

$sql = $db->send($query);
$row=$sql->fetch_assoc();
$adaUserName= $row['adaUserName'];

function GETdata($username , $feed_key) 
    {
        $url = "https://io.adafruit.com/api/v2/$username/feeds/$feed_key";
        return file_get_contents($url);
    };
$temp = json_decode(GETdata($adaUserName , "pj-temp"),true);
$humi = json_decode(GETdata($adaUserName , "pj-humi"),true);
$power = json_decode(GETdata($adaUserName , "pj-pump-power-source"),true);
$auto = json_decode(GETdata($adaUserName , "pj-pump-auto"),true);

$res = array('temp'=>$temp["last_value"],
                  'humi'=>$humi["last_value"],
                  'power'=>$power["last_value"],
                  'auto'=>$auto["last_value"],
);
echo json_encode($res);
?>