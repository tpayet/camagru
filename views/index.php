<!DOCTYPE html>
<html>
    <head>
        <title>Camagru</title>
    </head>
    <style type="text/css">
    .img_filter {
    max-height: 100px;
    max-width: 100px;
    }
    </style>
    <body>
        <?php include __DIR__."/../templates/header.php" ?>
        <?php if (array_key_exists("login", $_SESSION)) { ?>
        <div id="webcam" style="background-color: blue;">
        <video id="video"></video>
        <canvas id="canvas" style="display: none"></canvas>
        <img id="photo" src="http://placekitten.com/g/320/261" alt="photo">
        <button id="startbutton">Prendre une photo</button>
        <form action="/save_webcam" method="post">
            <input id="photo_input" type="hidden" name="data">
            <input type="radio" name="filter" value="old_school" onclick="">
            <label><img class="img_filter" src="https://i.pinimg.com/originals/f0/a5/0b/f0a50ba3e0614fa458003d67bbb4f395.jpg"></label>
            <input type="radio" name="filter" value="flower" required>
            <label><img class="img_filter" src="https://i.pinimg.com/originals/4f/93/8d/4f938d6a0398679ecac42be7dc327788.png"></label>
            <input type="submit" value="save picture">
        </form>
    </div>
    <div>
    </div>
    <div id="last_pictures" style="background-color: orange;">
        <?php foreach($pictures as $img) { ?>
        <div style="background-color: crimson; display: inline-block">
            <img src=<?= "/pictures?img_name=" . $img->get_name()?>>
        </div>
        <?php } ?>
    </div>
    <div>
        <form enctype="multipart/form-data" method="POST" action="/upload">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input type="file" name="userfile" accept="image/x-png,image/gif,image/jpeg">
            <input type="submit" value="upload file"/>
        </form>
    </div>
    <?php } else { ?>
    <div>
        <form action="/login" method="post">
            <p>Login: </p>
            <input type="text" name="username" required><br>
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