<?php 

include "conn.php";
$db = new DataBase();
// $user_token=$_GET('token');

// test ============
$user_token='0123456789abcdef';


$query="SELECT *
        FROM microbits AS M
        JOIN users AS U
            ON M.microbit_owner = U.user_id
        WHERE U.user_token='$user_token'";

$numresult=$db->num($query);

if($numresult>0){
    $data=array();
    $sql=$db->send($query);
    while($row=$sql->fetch_array()){
        array_push($data,
            array(
                'name'=>$row["microbit_name"],
                'id'=>$row['microbit_id']
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