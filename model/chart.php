<?php 

include 'conn.php';

$db= new DataBase();
$year = $_GET['y'];
$month = $_GET['m'];
$day = $_GET['d'];
$id = $_GET['id'];

$query="SELECT * FROM general_infor
        WHERE microbit_id = '$id' AND year='$year' AND month='$month' AND day='$day'";
$sql = $db->send($query);
$res = array("0","0","0","0");
while($row = $sql->fetch_array()){
    array_push($res,array($row["temperature"],$row['huminity'],$row['hour'],$row['min']));
}
array_push($res,array("0","0","23","59"));
echo json_encode($res);
?>