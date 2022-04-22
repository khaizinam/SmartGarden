const CANVAS = document.getElementById("ctx");
const ctx = CANVAS.getContext("2d");
const wrapper_canvas = document.getElementById("canvas");
class ChartSoil {
    constructor(up, dow) {
        this.ti_le = 24;
        this.ratio_screen = 4.
        this.WIDTH = 1600;
        this.HEIGHT = 400;
        CANVAS.width = this.WIDTH;
        CANVAS.height = 400;
        console.log(CANVAS.width + " " + CANVAS.height);
        this.resize();
        this.background(up, dow);
    }
    update(data) {
        this.draw(data);
    }
    resize() {
        console.log(CANVAS.width + " " + CANVAS.height);
        CANVAS.style.width = wrapper_canvas.offsetWidth;
        CANVAS.style.height = wrapper_canvas.offsetWidth / 5 + "px";
        document.getElementById("canvas").style.height = wrapper_canvas.offsetWidth / 5 + "px";
    }
    background(up, dow) {
        ctx.strokeStyle = "black";
        ctx.beginPath();
        ctx.moveTo(100, 10);
        ctx.lineTo(100, 360);
        ctx.moveTo(100, 185);
        ctx.lineTo(1600, 185);
        ctx.moveTo(100, 360);
        ctx.lineTo(1600, 360);
        ctx.moveTo(100, 10);
        ctx.lineTo(1600, 10);
        ctx.moveTo(854.16, 360);
        ctx.lineTo(854.16, 10);
        ctx.stroke();
        ctx.strokeStyle = "red";
        ctx.beginPath();
        ctx.moveTo(100, 400 - ((dow * 3.5) + 40));
        ctx.lineTo(1600, 400 - ((dow * 3.5) + 40));
        ctx.stroke();
        ctx.font = "20px Georgia";
        ctx.fillStyle = "black";
        ctx.fillText("0%", 50, 360);
        ctx.fillText("50%", 50, 185);
        ctx.fillText("100%", 50, 20);
        ctx.fillStyle = "red";
        ctx.fillText(dow + "%", 50, 400 - ((dow * 3.5) + 40));
        ctx.fillStyle = "red";
        ctx.fillText("12h00", 820, 390);
    }
    drawLine(value, hour, minute) {
        if (value > 100) value = 100;
        if (hour > 24) hour = 24;
        if (minute > 59) minute = 59;
        let x = (hour * 60 + minute) * 25 / 24 + 100;
        let y = 400 - ((value * 3.5) + 40);
        ctx.lineTo(x, y);
    }
    draw(data) {
        ctx.strokeStyle = "#ADD8E6";
        ctx.lineWidth = 5;
        ctx.beginPath();
        ctx.moveTo(100, 360);
        data.forEach((e) => {
            this.drawLine(e[0], e[1], e[2]);
        });
        ctx.stroke();
    }
}
let data = [
    [25, 2, 15],
    [40, 3, 20],
    [60, 4, 20],
    [50, 4, 30],
    [50, 5, 30],
    [80, 12, 30],
    [100, 18, 30]
]
var chart = new ChartSoil(45, 15);
chart.update(data);
addEventListener("resize", () => {
    chart.resize();
})