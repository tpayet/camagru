<?php if (array_key_exists("message", $_SESSION)) { ?>
    <div>
        <p><?= $_SESSION["message"] ?></p>
    </div>
<?php } ?>
<header style="background-color: red;">
    <form action="/galery" method="post">
        <input type="submit" name="galery" value="galery">
    </form>
    <?php if(array_key_exists("login", $_SESSION)) {?>
    <p> Welcome <?= $_SESSION["login"]?> </p>
    <form action="/" method="post">
        <input type="submit" name="index" value="/">
    </form>
    <form action="/logout" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
    <?php } else { ?>
    <form action="/" method="post">
        <input type="submit" name="login" value="login">
    </form>
    <form action="/sign_up" method="post">
        <input type="submit" name="signup" value="sign up">
    </form>
    <?php } ?>
</header>