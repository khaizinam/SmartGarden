<?php 
include 'conn.php';
$db = new DataBase();
$id = $_GET['id'];
$query= "SELECT * 
    FROM microbits
    WHERE microbit_id = $id";
$sql = $db->send($query);
$row = $sql->fetch_assoc();
$res = array('mName'=>$row["microbit_name"],
            'adaName'=>$row["ada_username"],
            'aio'=> 'aio_'.$row["AIO_key"].$row["AIO_key_2"]
        );
echo json_encode($res);
?>