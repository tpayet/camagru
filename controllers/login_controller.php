<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params) {
        $ret = User::login($dbh, $params['username'], $params['password']);
        $ret ? print("true"): print("false");
        if ($ret) {
            header('Location: /logged');
        } else {
            header('Location: /not_logged');
        }
    }
}
?>