<?php 
    include "../model/conn.php";
    $db = new DataBase();
    $soilLow = 0;
    $soilUp = 0;
    include "../php/checkCookie.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $checkID = "SELECT * 
        FROM microbits
        WHERE microbit_id = '$id'";
        $num = $db->num( $checkID);
        if($num == 0){
            header("Location: dashboard.php");
        }else{
            $sqlcheck = $db->send( $checkID);
            $row = $sqlcheck->fetch_assoc();
            if($row['microbit_owner'] != $_COOKIE['user-id']){
                header("Location: dashboard.php");
            }
////////////////////////////////////////////////
            $adaUserName = $row['ada_username'];
            $m_name = $row['microbit_name'];

        }
    }else{
        header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../asset/css/main.css" />
    <link rel="stylesheet" href="../asset/css/dung.css" />
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon" />
    <script src="../asset/js/jquery.min.js"></script>
    <title>SmartGaden</title>
</head>

<body>
    <input type="hidden" id="hide-value-user-id" value="<?php echo $_COOKIE['user-id'];?>">
    <input type="hidden" id="hide-value" value="<?php echo $_GET['id'];?>">
    <input type="hidden" id="hide-value-adaName" value="<?php echo $adaUserName;?>">
   
    <div id="wr-header">
        <div id="header-1" class="container justify-content-between d-flex">
            <div> 
                <a href="dashboard.php"><img id="logo" src="../icon.png" alt="logo"></a>
            </div>
           
            <div class="mobile-look">
                <strong>SMART GARDEN PROJECT - TEAM A</strong>
            </div>

            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Tài Khoản
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="info.php">Thông tin</a></li>
                        <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="login.php?logout=true">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="wr-body" class="container">
        <a href="info.php" class="link-history"><?php echo $_COOKIE["user-name"]; ?></a>
        <span class="link-history">></span>
        <a href="dashboard.php" class="link-history">Dashboard</a>
        <span class="link-history">></span>
        <a href="history.php?id=<?php echo $id?>" class="link-history">Lịch sử</a>
        <span class="link-history">></span>
        <span class="link-history">Thông tin</span>
        <br>
            <div class="justify-content-between d-flex">
                <h3><?php echo $m_name?></h3>
            </div>
        <div class="box">
            <div class="box_box">
                <div  id="temp-value" class="box_box_main">...℃</div>
                <div class="box_box_emoji">
                    <i id="emoji-status-temp" class="bi bi-emoji-expressionless"></i>
                </div>
            </div>
            <div class="box_box">
                <div id="soil-value" class="box_box_main">...%</div>
                <div class="box_box_emoji">
                    <i id="emoji-status-soil"  class="bi bi-emoji-expressionless"></i>
                </div>
                <div class="box_box_control">
                    <div class="box_box_control_up-low">
                        <h5 id="upper-value">Ngưỡng trên: ...%</h5>
                        <i class="bi-caret-up-fill"></i>
                    </div>
                    <div class="box_box_control_up-low">
                        <h5 id="lower-value">Ngưỡng dưới: ...%</h5>
                        <i class="bi-caret-down-fill"></i>
                    </div>
                    <div style="width:320px;margin: 20px auto 20px auto;">
                        <div class="input-group mb-3">
                            <input type="number" id="soil-up-val" class="form-control" placeholder="Ngưỡng trên" aria-label="Ngưỡng trên">
                            <span class="input-group-text">Độ ẩm</span>
                            <input type="number" id="soil-low-val" class="form-control" placeholder="Ngưỡng dưới" aria-label="Ngưỡng dưới">
                            <button onclick="sendUpdate()" type="button" class="btn btn-primary">Chấp nhận</button>
                        </div>
                        <div style="color: red;" id="mess-alert-value"></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="font-size: 25px; margin-top:80px ;margin-bottom : 100px" class="component-1">  
            <div id="status-static-alert">
            </div>
            <div id="status-static-auto">   
            </div>
            <button onclick="autoChange()" class="btn btn-outline-dark" id="btn-automation"><i class="bi bi-cloud-rain-heavy"></i>Automation</button>
            <br>
            <br>
            <div id="status-static">
            </div>
            <div id="btn-power-show">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php
        $queryModal= "SELECT * 
        FROM microbits
        WHERE microbit_id = $id";
        $sqlModal = $db->send($queryModal);
        $ModalRow = $sqlModal->fetch_assoc();
    ?>
    <input type="hidden" id="hidden-key" value="<?php echo 'aio_'.$ModalRow["AIO_key"].$ModalRow["AIO_key_2"];?>">
    <script src="../asset/js/detail.js"></script>
    </body>

</html>