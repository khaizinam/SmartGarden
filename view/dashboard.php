<?php 
    include "../model/conn.php";
    include "../php/header.php";
    $db = new DataBase();
    include "../php/checkCookie.php";
    
?>
    <div id="wr-header">
        <div id="header-1" class="container justify-content-between d-flex">
            <img id="logo" src="../icon.png" alt="logo">
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
                        <li><a class="dropdown-item" href="login.php?logout=true">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="wr-body" class="container">
        <a href="info.php" class="link-history"><?php echo $_COOKIE["user-name"]; ?></a>
        <span class="link-history">></span>
        <span class="link-history">DashBoard</span>
        <br>
        <button style="margin:15px 0px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">+ Thêm máy mới</button>
        <div style="border-radius:20px;border:1px solid black;padding:20px 10px;">
            <h2>DashBoard</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Key</th>
                        <th scope="col">Tuỳ chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $user_id = $_COOKIE["user-id"];
                        $query="SELECT *
                        FROM microbits AS M
                        JOIN users AS U
                            ON M.microbit_owner = U.user_id
                        WHERE U.user_id='$user_id'";
                        $sothutu = 1;
                        $sql=$db->send($query);
                        while($row=$sql->fetch_array()){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $sothutu;?></th>
                        <td>
                            <a href="detail.php?id=<?php echo  $row["microbit_id"];?>"><?php echo  $row["microbit_name"];?></a>
                        </td>
                        <td><?php echo  $row['key'];?></td>
                        <td>
                            <button onclick="editM(<?php echo  $row['microbit_id'];?>);" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-micr">Sửa</button>
                            <button onclick="deleteMic(<?php echo  $row['microbit_id'];?>)" type="button" class="btn btn-danger">Xoá</button>
                        </td>
                    </tr>
                    <?php $sothutu++; }?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    include "../php/modal.php";
?>
<script>
    deleteMic =(id)=> {
        $.get("../model/delete.php", {
            id: id
        },
        function(data, status) {
            if (status === 'success') {
                if (data === 'done') {
                    location.href = "dashboard.php";  
                } 
            }
        });
    }
    var modalEdit = new bootstrap.Modal(document.getElementById('edit-micr'));


    editM=(id)=>{
        $.get("../model/info.php", {
            id: id
        },
        function(data, status) {
            if (status === 'success') {
                let res = JSON.parse(data);
                document.getElementById("edit-m-name").value = res.mName;
                document.getElementById("edit-ada-name").value = res.adaName;
                document.getElementById("edit-aio-key").value = res.aio;
                document.getElementById("edit-id").value = id;
            }
        });
    }
    submitEdit=()=>{
        var mName = document.getElementById("edit-m-name").value;
        var adaName = document.getElementById("edit-ada-name").value;
        var aio = document.getElementById("edit-aio-key").value;
        var id = document.getElementById("edit-id").value;
        $.post("../model/update.php", {
            id: id,
            mName : mName,
            adaName : adaName,
            aio : aio
        },
        function(data, status) {
            if (status === 'success') {
                modalEdit.hide();
                location.href = "dashboard.php";
            }
        });
    };
</script>
</body>

</html>