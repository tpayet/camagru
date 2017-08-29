<?php
declare(strict_types=1);

require __DIR__."/../models/user.php";
$dbh = require "database.php";

User::create($dbh, array(
                         "username" => "totolapaille",
                         "email" => "totolapaille@gmail.com",
                         "password" => "toto",
                         "confirmed" => true));
?>