<?php
$url = "https://io.adafruit.com/api/v2/DuyThinh141592/feeds/back-pump";
header('Access-Control-Allow-Origin: *');
$response = file_get_contents($url);

?>
<div id="json"><?php echo $response;?></div>
<script>
    var jsondata = document.getElementById("json").innerHTML;
    console.log(jsondata);
</script>