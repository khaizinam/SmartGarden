<?php 
include 'conn.php';
$db = new DataBase();

$microbit_name = $_POST['name'];
$aio_key = substr($_POST['aio_key'],5,12);
$aio_key_2 = substr($_POST['aio_key'],16,16);
$ada_username = $_POST['ada_username'];
$owner_id = $_POST['id'];

$query="SELECT microbit_id 
        FROM microbits
        WHERE microbit_name='$microbit_name'";

$numresult=$db->num($query);
if($numresult>=1){  // đã tồn tại microbit
    echo 'fail';
}
else{ // microbit chua ton tai

    $query="INSERT INTO microbits (`microbit_name`, `AIO_key`, `AIO_key_2`, `ada_username`, `microbit_owner`)
    VALUES('$microbit_name','$aio_key','$aio_key_2','$ada_username','$owner_id')";
    $db->send($query);
    echo 'done';
}


?>