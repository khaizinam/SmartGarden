<?php 
include 'conn.php';
$db = new DataBase();

$microbit_name = $_POST['mName'];
$full_key = $_POST['aio'];
$aio_key = substr($_POST['aio'],4,12);
$aio_key_2 = substr($_POST['aio'],16,16);
$ada_username = $_POST['adaName'];
$id = $_POST['id'];
$status = "ok";
$url = "https://io.adafruit.com/api/v2/$ada_username/feeds/pj-pump-auto/data?X-AIO-key=$full_key";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    $headers = array(
    "Content-Type: application/json"
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data = '{"value": 0}';
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $resp = curl_exec($curl);
    curl_close($curl); 
    $test = json_decode($resp);
    if(isset($test->id)){
        $status = "ok";
    }else {
        $status = "fail";
    }
$query="UPDATE `microbits` SET `microbit_name`='$microbit_name',`AIO_key`='$aio_key',`AIO_key_2`='$aio_key_2',  `ada_username`='$ada_username',`key`='$status'
        WHERE microbit_id ='$id'";
$db->send($query);
echo 'done';
?>