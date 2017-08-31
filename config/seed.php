<?php
declare(strict_types=1);

require __DIR__."/../models/user.php";
$dbh = require "database.php";

User::create($dbh, array(
                         "username" => "clecle",
                         "email" => "clecle@gmail.com",
                         "password" => "cle",
                         "confirmed" => true));

User::create($dbh, array(
                         "username" => "totolapaille",
                         "email" => "totolapaille@gmail.com",
                         "password" => "toto",
                         "confirmed" => true));

print_r(User::where($dbh, "confirmed", false));

print_r(User::find($dbh, "username", "totolapaille"));
?>