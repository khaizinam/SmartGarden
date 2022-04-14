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
<h2 id="mb-name">Microbit 1 #1005</h2>
<div>
<button onclick="app.dashboard()"  class="btn-mod">Lịch sử</button><button onclick="app.setting()"  class="btn-mod">Cài đặt</button>
</div>
</div>
<div id="conponent-1">
<div id="conponent-1-left">
<div class="box-1">
<span>Nhiệt độ</span>
<br>
<span id="temperature">16.6 ℃</span>
</div>
<div class="box-1">
<span>Độ ẩm đất</span>
<br>
<span id="soil-moisture">137.5 %</span>
</div>
</div>
<div id="conponent-1-right">
<div class="box-1">
<span>Độ ẩm không khí</span>
<br>
<span id="hunidity">90.7 %</span>
</div>
<div class="box-1">
<span>Pin</span>
<br>
<span id="battery-voltage">90.7 %</span>
</div>
</div>
</div>
<div style="margin-top:50px">
<div class="list-mod">
<ul class="list-mod-2">
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
<li>
<span>Máy đo độ ẩm đất </span>
<button data-="SOIL_MOISTURE" onclick="app.clickMod(this)" id="btn-soil-moisture" class="btn-mod">TẮT</button>
</li>
<li>
<span>Máy đo độ ẩm không khí </span>
<button data-="HUNIDITY" onclick="app.clickMod(this)" id="btn-hunidity" class="btn-mod">TẮT</button>
</li>
<li>
<span>Máy đo nhiệt độ </span>
<button data-="TEMPERATURE" onclick="app.clickMod(this)" id="btn-temperature" class="btn-mod">TẮT</button>
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
<ul class="list-mod-2">
<li>
<span>Microbit 1: </span>
<button data-="125" onclick="app.pagedetail(this)" class="btn-mod">SELECT</button>
</li>
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
    CREATE_PAGE = `<h1 style="text-align:center">Đăng ký Microbit</h1>

<div style="display: flex;justify-content: space-between;">
    <button onclick="app.ChangeMainPage()" id="btn-mod" class="btn-mod">Trở về</button>
</div>


<div class="dung__form_signup-microbit">
    <form action="" method="get" class="dung__form">
        <div class="dung__form_component">
            <div class="dung_lable_button">
                <label for="button_access-token">Access token: </label>
                <input type="text" id="button_access-token" name="button_access-token" required>
            </div>
            <div class="dung_lable_button">
                <label for="button_name">Tên Microbit: </label>
                <input type="text" id="button_name" name="button_name" required>
            </div>
        </div>

        <div class="dung__form_component">
            <p>Cài đặt độ ẩm:</p>
            <div class="dung_block2 dung_signup">
                <div class="dung__button dung_signup">
                    <label for="humidity_upper">Ngưỡng trên </label>
                    <button>-</button>
                    <input type="number" id="humidity_upper" name="humidity_upper" required>
                    <button>+</button>
                </div>
                <div class="dung__button dung_signup">
                    <label for="humidity_lower">Ngưỡng dưới </label>
                    <button>-</button>
                    <input type="number" id="humidity_lower" name="humidity_lower" required>
                    <button>+</button>
                </div>
            </div>
        </div>



        <div class="dung__form_component">
            <p>Cài đặt độ ẩm đất:</p>
            <div class="dung_block2 dung_signup">
                <div class="dung__button dung_signup">
                    <label for="soil_upper">Ngưỡng trên </label>
                    <button>-</button>
                    <input type="number" id="soil_upper" name="soil_upper" required>
                    <button>+</button>
                </div>
                <div class="dung__button dung_signup">
                    <label for="soil_lower">Ngưỡng dưới </label>
                    <button>-</button>
                    <input type="number" id="soil_lower" name="soil_lower" required>
                    <button>+</button>
                </div>
            </div>
        </div>

        <div class="dung__form_component">
            <p>Danh sách thiết bị:</p>
            <div class="dung__form_list">
                <div class="dung__form_list_ul">
                    <div class="dung__form">
                        <label for="machine1">Máy đo độ ẩm đất</label>
                        <input type="checkbox" id="machine1" name="machine1" value="A">
                    </div>

                    <div class="dung__form">
                        <label for="machine2">Máy đo độ ẩm không khí</label>
                        <input type="checkbox" id="machine2" name="machine2" value="B"><br />
                    </div>

                    <div class="dung__form">
                        <label for="machine3">Máy đo nhiệt độ</label>
                        <input type="checkbox" id="machine3" name="machine3" value="C"><br />
                    </div>
                </div>
</div>
</div>

<div class="dung__form_component">
<input type="submit" value="Xác nhận">
</div>
</form>
</div>`,
    SETTING_PAGE = `<h2 style="text-align:center">Microbitname #1007</h2>

<div style="display: flex;justify-content: space-between;">
    <button onclick="app.ChangeMainPage()" id="btn-mod" class="btn-mod">Trở về</button>
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