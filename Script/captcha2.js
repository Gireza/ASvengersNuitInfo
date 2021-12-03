
let captcha_text = "";
const btnVerif = document.getElementById("verifyButton");
const btnRefresh = document.getElementById("refreshButton");
const devi = ['la France','l Allemagne','l Australie','l Autriche','la Belgique','la Bulgarie'];
const rep = ['Paris','Berlin','Canberra','Vienne','Bruxelles','Sofia'];
const tCtx = document.getElementById('textCanvas').getContext('2d'); //ecrit le texte en image
const imageElem = document.getElementById('image');
const font = '17px "Cutive Mono"'; //font du captcha

document.fonts = undefined;

function Captcha() {
    al = Math.floor(Math.random() * devi.length);
    var a = devi[al];
    captcha_text = 'Quelle est la capital de '+ a + ' ?';
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
    return al;
}

function ValidCaptcha() {
    var string1 = rep[al];
    console.log(al);
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
        document.location.href="connexion.php";
    } else {
        Captcha();
    }
}
Captcha();
