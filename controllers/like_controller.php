<?php
declare(strict_types=1);
require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../models/like.php";


class LikeController extends Controller
{
    public static function create_like(PDO $dbh, array $params) {
        if (array_key_exists("picture_id", $params) && array_key_exists("login", $_SESSION)) {
            $user = User::find($dbh, "username", $_SESSION["login"]);
            try {
                Like::create($dbh, array(
                                        "user_id" => $user->get_id(),
                                        "picture_id" => $params["picture_id"]));
            } catch (PDOException $e) {
                if ($e->getCode() === "23000") {
                    $_SESSION["message"] = "you already liked this picture";
                } else {
                    $_SESSION["message"] = $e->getMessage();
                }
            }
        }
        header("Location: /galery");
    }
}

?>