<?php 
include 'conn.php';
$db = new DataBase();
function isJSON($string){
    return is_string($string) && is_array(json_decode($string, true)) ? true : false;
 }
$microbit_name = $_POST['name'];
$full_key = $_POST['aio_key'];
$aio_key = substr($_POST['aio_key'],4,12);
$aio_key_2 = substr($_POST['aio_key'],16,16);
$ada_username = $_POST['ada_username'];
$owner_id = $_POST['id'];

$query="SELECT microbit_id 
        FROM microbits
        WHERE microbit_name='$microbit_name'";

$numresult=$db->num($query);
if($numresult>=1){ 
    echo 'fail';
}
else{ 
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
    $query="INSERT INTO microbits (`microbit_name`, `AIO_key`, `AIO_key_2`, `ada_username`, `humi_lower`,`humi_upper`,`microbit_owner`,`key`)
    VALUES('$microbit_name','$aio_key','$aio_key_2','$ada_username',25,35,'$owner_id','$status')";
    $db->send($query);
    echo 'done';
}


?>