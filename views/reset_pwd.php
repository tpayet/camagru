<!DOCTYPE html>
<html>
<head>
    <title>Camagru - Reset your password</title>
</head>
<body>
    <?php include __DIR__."/../templates/header.php" ?>
    <div>
        <form action="/set_pwd" method="post">
            <input type="hidden" name="hash" value=<?= $hash ?>>
            <p>please input your new password</p>
            <input type="password" name="new_pwd"><br/>
            <input type="submit" name="" value="submit">
        </form>
    </div>
    <?php include __DIR__."/../templates/footer.php" ?>
</body>
</html>