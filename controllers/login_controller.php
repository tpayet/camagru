<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../views/view.php";
require_once __DIR__."/../mailing/forgotten_pwd_mail.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params) {
        if (array_key_exists("forgotten_pwd", $params)) {
            $reset_pwd_mail = new 
            $_SESSION["message"] = "an email to reset your password has been sent";
        } elseif (User::login($dbh, $params['username'], $params['password'])) {
            $_SESSION['login'] = $params["username"];
        } else {
            $_SESSION["message"] = "login failed, either wrong credentials or account not confirmed";
        }
        header("Location: /");
    }

    public static function logout(PDO $DBH, array $params) {
        session_destroy();
        session_start();
        header("Location: /sign_up");
    }
}
?>