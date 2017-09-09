<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
</head>
<body>
<?php include __DIR__."/../templates/header.php" ?>
<?php if (array_key_exists("login", $_SESSION)) { ?>
    <div id="webcam">
        <video id="video"></video>
        <canvas id="canvas" style="display: none"></canvas>
        <img id="photo" src="http://placekitten.com/g/320/261" alt="photo">
        <button id="startbutton">Prendre une photo</button>
        <form action="/save_webcam" method="post">
            <input id="photo_input" type="hidden" name="data">
            <input type="submit" value="save picture">
        </form>
    </div>
        <div id="preview">
            <?php foreach($pictures as $img) { ?>
                <div style="background-color: crimson; display: inline-block">
                    <img src=<?= "/pictures?img_name=" . $img->get_name()?>>
                </div>
            <?php } ?>
        </div>
    <div>
        <form enctype="multipart/form-data" method="POST" action="/upload">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input type="file" name="userfile">
            <input type="submit" value="upload file" />
        </form>
    </div>
<?php } else { ?>
    <div>
        <form action="/login" method="post">
            <p>Login: </p>
            <input type="text" name="username"><br>
            <p>Pwd: </p>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" value="login"><br>
            <input type="submit" name="forgotten_pwd" value="forgotten password">
        </form>
    </div>
<?php } ?>
<?php  include __DIR__."/../templates/footer.php" ?>
</body>
<?php if (array_key_exists("login", $_SESSION)) { ?>
<script type="text/javascript" src=<?= "/serve_js?script=webcam.js" ?>></script>
<?php } ?>
</html>