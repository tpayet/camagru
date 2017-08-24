<?php

require_once __DIR__."/templates/template.php";
require_once __DIR__."/views/index.php";
require_once __DIR__."/controllers/login_controller.php";
$dbh = require_once __DIR__."/config/database.php";

session_start();

if (preg_match('/(\/login)/', $_SERVER["REQUEST_URI"])) {
    LoginController::login($dbh, $_POST);
} elseif (preg_match('/(\/logged)/', $_SERVER["REQUEST_URI"])) {
    print("logged");
} elseif (preg_match('/(\/not_logged)/', $_SERVER["REQUEST_URI"])) {
    print("not_logged");
} else {
    print template("Camagrouu", index());
}
?>