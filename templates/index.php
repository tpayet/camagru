<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
</head>
<body>
<?php include __DIR__."/header.php" ?>
<?php if (array_key_exists("login", $_SESSION)) { ?>
    <div><p><?=print_r($_SESSION)?></p></div>
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