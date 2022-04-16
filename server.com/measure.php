<?php 

include "conn.php";
$db = new DataBase();
// $microbit_id=$_GET['microbit_id'];
// $AIO_key=$_GET['AIO_key'];
// test ============
$microbit_id='1';


$query="SELECT *
        FROM general_infor
        WHERE microbit_id='$microbit_id'";

$numresult=$db->num($query);

if($numresult>0){
    $data=array();
    $sql=$db->send($query);
    while($row=$sql->fetch_array()){
        array_push($data,
            array(
                'temperature'=>$row["temperature"],
                'huminity'=>$row['huminity'],
                'infor_time'=>$row['infor_time']
            )
        );
    }
    $json=json_encode($data);
    echo $json;

}
else { // don't own any microbit
    echo 'fail';

}

        


?>