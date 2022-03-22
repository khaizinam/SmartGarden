class App {
    constructor() {
        this.user = {
            TOKEN: "none",
            name: "User name",
            id: "2075"
        }
        this.prDiv = document.getElementById("body");
        this.mod = {
            "AUTO_WATER": {
                "on": true,
                "id": "btn-auto-water"
            }
        };

        this.controll();
    }
    controll() {
        if (this.user.TOKEN == "none") {
            this.loginpage();
        } else this.boot();
    }
    loginpage() {
        document.getElementById("wrapper-all").innerHTML =
            `<div class="form-log">
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
    </div>`;
    }
    checkform() {
        let usrname = document.getElementById("input-username");
        let err_name = document.getElementById("err-usr-name");
        let pw = document.getElementById("input-pw");
        let err_pw = document.getElementById("err-pw");
        ///
        if (usrname.value == "" || usrname.value == " ") {
            err_name.innerHTML = "None value !";
        }
        if (pw.value == "" || pw.value == " ") {
            err_pw.innerHTML = "None value !";
        }
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
            err_name.innerHTML = "Invalid input !"
        }
        if (pw.value == "" || pw.value == " ") {
            err_pw.innerHTML = "Invalid input !"
        }
        if (usrname.value != "" &&
            usrname.value != " " &&
            pw.value != "" &&
            pw.value != " ") {
            $.get("http://localhost/Smartgarden/SmartGarden/server.com/gettoken.php", {
                    username: usrname.value,
                    password: pw.value
                },
                function(data, status) {
                    if (status === 'success') {
                        if (data != "fail") {
                            let res = JSON.parse(data);
                            app.user = {
                                TOKEN: res.token,
                                name: usrname.value,
                                id: res.id
                            }
                            console.log(app.user.TOKEN + "\n" + app.user.id);
                            app.boot();
                        }
                    }
                });
        }
    }
    boot() {
        this.show();
        this.printname();
        this.UpdateMod();
    }
    show() {
        document.getElementById("wrapper-all").innerHTML =
            `<div id="body">
                    <div class="component-head container">
                        <div style="height: 160px;"></div>
                        <div class="bar-1">
                            <div>
                                <span id="user-name">User name</span>
                                <span id="user-id">#1075</span>
                            </div>
                            <div>
                                <span>User name</span>
                                <span>#1075</span>
                            </div>
                        </div>
                        <div class="wrapper-user">
                            <img src="./asset/img/user-1.jpg" alt="bg">
                        </div>
                    </div>
                    <div id="conponent-1">
                        <div id="conponent-1-left">
                            <div class="box-1">
                                <span>Temperature</span>
                                <br>
                                <span id="temperature">16.6 ℃</span>
                            </div>
                            <div class="box-1">
                                <span>soil Moisture</span>
                                <br>
                                <span id="soil-moisture">137.5 %</span>
                            </div>
                            <div class="box-1">
                                <span>Solar Input</span>
                                <br>
                                <span id="solar-input">16.6 V</span>
                            </div>
                        </div>
                        <div id="conponent-1-right">
                            <div class="box-1">
                                <span>Humidity</span>
                                <br>
                                <span id="hunidity">90.7 %</span>
                            </div>
                            <div class="box-1">
                                <span>Battery Voltage</span>
                                <br>
                                <span id="battery-voltage">90.7 %</span>
                            </div>
                            <div class="box-1">
                                <span>Water</span>
                                <br>
                                <span id="water">90.7 %</span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:50px">
                        <div class="list-mod">
                            <ul class="list-mod-2">
                                <li>
                                    <span>Auto Water </span>
                                    <button data-="AUTO_WATER" onclick="app.clickMod(this)" id="btn-auto-water" class="btn-mod">ON</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div id="bar-bottom" class="container">
            </div>`;
    }
    printname() {
        document.getElementById("user-name").innerHTML = this.user.name;
        document.getElementById("user-id").innerHTML = "#" + this.user.id;
    }
    clickMod(m) {
        let atr = m.getAttribute('data-');
        for (let key in this.mod) {
            if (key == atr) {
                let elemment = document.getElementById(this.mod[key].id);
                if (this.mod[key].on == false) {
                    this.mod[key].on = true;
                    elemment.innerHTML = "ON";
                    elemment.style.backgroundColor = "skyblue";
                    console.log(atr + " : ON");
                } else {
                    this.mod[key].on = false
                    elemment.innerHTML = "OFF";
                    elemment.style.backgroundColor = "white";
                    console.log(atr + " : OFF");
                }
            }
        }
    }
    UpdateMod() {
        for (let key in this.mod) {
            let e = document.getElementById(this.mod[key].id);
            if (this.mod[key].on == false) {
                e.innerHTML = "OFF";
                e.style.backgroundColor = "white";
            } else {
                e.innerHTML = "ON";
                e.style.backgroundColor = "skyblue";
            }
        }
    }
    addElement(parent, type, atr, inner) {
        let c = document.createElement(type);
        atr.forEach(element => {
            c.setAttribute(element[0], element[1]);
        });
        c.innerHTML = inner;
        parent.appendChild(c);
    }
}
let app = new App();

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    let user = getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 30);
        }
    }
}