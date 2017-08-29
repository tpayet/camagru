<?php
declare(strict_types=1);

require_once __DIR__."/controllers/login_controller.php";
require_once __DIR__."/controllers/galery_controller.php";
require_once __DIR__."/controllers/user_controller.php";
require_once __DIR__."/views/view.php";
$dbh = require_once __DIR__."/config/database.php";

session_start();

if (array_key_exists("message", $_SESSION)) {
    unset($_SESSION["message"]);
}
if (preg_match('/(\/login)/', $_SERVER["REQUEST_URI"])) {
    LoginController::login($dbh, $_POST);
} elseif (preg_match('/(\/logout)/', $_SERVER["REQUEST_URI"])) {
    LoginController::logout($dbh, $_POST); 
} elseif (preg_match('/(\/galery)/', $_SERVER["REQUEST_URI"])) {
    GaleryController::show($dbh, $_POST);
} elseif (preg_match('/(\/sign_up)/', $_SERVER["REQUEST_URI"])) {
    UserController::render_sign_up($dbh, $_POST);
} elseif (preg_match('/(\/register)/', $_SERVER["REQUEST_URI"])) {
    UserController::register($dbh, $_POST);
} elseif (preg_match('/(\/confirm_account)/', $_SERVER["REQUEST_URI"])) {
    UserController::confirm_account($dbh, $_GET);
} else {
    echo View::render(__DIR__."/views/index.php");
}
?>