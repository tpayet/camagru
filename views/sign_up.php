<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php include __DIR__."/../templates/header.php" ?>
    <div>
        <form action="/register" method="post">
            <p>password must contain at least one special char, one uppercase letter, one lowercase letter, one digit and a minimum length of 6 characters</p><br>
            <input type="text" name="username" placeholder="username" required><br>
            <input type="password" name="password" placeholder="password" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$"><br>
            <input type="email" name="email" placeholder="email" required><br>
            <input type="submit" name="register">
        </form>
    </div>
    <?php  include __DIR__."/../templates/footer.php" ?>
</body>
</html>