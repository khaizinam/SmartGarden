<?php

include "conn.php";
$db = new DataBase();
$value1 = $_GET['up'];
$value2 = $_GET['low'];
$AIO_key = $_GET['key'];
$user_name = $_GET['adaName'];

function update($user_name,$AIO_key,$value,$id){
    $url = "https://io.adafruit.com/api/v2/$user_name/feeds/$id/data?X-AIO-key=$AIO_key";
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
update($user_name,$AIO_key,$value1,"pj-max-humi-acceptable");
update($user_name,$AIO_key,$value2,"pj-min-humi-acceptable");
?>