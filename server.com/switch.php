<?php

include "conn.php";
$db = new DataBase();
$value = $_GET['mode'];
$microbit_id = $_GET['microbit_id'];
$type = $_GET['type'];

$query="SELECT *
        FROM microbits
        WHERE microbit_id='$microbit_id'";

$sql=$db->send($query);
$row=$sql->fetch_assoc();
    $user_name = $row['ada_username'];
    $AIO_key = $row['AIO_key'];
    $AIO_key_2 = $row['AIO_key_2'];
    

echo $user_name, $AIO_key.$AIO_key_2;

if ($type=='auto'){
    $url = "https://io.adafruit.com/api/v2/$user_name/feeds/pj-pump-auto/data?X-AIO-key=aio_$AIO_key$AIO_key_2";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
        "Content-Type: application/json"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $data = '{"value": '.$value.'}';
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);  
}
else if ($type=='power'){
    $url = "https://io.adafruit.com/api/v2/$user_name/feeds/pj-pump-power-source/data?X-AIO-key=aio_$AIO_key$AIO_key_2";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
    "Content-Type: application/json"
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = '{"value": '.$value.'}';
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $resp = curl_exec($curl);
    curl_close($curl);
    var_dump($resp);  
}
?>