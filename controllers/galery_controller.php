<?php
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../views/view.php";

class GaleryController extends Controller
{
    public static function show(PDO $dbh, array $params) {
        $pictures = Picture::all($dbh);
        echo View::render(__DIR__."/../views/galery.php", array("pictures_paths" => $pictures,
                                                                "dbh" => $dbh));
    }
}
?>