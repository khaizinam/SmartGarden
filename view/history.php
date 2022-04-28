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
        <a href="detail.php?id=<?php echo $id?>" class="link-history">Trang thông tin</a>
        <span class="link-history">> Lịch sử</span>
        <h2>Đồ thị độ ẩm đất trong ngày</h2>
        <div class="canvas" id="canvas">
            <canvas id="ctx" style="width: 100%; height: 100%;"></canvas>
        </div>
        <div style="display: flex;margin-top:20px">
            <div style="width: 20px;height:20px;background:blue"></div>
            <span>:  Độ ẩm đất.</span>
        </div>
        <div style="display: flex;margin-top:20px">
        <div style="width: 20px;height:20px;background:red"></div>
            <span>:  Nhiệt độ.</span>
        </div>
       
        <?php 
        if((!isset($_GET['y']) || !isset($_GET['m'])|| !isset($_GET['d']))||($_GET['y'] == "" || $_GET['m'] == "" || $_GET['d'] == "")){
            $y = date("Y");
            $m = date("m");
            $d = date("d");
            header("Location: history.php?id=$id&y=$y&m=$m&d=$d");
        }
        if(isset($_GET['y'])){
            $y = $_GET['y'];
            $year = "AND year = '$y'";
        }
        if(isset($_GET['m'])){
            $m = $_GET['m'];
            $month = "AND month = '$m'";
        }
        if(isset($_GET['d'])){
            $d = $_GET['d'];
            $day = "AND day = '$d'";
        }
        ?>
        <input type="hidden" id="input-year" value="<?php echo $y?>">
        <input type="hidden" id="input-month" value="<?php echo $m?>">
        <input type="hidden" id="input-day" value="<?php echo $d?>">
        <div style="margin-top: 20px;border-radius:20px;border:1px solid black;padding:20px 10px;">
            <h2>Lịch sử độ ẩm đất trong ngày</h2>
            <span><?php echo $d.' / '.$m.' / '.$y;?></span>
            
            <div class="d-flex">
                <select id="select-day" class="form-select" aria-label="Default select example">
                    <?php
                        for ($i=1; $i <= 31; $i++) { 
                            if(isset($_GET['d']) && $i == $_GET['d']) {
                                if($i < 10){
                                    ?><option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option><?php
                                }else{
                                    ?><option value="<?php echo $i; ?>" selected><?php echo $i; ?></option><?php
                                }
                               
                            }else {
                                if($i < 10){
                                    ?><option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option><?php
                                }else{
                                    ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php
                                }
                            }
                        }
                    ?>
                </select>
                <select id="select-month" class="form-select" aria-label="Default select example">
                <?php
                        for ($i=1; $i <= 12; $i++) { 
                            if(isset($_GET['m']) && $i == $_GET['m']) {
                                if($i < 10){
                                    ?><option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option><?php
                                }else{
                                    ?><option value="<?php echo $i; ?>" selected><?php echo $i; ?></option><?php
                                }
                            }else {
                                if($i < 10){
                                    ?><option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option><?php
                                }else{
                                    ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php
                                }
                            }
                        }
                    ?>
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option value="2022" selected>2022</option>
                </select>
                <button onclick="find()" type="button" class="btn btn-primary">Lọc</button>
            </div>
            <script>
                find=()=>{
                    let d = $("#select-day").val();

                    let m = $("#select-month").val();
                    location.href= "history.php?id=<?php echo $id?>&d="+d+"&m="+m+"&y=2022";
                }
            </script>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nhiệt độ</th>
                        <th scope="col">Độ ẩm</th>
                        <th scope="col">Thời Gian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query_1 = "SELECT * 
                        FROM general_infor
                        WHERE microbit_id = '$id' $year$month$day";
                        if($db->num($query_1) != 0 ){
                            $sql_1 = $db->send($query_1);
                            $i=1;
                            while($row_1 = $sql_1->fetch_array()){
                                ?><tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo $row_1['temperature']; ?></td>
                                <td><?php echo $row_1['huminity']; ?></td>
                                <td><?php echo $row_1['hour'].' : '.$row_1['min']; ?></td>
                            </tr><?php
                            $i++;
                            }
                        }else echo "<tr>Không có dữ liệu trong ngày này.</tr>";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../asset/js/canvas.js"></script>
    <script src="../asset/js/app.js"></script>
</body>

</html>