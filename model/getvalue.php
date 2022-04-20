<?php 

include 'conn.php';

$db= new DataBase();
$adaUserName = $_GET['adaName'];

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
            'pow'=>$power["last_value"],
            'auto'=>$auto["last_value"],
        );
echo json_encode($res);
?>