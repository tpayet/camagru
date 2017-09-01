<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php include __DIR__."/../templates/header.php" ?>
    <div>
        <form action="/register" method="post">
            <input type="text" name="username" placeholder="username"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="email" name="email" placeholder="email"><br>
            <input type="submit" name="register">
        </form>
    </div>
    <?php  include __DIR__."/../templates/footer.php" ?>
</body>
</html>