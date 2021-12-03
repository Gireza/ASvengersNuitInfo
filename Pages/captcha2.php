<html>
<head>
    <link rel="stylesheet" href="captcha.css">
</head>
<body>
<div class="catp">
    <div class="capt-header">
        <h2>Please verify that you are not a robot</h2>
    </div>
    <div class="capt-body">
        <canvas id='textCanvas'></canvas>
        <img id='image' class="captcha_image" src="" alt=""/> <button type="button" class="verif_button" id="refreshButton">&#8634;</button>

    </div>
    <div class="capt-body">
        <input type="text" class="captcha_textfield" id="txtInput" /> <button type="button" class="verif_button" id="verifyButton">Verify</button>
    </div>
</div>

<script src="../Script/captcha2.js"></script>
</body>
</html>