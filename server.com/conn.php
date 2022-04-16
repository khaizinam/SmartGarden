<?php
define('SITE_URL', '');
define('HOSTNAME', 'localhost');
define('USERTNAME', 'root');
define('PASS', '');
define('DATABASEBNAME', 'data_microbit');


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods:GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");

class DataBase    
{
    public $host = HOSTNAME;
    public $name = USERTNAME;
    public $pass = PASS;
    public $database = DATABASEBNAME;


    public $link;
    public $error;
    public  function __construct()
    {
        $this->connectDB();
    }
    public function connectDB(){
            $this->link = new mysqli($this->host,$this->name,$this->pass,$this->database);
            if ($this->link -> connect_errno) {
                echo "Failed to connect to MySQL: ".$this->link -> connect_error;
                exit();
              }
    }
    public function send($query){
        $result = $this->link->query($query);
        if($result){
            return $result;
        }else {
            echo "fail";
        }
    }
    public function num($query){
        $result = $this->link->query($query);
        return mysqli_num_rows($result);
    }
    public function update($user_name,$feed_key, $AIO_key,$value){
        $url = "https://io.adafruit.com/api/v2/$user_name/feeds/$feed_key/data?X-AIO-key=$AIO_key";
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Content-Type: application/json"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $data = <<<DATA
        {
          "value": $value
        }
        DATA;
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);    
    }
    public function GETdata($username , $feed_key) 
    {
        $url = "https://io.adafruit.com/api/v2/$username/feeds/$feed_key";
        return file_get_contents($url);
    }
    public function get_all_feeds($username) 
    {
        $url = "https://io.adafruit.com/api/v2/$username/feeds";
        return file_get_contents($url);
    }
    public function getHumi($user_name) 
    {
        $res = json_decode($this->GETdata($user_name ,"pj-humi")); 
        return $res['last_value'];
    }
    public function getTemp($user_name) 
    {
        $res = json_decode($this->GETdata($user_name ,"pj-temp")); 
        return $res['last_value'];
    }
    public function Power($user_name, $AIO_key,$mode) 
    {
        $this->update($user_name,"pj-pump-power-source", $AIO_key,$mode);
    }
    public function Auto($user_name, $AIO_key,$mode) 
    {
        $this->update($user_name,"pj-pump-auto", $AIO_key,$mode);
    }
}  
?>