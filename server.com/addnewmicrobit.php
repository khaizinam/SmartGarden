<?php 

include 'conn.php';
$db=new DataBase();

$microbit_name;
$microbit_accessToken;
$temperature_lower;
$temperature_upper;
$owner_id=$_GET['id'];


// kiem tra ten xem ton tai hay chua
$query="SELECT microbit_id 
        FROM microbits
        WHERE microbit_name='$microbit_name'";

$numresult=$db->num($query);
if($numresult>=1){  // đã tồn tại microbit
    echo 'fail';
}
else{ // microbit chua ton tai
    $query="
    
    "

}


?>