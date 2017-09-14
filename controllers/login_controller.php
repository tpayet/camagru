<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../views/view.php";
// require_once __DIR__."/../views/reset_pwd.php";
require_once __DIR__."/../mailing/forgotten_pwd_mail.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params) {
        if (array_key_exists("forgotten_pwd", $params)) {
            $user = User::find($dbh, "username", $params["username"]);
            $forotten_pwd_mail = new ForgottenPwdMail($user->get_email(), $user->get_pwd());
            $forotten_pwd_mail->send();
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
        header("Location: /");
    }

    public static function reset_pwd(PDO $DBH, array $params) {
        if (array_key_exists("hash", $params)) {
            echo View::render(__DIR__."/../views/reset_pwd.php", array("hash" => $params["hash"]));
        } else {
            header("Location: /");
        }
    }
}
?>