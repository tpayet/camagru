<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
</head>
<body>
<?php include __DIR__."/../templates/header.php" ?>
<?php if (array_key_exists("login", $_SESSION)) { ?>
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
            <input type="submit" name="submit">
        </form>
    </div>
<?php } ?>
</body>
</html>