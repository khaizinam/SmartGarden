<?php 
    include "../model/conn.php";
    $db = new DataBase();
    include "../php/checkCookie.php";
    $db = new DataBase();
    $userID = $_COOKIE["user-id"];
    $query = "SELECT * 
    FROM `users` 
    WHERE user_id ='$userID'";
    $sql = $db->send($query);
    $row = $sql->fetch_assoc();


    $query2 = "SELECT * 
    FROM microbits 
    WHERE microbit_owner ='$userID'";
    $numMic = $db->num($query2);

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
                        <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="login.php?logout=true">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="wr-body" class="container">
        <a href="dashboard.php" class="link-history">
            <?php echo $_COOKIE["user-name"]; ?>
        </a>
        <span class="link-history">></span>
        <span class="link-history">Infomation</span>
        <br>
        <h1 class="header">Thông tin cá nhân</h1>

        <div class="info_base">
            <h4>Thông tin cơ bản</h4>
            <div class="info_base_">
                <div class="info_key">Tên đăng nhập</div>
                <div class="info_value"><?php echo $row['user_name'];?></div>
            </div>
            <div class="line"></div>
            <div class="info_base_">
                <div class="info_key">Số microbit</div>
                <div class="info_value"><?php echo  $numMic;?></div>
            </div>
        </div>

        <div class="info_base">
            <h4>Thông tin liên hệ</h4>
            <div class="info_base_">
                <div class="info_key">Email</div>
                <div class="info_value"><?php echo $row['user_email'];?></div>
            </div>
            <div class="line"></div>
            <div class="info_base_">
                <div class="info_key">ID</div>
                <div id="user-id-show" class="info_value"><?php echo $row['user_id'];?></div>
            </div>
            <div class="line"></div>
            <div class="info_base_">
                <div class="info_key">Mật khẩu</div>
                <div id="pass-field" class="info_value">
                    <?php echo $row['user_password'];?>
                    <button onclick="changePass(<?php echo $userID; ?>)" type="button" class="btn btn-light"><i class="bi bi-pencil-square"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        changePass=(id)=>{
            $("#pass-field").html(`<input id="pass-value" class="form-control" type="text" placeholder="" aria-label="default input example"><br>
            <button onclick="cancel()" type="button" class="btn btn-outline-danger">Huỷ</button>
            <button onclick="sendPass()" type="button" class="btn btn-outline-success">Xác nhận</button>`);
        }
        cancel=()=>{
            $("#pass-field").html(`<?php echo $row['user_password'];?><button onclick="changePass(<?php echo $userID; ?>)" type="button" class="btn btn-light"><i class="bi bi-pencil-square"></i></button>`);
        }
        sendPass=()=>{
            let pass = $("#pass-value").val();
            let id = $("#user-id-show").html();
            if(pass != "" || pass != " "){
                $.get("../model/changepass.php", {
                id: id,
                pass: pass
            },
            function(data, status) {
                if (status === 'success') {
                    location.href = "info.php";
                }
            });
            }
        }
    </script>
</body>

</html>