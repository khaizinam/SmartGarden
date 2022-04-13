<?php 
include "conn.php";
$db = new DataBase();
// $username = $_GET('username');
// $password=$_GET('password');
$username = 'admin1';
$password='1234';
$query="SELECT user_id AS id ,user_token as token
        FROM users
        WHERE user_name='$username'
        AND user_password = '$password'
        LIMIT 1";

$numresult=$db->num($query);
if($numresult==1){
    $sql=$db->send($query);
    $row=$sql->fetch_assoc();
    $data=array('token'=>$row["token"],
                'id'=>$row["id"]);
    $json =json_encode($data);
    echo $json;

}
else{
    echo 'fail';
}

?>