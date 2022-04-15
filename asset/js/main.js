<<<<<<< HEAD
<<<<<<< HEAD
const URL = "http://localhost/SmartGarden/server.com/";
=======
<<<<<<< HEAD
const URL = "http://localhost/SmartGarden/server.com/";
=======
const URL = "http://localhost/DA-gardenSmart/SmartGarden/server.com/";
>>>>>>> 003abb58570f768f5417b9e59763a0fe5b0edca6
>>>>>>> phat
=======
const URL = "http://localhost/SmartGarden/server.com/";
>>>>>>> e8b54f6a13acee2ea03e5c881c7e3d75341d5e40

function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
<<<<<<< HEAD

function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
=======
>>>>>>> thanh
<<<<<<< HEAD

function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
=======
>>>>>>> phat

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
    return "none";
}


let app = new App();

function checkCookie() {
    let token = getCookie("token");
    if (!token) {
        setCookie("token", "none", 30);
        setCookie("user-name", "none", 30);
        setCookie("user-id", "none", 30);
    }
    if (token != "none") {
        app.user.TOKEN = token;
        app.user.name = getCookie("user-name");
        app.user.id = getCookie("user-id");
        console.log(app.user.TOKEN);
        app.ChangeMainPage();
    } else {
        app.showLoginpage();
    }
}
checkCookie();

setInterval(function() {
    if (app.runfunction === "main-page") {
        app.Networkmainpage();
    } else if (app.runfunction === "page-detail") {
        app.Networkpagedetail();
    }
}, 1000);