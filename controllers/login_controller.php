<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../views/view.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params) {
        if (User::login($dbh, $params['username'], $params['password'])) {
            $_SESSION['login'] = $params["username"];
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