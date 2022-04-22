<?php
include 'conn.php';
$db = new DataBase();
//$id = $_GET['id'];
function update($M_id,$ada_username,$db) 
    {
        $getContent =  file_get_contents("https://io.adafruit.com/api/v2/$ada_username/feeds/pj-time-of-latest-update");
        $data = json_decode($getContent,true);
        echo $year = substr( $data["last_value"],0,4);
        echo $month = substr( $data["last_value"],5,2);
        echo $day = substr( $data["last_value"],8,2);
        echo $hour = substr( $data["last_value"],11,2);
        echo $min = substr( $data["last_value"],14,2);
        echo $sec = substr( $data["last_value"],17,2);
        $query_1 = "SELECT *  
            FROM general_infor
            WHERE microbit_id = '$M_id' ORDER BY infor_num DESC LIMIT 1";
        $sql_1 = $db->send($query_1);
        $row_1 = $sql_1->fetch_assoc();
        // echo $row_1['year'] ;
        // echo $row_1['month'];
        // echo $row_1['day'];
        // echo $row_1['hour'];
        // echo $row_1['min'];
        // echo $row_1['sec'];
        if($year != $row_1['year'] 
        || $month != $row_1['month']
        || $day != $row_1['day']
        || $hour != $row_1['hour']
        || $min != $row_1['min']
        || $sec != $row_1['sec']){
            $gettemp =  json_decode(file_get_contents("https://io.adafruit.com/api/v2/$ada_username/feeds/pj-temp"),true);
            $temp = $gettemp["last_value"];
            $gethumi =  json_decode(file_get_contents("https://io.adafruit.com/api/v2/$ada_username/feeds/pj-humi"),true);
            $humi = $gethumi["last_value"];
            $query_2 = "INSERT INTO 
            `general_infor`(`microbit_id`, `temperature`, `huminity`, `sec`, `year`, `month`, `day`, `hour`, `min`) 
            VALUES ('$M_id','$temp','$humi','$sec','$year','$month','$day','$hour','$min')";
            $db->send($query_2);
        }
        
    };


    update(1,"DuyThinh141592",$db);
    
?>
<script>
    setInterval(function() {
    
}, 10000);
</script>