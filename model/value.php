<?php 

include 'conn.php';

$db= new DataBase();
$adaUserName= $_GET['adaName'];

function GETdata($username , $feed_key) 
    {
        $url = "https://io.adafruit.com/api/v2/$username/feeds/$feed_key";
        return file_get_contents($url);
    };
$up = json_decode(GETdata($adaUserName , "pj-max-humi-acceptable"),true);
$low = json_decode(GETdata($adaUserName , "pj-min-humi-acceptable"),true);


$res = array('up'=>$up["last_value"],
            'low'=>$low["last_value"],
        );
echo json_encode($res);
?>