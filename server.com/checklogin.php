<?php 
include "conn.php";
$db = new DataBase();
$username = $_GET['username'];
$password=$_GET['password'];




$query="SELECT user_id AS id ,user_token as token,user_name as name
        FROM users
        WHERE user_name='$username'
        AND user_password = '$password'
        LIMIT 1";

$numresult=$db->num($query);
if($numresult==1){
    $sql=$db->send($query);
    $row=$sql->fetch_assoc();
    $data=array('token'=>$row["token"],
                'username'=>$row["name"],
                'id'=>$row["id"]);
    $json =json_encode($data);
    echo $json;

}
else{
    echo 'fail';
}

?>