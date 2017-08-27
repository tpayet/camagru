<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../views/view.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params) {
        if (array_key_exists("forgotten_pwd", $params)) {
            $_SESSION["message"] = "an email to reset your password has been sent"
        } elseif (User::login($dbh, $params['username'], $params['password'])) {
            $_SESSION['login'] = $params["username"];
        } else {
            $_SESSION["message"] = "login failed, either wrong credentials or account not confirmed";
        }
        echo View::render(__DIR__."/../views/index.php");
    }

    public static function logout(PDO $DBH, array $params) {
        session_destroy();
        session_start();
        echo View::render(__DIR__."/../views/index.php");
    }
}
?>