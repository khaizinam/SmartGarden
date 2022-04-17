class App {
    constructor() {
        this.user = {
            name: "User name",
            id: "2075"
        }
        this.prDiv = document.getElementById("body");
        this.mod = {
            "AUTO_WATER": {
                "on": true,
                "id": "btn-auto-water"
            },
            "WATER_POWER": {
                "on": true,
                "id": "btn-water-power"
            }
        };
        this.runfunction = "";
    }

    /* ---------------------  NET WORK ---------------------------  */

    Networkmainpage() {
        console.log("main page");
    }
    Networkpagedetail() {
        console.log("page detail");
        $.get(URL + "getvalue.php", {
                id: localStorage.getItem("micro-id")
            },
            function(data, status) {
                if (status === 'success') {
                    if (isJsonString(data)) {
                        console.log("có data list");
                        let res = JSON.parse(data);
                        document.getElementById("temperature").innerHTML = res.temp + "℃";
                        document.getElementById("hunidity").innerHTML = res.humi + "%";
                        if (res.auto == 1) {
                            app.mod.AUTO_WATER.on = true;
                        } else if (res.auto == 0) app.mod.AUTO_WATER.on = false;

                        if (res.power == 1) {
                            app.mod.WATER_POWER.on = true;
                        } else if (res.power == 0) app.mod.WATER_POWER.on = false;

                        for (let key in app.mod) {
                            let e = document.getElementById(app.mod[key].id);
                            if (app.mod[key].on == false) {
                                e.innerHTML = "TẮT";
                                e.style.backgroundColor = "white";
                            } else {
                                e.innerHTML = "BẬT";
                                e.style.backgroundColor = "skyblue";
                            }
                        }
                    } else {
                        console.log("No data JSON");
                    }
                } else {
                    this.runfunction = "";
                }
            });
    }
    getListMicro() {
            $.get(URL + "getlist.php", {
                    id: app.user.id
                },
                function(data, status) {
                    if (status === 'success') {
                        if (data != "fail") {
                            if (isJsonString(data)) {
                                let res = JSON.parse(data);
                                res.forEach(element => {
                                    console.log(element.name + " " + element.id + "\n");
                                    let inner = `<span>` + element.name + `  #` + element.id + `</span>
                                    <button onclick="app.pagedetail('` + element.name + `',` + element.id + `);" class="btn-mod">SELECT</button>`;
                                    app.addElement(document.getElementById('list-mod-2'), "li", ["style", "min-height: 40px;"], inner);
                                });

                                //có data list
                            } else {
                                //lỗi kết nối
                            }
                        } else {
                            //ko có data
                        }
                    } else {
                        this.runfunction = "";
                    }
                });
        }
        /* ---------------------  UI SHOW PAGE ---------------------------  */
    showLoginpage() {
        document.getElementById("wrapper-all").innerHTML = LOGIN_PAGE;
    }
    ChangeMainPage() {
        this.showMainPage();
        this.getListMicro();
        this.printname();
        this.runfunction = "main-page";
    }

    pagedetail(name, id) {
        app.messAlert("Đang tải trang chi tiết, vui lòng đợi giây lát");
        localStorage.setItem("micro-name", name);
        localStorage.setItem("micro-id", id);
        $.get(URL + "getvalue.php", {
                id: localStorage.getItem("micro-id")
            },
            function(data, status) {
                if (status === 'success') {
                    if (isJsonString(data)) {
                        console.log("có data list");
                        let res = JSON.parse(data);
                        if (res.auto == 1) {
                            app.mod.AUTO_WATER.on = true;
                        } else if (res.auto == 0) app.mod.AUTO_WATER.on = false;

                        if (res.power == 1) {
                            app.mod.WATER_POWER.on = true;
                        } else if (res.power == 0) app.mod.WATER_POWER.on = false;
                        //
                        document.getElementById("wrapper-all").innerHTML = PAGE_DETAIL;
                        //
                        document.getElementById("temperature").innerHTML = res.temp + "℃";
                        document.getElementById("hunidity").innerHTML = res.humi + "%";
                        document.getElementById('mb-name').innerHTML = localStorage.getItem("micro-name") + ' #' + localStorage.getItem("micro-id");
                        for (let key in app.mod) {
                            let e = document.getElementById(app.mod[key].id);
                            if (app.mod[key].on == false) {
                                e.innerHTML = "TẮT";
                                e.style.backgroundColor = "white";
                            } else {
                                e.innerHTML = "BẬT";
                                e.style.backgroundColor = "skyblue";
                            }
                        }
                        document.getElementById("status").innerHTML = "Đang tưới..."
                        app.runfunction = "page-detail";
                    } else {
                        console.log("No data JSON");
                        app.runfunction = "";
                        app.closeMess();
                        app.messAlert("Không thể lấy data từ adafruit");
                    }
                } else {
                    app.runfunction = "";
                    app.closeMess();
                    app.messAlert("Không thể gửi yêu cầu tới adafruit");
                }
            });
    }
    dashboard() {
        document.getElementById("wrapper-all").innerHTML = `<button onclick="app.ChangeMainPage()"  class="btn-mod">Trở về</button>`;
    }
    userSetting() {
        document.getElementById("wrapper-all").innerHTML = `<button onclick="app.ChangeMainPage()"  class="btn-mod">Trở về</button>`;
    }
    setting() {
        document.getElementById("wrapper-all").innerHTML = SETTING_PAGE;
        document.getElementById("btn-mod").setAttribute("onclick", "app.pagedetail('" + localStorage.getItem("micro-name") + "'," + localStorage.getItem("micro-id") + ");");
    }
    showMainPage() {
        document.getElementById("wrapper-all").innerHTML = MAIN_PAGE;
    }
    addNewPage() {

        document.getElementById("wrapper-all").innerHTML = CREATE_PAGE;
    }
    printname() {
            app.user.name = getCookie("user-name");
            app.user.id = getCookie("user-id");
            document.getElementById("user-name").innerHTML = getCookie("user-name");
            document.getElementById("user-id").innerHTML = "#" + getCookie("user-id");
        }
        /* ---------------------  ACTION ---------------------------  */
    checkform() {
        let usrname = document.getElementById("input-username");
        let err_name = document.getElementById("err-usr-name");
        let pw = document.getElementById("input-pw");
        let err_pw = document.getElementById("err-pw");
        ///
        if (usrname.value != "" && usrname.value != " ") {
            err_name.innerHTML = "";
        }
        if (pw.value != "" && pw.value != " ") {
            err_pw.innerHTML = "";
        }
    }
    loginClick() {
        let usrname = document.getElementById("input-username");
        let err_name = document.getElementById("err-usr-name");
        let pw = document.getElementById("input-pw");
        let err_pw = document.getElementById("err-pw");

        ///
        if (usrname.value == "" || usrname.value == " ") {
            err_name.innerHTML = "Không được để trống !"
        }
        if (pw.value == "" || pw.value == " ") {
            err_pw.innerHTML = "Không được để trống !"
        }
        if (usrname.value != "" &&
            usrname.value != " " &&
            pw.value != "" &&
            pw.value != " ") {
            $.get(URL + "checklogin.php", {
                    username: usrname.value,
                    password: pw.value
                },
                function(data, status) {
                    if (status === 'success') {
                        if (data != "fail") {
                            if (isJsonString(data)) {
                                let res = JSON.parse(data);
                                app.user = {
                                    name: res.username,
                                    id: res.id
                                }
                                setCookie("user-name", app.user.name, 30);
                                setCookie("user-id", app.user.id, 30);
                                console.log(app.user.id + "\n" + app.user.name);
                                app.ChangeMainPage();
                                app.messAlert("Đăng nhập thành công" + data);
                            } else {
                                app.messAlert("Không kết nối được tới server!");
                            }
                        } else {
                            app.messAlert("Sai tên đăng nhập/ mật khẩu!");
                        }
                    } else {
                        app.messAlert("Không có mạng!");
                    }
                });
        }
    }
    clickMod(m) {
        let atr = m.getAttribute('data-');
        for (let key in this.mod) {
            if (key == atr) {
                let elemment = document.getElementById(this.mod[key].id);
                if (this.mod[key].on == false) {
                    this.mod[key].on = true;
                    elemment.innerHTML = "BẬT";
                    elemment.style.backgroundColor = "skyblue";
                    console.log(atr + " : BẬT");
                } else {
                    this.mod[key].on = false
                    elemment.innerHTML = "TẮT";
                    elemment.style.backgroundColor = "white";
                    console.log(atr + " : TẮT");
                }
            }
        }
    }
    UpdateMod() {
        this.Networkpagedetail();
    }
    addElement(parent, type, atr, inner) {
        let c = document.createElement(type);
        atr.forEach(element => {
            c.setAttribute(element[0], element[1]);
        });
        c.innerHTML = inner;
        parent.appendChild(c);
    }
    logout() {
        setCookie("user-name", "none", 30);
        setCookie("user-id", "none", 30);
        this.showLoginpage();
        this.messAlert("Bạn đã ra trang đăng nhập");
        this.runfunction = "";
    }
    messAlert(e) {
        let modal = document.getElementsByClassName("modal")[0];
        if (modal) {
            this.closeMess();
        }
        let c = document.createElement("div");
        c.setAttribute("class", "modal");
        c.innerHTML = MODAL;
        document.getElementById("wrapper-all").appendChild(c);
        document.getElementById("modal-content").innerHTML = e;

    }
    closeMess() {
        document.getElementsByClassName("modal")[0].remove();
    }
    messList(e) {
        let modal = document.getElementsByClassName("modal")[0];
        if (modal) {
            this.closeMess();
        }
        let c = document.createElement("div");
        c.setAttribute("class", "modal");
        c.innerHTML = MESSAGE_BOX;
        document.getElementById("wrapper-all").appendChild(c);
        for (let key in e) {
            let c2 = document.createElement("li");
            c2.innerHTML = `<button>` + e[key].mess + `</button>`;
            if (e[key].isread) {
                c2.innerHTML += `<div class="red-dot"></div>`;
            }
            document.getElementById("list-mess-box").appendChild(c2);
        }
    }
}