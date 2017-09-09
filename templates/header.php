<?php if (array_key_exists("message", $_SESSION)) { ?>
    <div>
        <p><?= $_SESSION["message"] ?></p>
    </div>
<?php } ?>
<header style="background-color: red;">
    <form action="/galery" method="get">
        <input type="submit" value="galery">
    </form>
    <?php if(array_key_exists("login", $_SESSION)) {?>
    <p> Welcome <?= $_SESSION["login"]?> </p>
    <form action="/">
        <input type="submit" value="/">
    </form>
    <form action="/logout" method="post">
        <input type="submit" value="logout">
    </form>
    <?php } else { ?>
    <form action="/">
        <input type="submit" value="login">
    </form>
    <form action="/sign_up" method="post">
        <input type="submit" value="sign up">
    </form>
    <?php } ?>
</header>