<?php

include "conn.php";
$db = new DataBase();
$value = $_GET['value'];
$type = $_GET['type'];
$AIO_key = $_GET['key'];
$user_name = $_GET['adaName'];


if ($type == 'auto'){
    $url = "https://io.adafruit.com/api/v2/$user_name/feeds/pj-pump-auto/data?X-AIO-key=$AIO_key";
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
else if ($type == 'power'){
    $url = "https://io.adafruit.com/api/v2/$user_name/feeds/pj-pump-power-source/data?X-AIO-key=$AIO_key";
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