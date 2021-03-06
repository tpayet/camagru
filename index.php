<?php
declare(strict_types=1);

require_once __DIR__."/controllers/login_controller.php";
require_once __DIR__."/controllers/galery_controller.php";
require_once __DIR__."/controllers/user_controller.php";
require_once __DIR__."/controllers/picture_controller.php";
require_once __DIR__."/controllers/root_controller.php";
require_once __DIR__."/controllers/asset_controller.php";
require_once __DIR__."/controllers/like_controller.php";
require_once __DIR__."/controllers/comment_controller.php";


require_once __DIR__."/views/view.php";
$dbh = require_once __DIR__."/config/database.php";

session_start();

if (preg_match('/(\/login)/', $_SERVER["REQUEST_URI"])) {
    LoginController::login($dbh, $_POST);
} elseif (preg_match('/(\/logout)/', $_SERVER["REQUEST_URI"])) {
    LoginController::logout($dbh, $_POST); 
} elseif (preg_match('/(\/galery)/', $_SERVER["REQUEST_URI"])) {
    GaleryController::show($dbh, $_GET);
} elseif (preg_match('/(\/sign_up)/', $_SERVER["REQUEST_URI"])) {
    UserController::render_sign_up($dbh, $_POST);
} elseif (preg_match('/(\/register)/', $_SERVER["REQUEST_URI"])) {
    UserController::register($dbh, $_POST);
} elseif (preg_match('/(\/confirm_account)/', $_SERVER["REQUEST_URI"])) {
    UserController::confirm_account($dbh, $_GET);
} elseif (preg_match('/(\/upload)/', $_SERVER["REQUEST_URI"])) {
    PictureController::upload($dbh, $_POST);
} elseif (preg_match('/(\/picture)/', $_SERVER["REQUEST_URI"])) {
    PictureController::get_image($dbh, $_GET);
} elseif (preg_match('/(\/save_webcam)/', $_SERVER["REQUEST_URI"])) {
    PictureController::save_webcam($dbh, $_POST);
} elseif (preg_match('/(\/delete_picture)/', $_SERVER["REQUEST_URI"])) {
    PictureController::delete_picture($dbh, $_POST);
} elseif (preg_match('/(\/serve_js)/', $_SERVER["REQUEST_URI"])) {
    AssetController::serve_javascript($dbh, $_GET);
} elseif (preg_match('/(\/reset_pwd)/', $_SERVER["REQUEST_URI"])) {
    LoginController::reset_pwd($dbh, $_GET);
} elseif (preg_match('/(\/set_pwd)/', $_SERVER["REQUEST_URI"])) {
    UserController::set_pwd($dbh, $_POST);
} elseif (preg_match('/(\/like)/', $_SERVER["REQUEST_URI"])) {
    LikeController::create_like($dbh, $_POST);
} elseif (preg_match('/(\/comment)/', $_SERVER["REQUEST_URI"])) {
    CommentController::create_comment($dbh, $_POST);
} else {
    RootController::index($dbh, $_GET);
}
?>