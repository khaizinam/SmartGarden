const URL = "http://localhost/SmartGarden/server.com/";

function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

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
        setCookie("token", "none", 30)
    }
    if (token != "none") {
        app.user.TOKEN = token;
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