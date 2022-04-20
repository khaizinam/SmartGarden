const UserID = $("#hide-value-user-id").val();
const adaNameVal = $("#hide-value-adaName").val();
const MicID = $("#hide-value").val();
const fullkey = $("#hidden-key").val();
var SoilLow;
var SoilUp;
const EmoHappy = "bi-emoji-smile";
const Emodizzy = "bi bi-emoji-dizzy";
const Emoexpress = "bi bi-emoji-expressionless";
const Emoeheart = "bi bi-emoji-heart-eyes";
var autoMode = 0,
    powerMode = 0;
class Btnauto {
    constructor() {

    }
    off() {
        $("#btn-automation").attr("class", "btn btn-outline-dark");
    }
    on() {
        $("#btn-automation").attr("class", "btn btn-dark");
    }
}
class Btnpower {
    constructor() {

    }
    turnoffNow() {
        $("#btn-power-show").html(`<button onclick="BtnPower.offNow()" type="button"
            class="btn btn-outline-warning"><i class ="bi bi-exclamation-octagon"> </i> Tắt khẩn cấp</button >`);
    }
    turnoff() {
        $("#btn-power-show").html(`<button onclick="BtnPower.off()" type="button"
            class="btn btn-outline-danger"> Tắt Máy bơm</button>`);
    }
    turnon() {
        $("#btn-power-show").html(`<button onclick="BtnPower.on()" type="button"
            class="btn btn-outline-success"><i class="bi bi-droplet-fill"></i> Bật Máy bơm</button>`);
    }
    on() {
        $.get("../model/switch.php", {
                adaName: adaNameVal,
                key: fullkey,
                type: "power",
                value: 1
            },
            function(data, status) {
                if (status === 'success') {}
            });
    }
    off() {
        $.get("../model/switch.php", {
                adaName: adaNameVal,
                key: fullkey,
                type: "power",
                value: 0
            },
            function(data, status) {
                if (status === 'success') {}
            });
    }
    offNow() {
        $.get("../model/switch.php", {
                adaName: adaNameVal,
                key: fullkey,
                type: "power",
                value: 0
            },
            function(data, status) {
                if (status === 'success') {}
            });
        $.get("../model/switch.php", {
                adaName: adaNameVal,
                key: fullkey,
                type: "auto",
                value: 0
            },
            function(data, status) {
                if (status === 'success') {}
            });
    }
    clear() {
        $("#btn-power-show").html("");
    }
}
var BtnAuto = new Btnauto();
var BtnPower = new Btnpower();
updateValueSoil = () => {
    $.get("../model/value.php", {
            adaName: adaNameVal
        },
        function(data, status) {
            if (status === 'success') {
                let res = JSON.parse(data);
                $("#upper-value").html('Ngưỡng trên: ' + res.up + '%');
                $("#lower-value").html('Ngưỡng dưới: ' + res.low + '%');
                $("#soil-up-val").val(res.up);
                $("#soil-low-val").val(res.low);
                SoilLow = res.low;
                SoilUp = res.up;
            }
        });
}
updateValueSoil();
console.log(MicID);
EmojiSoil = (id, value) => {
    let statusEmoji = Emoexpress;
    let alertMess = "";
    if (value >= SoilUp) {
        statusEmoji = Emoeheart;
        $("#status-static-alert").css("color", "orange");
        alertMess = "Chỉ số đang vượt ngưỡng cho phép.";
    } else if (value <= SoilLow) {
        statusEmoji = Emodizzy;
        $("#status-static-alert").css("color", "red");
        alertMess = "Chỉ số Thấp hơn ngưỡng cho phép.";
    } else {
        alertMess = "Chỉ số đang Ổn định.";
        $("#status-static-alert").css("color", "green");
        statusEmoji = EmoHappy;
    }
    $(id).attr("class", statusEmoji);
    $("#status-static-alert").html(alertMess);
}
EmojiTemp = (id, value) => {
    let statusEmoji = Emoexpress;
    if (value >= 25 && value < 30) {
        statusEmoji = Emoeheart;
    } else if (value >= 20 && value < 25) {
        statusEmoji = Emoeheart;
    } else if (value < 20) {
        statusEmoji = "bi bi-emoji-frown";
    } else statusEmoji = "bi bi-emoji-sunglasses";
    $(id).attr("class", statusEmoji);
}

setInterval(function() {
    $.get("../model/getvalue.php", {
            adaName: adaNameVal
        },
        function(data, status) {
            if (status === 'success') {
                let res = JSON.parse(data);
                var mess = "";
                var mess2 = "";
                $("#temp-value").html(res.temp + "℃");
                $("#soil-value").html(res.humi + "%");
                EmojiSoil("#emoji-status-soil", res.humi);
                EmojiTemp("#emoji-status-temp", res.temp);
                if (res.pow == 1) {
                    mess = ` <i class="bi bi-droplet-half"></i>
                    Máy đang tưới...`;
                    $("#status-static").css("color", "skyblue");
                    if (res.auto == 1) {
                        BtnPower.turnoffNow();
                    } else BtnPower.turnoff();
                    powerMode = 1;
                } else if (res.pow == 0) {
                    mess = `<i class="bi bi-droplet-half"></i> Máy đã dừng hoạt động...`;
                    $("#status-static").css("color", "white");
                    if (res.auto == 0) {
                        BtnPower.turnon();
                    } else {
                        BtnPower.clear();
                    }
                    powerMode = 0;
                }
                $("#status-static").html(mess);
                if (res.auto == 1) {
                    mess2 = ` <i class="bi bi-cloud-rain-fill"></i>
                    Chế độ tự động tưới đang được bật...`;
                    $("#status-static-auto").css("color", "green");
                    BtnAuto.on();
                    autoMode = 1;
                } else if (res.auto == 0) {
                    mess2 = ` <i class="bi bi-cloud-rain-fill"></i>
                    Chế độ tự động tưới đã tắt...`;
                    $("#status-static-auto").css("color", "white");
                    BtnAuto.off();
                    autoMode = 0;
                }
                $("#status-static-auto").html(mess2);
            }
        });
}, 2500);
autoChange = () => {
    var valueSend = 0;
    $("#mess-alert-auto").html("Đang xử lí chế độ Tự động tưới.");
    if (autoMode == 1) valueSend = 0;
    else valueSend = 1;
    $.get("../model/switch.php", {
            adaName: adaNameVal,
            key: fullkey,
            type: "auto",
            value: valueSend
        },
        function(data, status) {
            if (status === 'success') {
                if (valueSend == 1) {
                    $("#mess-alert-auto").html("Chế độ Tự động tưới đã bật.");
                } else {
                    $("#mess-alert-auto").html("Chế độ Tự động tưới đã tắt.");
                }

            }
        });
}
var modalELSetting = document.getElementById('setting-mic');
var modalSetting = new bootstrap.Modal(modalELSetting);
sendUpdate = () => {
    let upVal = $("#soil-up-val").val();
    let lowVal = $("#soil-low-val").val();
    if (upVal > lowVal) {
        $.get("../model/update_accep_value.php", {
                adaName: adaNameVal,
                key: fullkey,
                up: upVal,
                low: lowVal
            },
            function(data, status) {
                if (status === 'success') {
                    updateValueSoil();
                    modalSetting.hide();
                    $("#mess-alert-value").html("");
                }
            });
    } else {
        $("#mess-alert-value").html("Giá trị ngưỡng trên phải lớn hơn ngưỡng dưới !");
    }

}