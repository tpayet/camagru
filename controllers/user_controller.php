<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../views/view.php";
require_once __DIR__."/../mailing/account_confirmation_mail.php";

class UserController extends Controller
{
    public static function render_sign_up(PDO $dbh, array $params) {
        echo View::render(__DIR__."/../views/sign_up.php");
    }

    public static function register(PDO $dbh, array $params) {
        if (array_key_exists("register", $params)) {
            unset($params["register"]);
        }
        $params["confirmed"] = "0";

        if (User::exists($dbh, $params)) {
            $_SESSION["message"] = "username or email already exists. please try again";
            echo View::render(__DIR__."/../views/sign_up.php");
        } else {
            User::create($dbh, $params);
            $confirmation_mail = new AccountConfirmationMail($params["email"], $params["username"]);
            $confirmation_mail->send();
            $_SESSION["message"] = "a confirmation email has been set to your adress. please confirm";
            echo View::render(__DIR__."/../views/index.php");
        }        
    }

    public static function confirm_account(PDO $dbh, array $params) {
        if (array_key_exists("username", $params)) {
            $user = User::find($dbh, "username", $params["username"]);
            if (!is_null($user)) {
                $user->set_confirmed(true

                    );
                $user->save($dbh);
                $_SESSION["message"] = "your account is confirmed, you can now login";
            } else {
                $_SESSION["message"] = "username not found. please contact someone";
            }
            echo View::render(__DIR__."/../views/index.php");
        } else {
            header("Location: /");
        }
    }

    public static function set_pwd(PDO $dbh, array $params){
        if (array_key_exists("hash", $params) && array_key_exists("new_pwd", $params)) {
            print_r($params);
            $user = User::find($dbh, "password", $params["hash"]);
            $user->set_pwd($params["new_pwd"]);
            $user->save($dbh);
            $_SESSION["message"] = "your password has been changed, you can now login";
        }
        header("Location: /");
    }
}
?>