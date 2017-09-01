<?php
declare(strict_types=1);
require_once __DIR__."/controller.php";
require_once __DIR__."/../models/picture.php";
require_once __DIR__."/../models/user.php";

class RootController extends Controller
{
    public static function index(PDO $dbh, array $params) {
        if (array_key_exists("login", $_SESSION)) {
            $user = User::find($dbh, "username", $_SESSION["login"]);
            $pictures = Picture::where($dbh, "user_id", $user->get_id());
            echo View::render(__DIR__."/../views/index.php", array("pictures" => $pictures));
        } else {
            echo View::render(__DIR__."/../views/index.php");
        }
    }
}

?>