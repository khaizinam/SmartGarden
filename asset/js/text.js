const LOGIN_PAGE = `<div class="form-log">
<img src="./favicon.png" alt="icon" width="100px"> <br>
<label for="input-username">User name :</label>
<br>
<input onkeydown="app.checkform()" type="text" id="input-username">
<br>
<span id="err-usr-name" class="err"></span>
<br>
<label for="input-pw">Pass word :</label> <br>
<input onkeydown="app.checkform()" type="password" id="input-pw"><br>
<span id="err-pw" class="err"></span>
<br>
<button onclick="app.loginClick()" class="btn-sign-in">Sign in</button>
<br>
<button onclick="" class="btn-fogot">Fogot password !</button>
</div>`,
    PAGE_DETAIL = `<div id="body">
<div class="component-head container">
<div style="height: 160px;"></div>
<img style="position:absolute;top:-50px;width: 100%;" src="./asset/img/bg-1.jpg" alt="bg">
<div style="position: absolute;width: 100%" class="bar-1">
<div>
<span id="user-name">User name</span>
<span id="user-id">#1075</span>
</div>
</div>
<div class="wrapper-user">
<img src="./asset/img/user-1.jpg" alt="bg">
</div>
</div>
<div style="display: flex;justify-content: space-between;">
<button onclick="app.ChangeMainPage()"  class="btn-mod">Trở về</button>
<h2 id="mb-name"></h2>
<div>
<button onclick="app.dashboard()"  class="btn-mod">Lịch sử</button><button onclick="app.setting()"  class="btn-mod">Cài đặt</button>
</div>
</div>
<div id="conponent-1">
<div id="conponent-1-left">
<div class="box-1">
<span>Nhiệt độ</span>
<br>
<span id="temperature"></span>
</div>
</div>
<div id="conponent-1-right">
<div class="box-1">
<span>Độ ẩm không khí</span>
<br>
<span id="hunidity"></span>
</div>
</div>
</div>
<div style="margin-top:50px">
<div class="list-mod">
<ul id="list-mod-2">
<li style="min-height: 40px;">
<span id="status"></span>
</li>
<li>
<span>Tự động tưới </span>
<button data-="AUTO_WATER" onclick="app.clickMod(this)" id="btn-auto-water" class="btn-mod">TẮT</button>
</li>
<li>
<span>Tưới nước </span>
<button data-="WATER_POWER" onclick="app.clickMod(this)" id="btn-water-power" class="btn-mod">TẮT</button>
</li>
</ul>
</div>
</div>
</div>`,
    MAIN_PAGE = `<div id="body">
<div class="component-head container">
<div style="height: 160px;"></div>
<img style="position:absolute;top:-50px;width: 100%;" src="./asset/img/bg-1.jpg" alt="bg">
<div style="position: absolute;width: 100%" class="bar-1">
<div>
<span id="user-name">User name</span>
<span id="user-id">#1075</span>
</div>
</div>
<div class="wrapper-user">
<img src="./asset/img/user-1.jpg" alt="bg">
</div>
</div>
<div>
<div style="display:flex;justify-content:space-between">
<button onclick="app.logout()" class="btn-mod">Đăng xuất</button>
<div>
<button onclick="app.userSetting()" class="btn-mod">Tài khoản</button><button onclick="app.addNewPage()" class="btn-mod">Thêm máy mới</button>
</div>
</div>
<div style="margin-top:40px" class="list-mod">
<h2>Tìm kiếm :</h2>
<input id="q-micro" type="text"><button class="btn-mod-1">Tìm tất cả</button>
<ul id="list-mod-2">
</ul>
</div>
</div>
</div>`,
    MODAL = `
<div style="height: 20px;background-color: gray;border-bottom: 1px solid black;">
<h3>Thông báo</h3>
</div>
<div style="height: 230px;overflow-y: scroll;padding: 5px 10px;" id="modal-content">
</div>
<div style="border-top: 1px solid black;padding-top:5px">
<button onclick="app.closeMess()" class="btn-close">Đóng</button>
</div>`,
    MESSAGE_BOX = `<div class="modal">
<div style="height: 20px;background-color: gray;border-bottom: 1px solid black;">
<h3>Hộp thư</h3>
</div>
<div style="height: 230px;overflow-y: scroll;padding: 5px 10px;" id="modal-content">
<ul id="list-mess-box">
</ul>
</div>
<div style="border-top: 1px solid black;padding-top:5px">
<button onclick="app.closeMess()" class="btn-close">Đóng</button>
</div>
</div>`,
    CREATE_PAGE = ` <h1 style="text-align:center">Đăng ký Microbit</h1>

    <div style="display: flex;justify-content: space-between;">
        <button onclick="app.ChangeMainPage()" id="btn-mod" class="btn-mod">Trở về</button>
    </div>


    <div class="dung__form_signup-microbit">
        <form action="" method="POST" class="dung__form">
            <div class="dung__form_component">
                <div class="dung_lable_btn">
                    <label for="btn_micro-name">Tên Microbit: </label>
                    <input type="text" id="btn_micro-name" name="btn_micro-name" required>
                </div>
                <div class="dung_lable_btn">
                    <label for="btn_user-name">Adafruit user name: </label>
                    <input type="text" id="btn_user-name" name="btn_user-name" required>
                </div>
                <div class="dung_lable_btn">
                    <label for="btn_AIO-key">AIO key: </label>
                    <input type="text" id="btn_AIO-key" name="btn_AIO-key" required>
                </div>
            </div>
            <div class="dung__form_component">
                <input type="submit" value="Xác nhận">
            </div>
        </form>
    </div>`,
    SETTING_PAGE = `<h2 style="text-align:center">Microbitname #1007</h2>

<div style="display: flex;justify-content: space-between;">
    <button onclick="" id="btn-mod" class="btn-mod">Trở về</button>
</div>

<div class="dung__card">
    <div class="dung__card_card">
        <div class="dung_block1">
            <div class="dung__card_card_img">
                <img src="./asset/img/humidity1.jpg" alt="Humidity icon">
            </div>
            <h3>Độ ẩm</h3>
        </div>
        <div class="dung_block2">
            <div class="dung__button">
                <label>Ngưỡng trên </label>
                <button>-</button>
                <input type="number">
                <button>+</button>
            </div>
            <div class="dung__button">
                <label>Ngưỡng dưới </label>
                <button>-</button>
                <input type="number">
                <button>+</button>
            </div>
            <div class="dung__button_on-off">
                <button>ON</button>
            </div>
        </div>

    </div>

    <div class="dung__card_card">
        <div class="dung_block1">
            <div class="dung__card_card_img">
                <img src="./asset/img/soilmoisture3.png" alt="Soil Moisture icon">
            </div>
            <h3>Độ ẩm đất</h3>
        </div>
        <div class="dung_block2">
            <div class="dung__button">
                <label>Ngưỡng trên </label>
                <button>-</button>
                <input type="number">
                <button>+</button>
            </div>
            <div class="dung__button">
                <label>Ngưỡng dưới </label>
                <button>-</button>
                <input type="number">
                <button>+</button>
            </div>
            <div class="dung__button_on-off">
                <button>ON</button>
            </div>
        </div>
    </div>

    <div class="dung__card_card">
        <div class="dung_block1">
            <div class="dung__card_card_img">
                <img src="./asset/img/pumps.png" alt="Pumps icon">
            </div>
            <h3>Máy bơm</h3>
        </div>
        <div class="dung_block2">
            <div class="dung__button">
                <label for="button_auto">Tự động </label>
                <input type="range" id="button_auto" name="button_auto" min="0" max="1">
            </div>
        </div>
    </div>
</div>
<div class="dung__button_confirm">
    <button >Xác nhận</button>
</div>`;