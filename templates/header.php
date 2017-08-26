<header style="background-color: red;">
    <?php if(array_key_exists("login", $_SESSION)) {?>
    <p> Welcome <?= $_SESSION["login"]?> </p>
    <form action="/">
        <input type="submit" name="index" value="/" method="post">
    </form>
    <form action="/galery">
        <input type="submit" name="galery" value="galery" method="post">
    </form>
    <form action="/logout">
        <input type="submit" name="logout" value="logout" method="post">
    </form>
    <?php } else { ?>
    <form action="/">
        <input type="submit" name="login" value="login" method="post">
    </form>
    <?php } ?>
</header>