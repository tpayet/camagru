<?php 
declare(strict_types=1);

require_once __DIR__."/controller.php";

class AssetController extends Controller
{
    public static function serve_javascript(PDO $dbh, array $params) {
        if (!array_key_exists("script", $params)) {
            header("Location: /");
        } else {
            header("Content-type: application/javascript");
            readfile(__DIR__ . "/../views/js/" . $params["script"]);
        }
    }
}
?>