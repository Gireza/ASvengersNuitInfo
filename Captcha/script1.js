let captcha_text = "";
const btnVerif = document.getElementById("verifyButton");
const btnRefresh = document.getElementById("refreshButton");
const txt = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
const tCtx = document.getElementById('textCanvas').getContext('2d'); //ecrit le texte en image
const imageElem = document.getElementById('image');
const font = '17px "Cutive Mono"'; //font du captcha

document.fonts = undefined;

function Captcha() {
    for (let i=0; i<6; i++){
        var a = txt[Math.floor(Math.random() * txt.length)];
        var b = txt[Math.floor(Math.random() * txt.length)];
        var c = txt[Math.floor(Math.random() * txt.length)];
        var d = txt[Math.floor(Math.random() * txt.length)];
        var e = txt[Math.floor(Math.random() * txt.length)];
        var f = txt[Math.floor(Math.random() * txt.length)];
        var g = txt[Math.floor(Math.random() * txt.length)];
    }
    captcha_text = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' ' + f + ' ' + g;
    imageElem.setAttribute('alt', captcha_text);

    document.fonts.load(font).then(function (){
        tCtx.font = font;
        tCtx.canvas.width = tCtx.measureText(captcha_text).width;
        tCtx.canvas.height = 60;
        tCtx.font = font;
        tCtx.fillStyle = '#000000';
        tCtx.fillText(captcha_text, 0,30);

        var c = document.getElementById("textCanvas");
        var ctx = c.getContext("2d");
        // Draw lines
        for (var i = 0; i < 7; i++) {
            ctx.beginPath();
            ctx.moveTo(c.width * Math.random(), c.height * Math.random());
            ctx.lineTo(c.width * Math.random(), c.height * Math.random());
            ctx.strokeStyle = "rgb(" +
                Math.round(256 * Math.random()) + "," +
                Math.round(256 * Math.random()) + "," +
                Math.round(256 * Math.random()) + ")";
            ctx.stroke();
        }

        imageElem.src = tCtx.canvas.toDataURL();
    });
}

function ValidCaptcha() {
    var string1 = removeSpace(captcha_text);
    var string2 = removeSpace(document.getElementById('txtInput').value);
    return string1 === string2;
}

function removeSpace(string) {
    return string.split(' ').join('');
}

btnRefresh.onclick = function () {
    Captcha();
}
btnVerif.onclick = function () {
    if (ValidCaptcha()){
        alert("correct");
        //document.location.href="index.html";
    } else {
        alert("faux");
    }
}
Captcha();

