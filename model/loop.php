<?php
include 'conn.php';
$db = new DataBase();
function GETdata($username , $feed_key) 
    {
        $url = "https://io.adafruit.com/api/v2/$username/feeds/$feed_key";
        return file_get_contents($url);
    };
$temp = json_decode(GETdata("DuyThinh141592", "pj-temp"),true);
$humi = json_decode(GETdata("DuyThinh141592" , "pj-humi"),true);
// $res = array('temp'=>$temp["last_value"],
//             'humi'=>$humi["last_value"],
//             'date'=>$humi["updated_at"]
//         );
echo $temp["updated_at"];
echo '<br>';
echo substr($humi["updated_at"],0,10); 
echo '<br>';
echo substr($humi["updated_at"],12,10); 
    
?>
<script>
    setInterval(function() {
    
}, 10000);
</script>