<?php
function index() {
    ob_start();
?>
<div>
    <form action="/login" method="post">
        <p>Login: </p>
        <input type="text" name="username"><br>
        <p>Pwd: </p>
        <input type="password" name="password"><br>
        <input type="submit" name="submit">
    </form>
</div>
<?php
}
return ob_get_clean();
?>