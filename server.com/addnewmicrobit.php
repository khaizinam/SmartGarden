<?php 

include 'conn.php';
$db=new DataBase();

// $microbit_name=$_POST['name'];
// $aio_key=$_POST['aio_key'];
// $ada_username=$_POST['ada_username'];
// $temperature_upper=$_POST['temperature_upper'];
// $temperature_lower=$_POST['temperature_lower'];
// $owner_id=$_POST['id'];

// test===============




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
    VALUES(null,'$microbit_name','$aio_key','$ada_username','$temperature_lower','$temperature_upper','$owner_id')    
    ";
    $db->send($query);

}


?>