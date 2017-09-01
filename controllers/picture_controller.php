<?php 
declare(strict_types=1);

require_once __DIR__."/controller.php";
require_once __DIR__."/../models/picture.php";
require_once __DIR__."/../views/view.php";

class PictureController extends Controller
{
    public static function upload(PDO $dbh, array $params) {
        $uploaddir = __DIR__."/../uploads/";
        $uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);
        if ($_FILES["userfile"]["error"] === 4) {
            $_SESSION["message"] = "please select a picture to upload";
        } elseif (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $user = User::find($dbh, "username", $_SESSION["login"]);
            Picture::create($dbh, array(
                                        "user_id" => $user->get_id(),
                                        "file_path" => $uploadfile,
                                        "name" => $_FILES['userfile']['name'],
                                        "type" =>$_FILES['userfile']['type']));
            $_SESSION["message"] = "your picture has been uploaded, congrats";
        } else {
            $_SESSION["message"] = "there was an error uploading your picture (error_code: " . $_FILES["userfile"]["error"] . ")";
        }
        echo View::render(__DIR__."/../views/index.php");
    }

    public static function get_image(PDO $dbh, array $params) {
        if (!array_key_exists("img_name", $params)) {
            header("Location: /");
        } else {
            $picture = Picture::find($dbh, "name", $params["img_name"]);
            header("Content-type: " . $picture->get_type());
            readfile($picture->get_path());
        }
    }

    public static function delete_picture(PDO $dbh, array $params) {
        $picture = Picture::find($dbh, "id", $params["img_id"]);
        $picture->delete($dbh);
        $uri = $_SERVER['REQUEST_URI'];
        header("Location: $uri");
    }
}
?>