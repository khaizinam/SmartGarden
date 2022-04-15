<?php 

include 'conn.php';
$db=new DataBase();

// $microbit_name=$_GET['name'];
// $microbit_accessToken='afdjklajfaklsfa';
// $temperature_lower=$_GET['templow'];
// $temperature_upper=$_GET['tempup'];
// $owner_id=$_GET['id'];

// test===============
$microbit_name='micro_1_2';
$microbit_accessToken='afdjklajfaklsfa';
$temperature_lower=mt_rand();
$temperature_upper=mt_rand();
$owner_id=1;



// kiem tra ten xem ton tai hay chua
$query="SELECT microbit_id 
        FROM microbits
        WHERE microbit_name='$microbit_name'";

$numresult=$db->num($query);
if($numresult>=1){  // đã tồn tại microbit
    echo 'fail';
}
else{ // microbit chua ton tai
    $query="INSERT INTO microbits 
    VALUES(null,'$microbit_name','$microbit_accessToken','$temperature_lower','$temperature_upper','$owner_id')    
    ";
    $db->send($query);

}


?>