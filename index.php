<?php
declare(strict_types=1);

require_once __DIR__."/controllers/login_controller.php";
require_once __DIR__."/controllers/galery_controller.php";
require_once __DIR__."/views/view.php";
$dbh = require_once __DIR__."/config/database.php";

session_start();

if (preg_match('/(\/login)/', $_SERVER["REQUEST_URI"])) {
    LoginController::login($dbh, $_POST);
} elseif (preg_match('/(\/logout)/', $_SERVER["REQUEST_URI"])) {
    LoginController::logout($dbh, $_POST);
} elseif (preg_match('/(\/galery)/', $_SERVER["REQUEST_URI"])) {
    GaleryController::show($dbh, $_POST);
} else {
    echo View::render(__DIR__."/templates/index.php");
}
?>