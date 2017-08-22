<?php
$dbh = require "database.php";
  
try {
    $dbh->beginTransaction();

    // users table
    $sql_request = "CREATE TABLE users(
                      id INTEGER PRIMARY KEY,
                      username VARCHAR(255) UNIQUE,
                      email VARCHAR(255) UNIQUE,
                      password VARCHAR(255),
                      confirmed BOOLEAN,
                      token VARCHAR(255),
                      expiration_date DATE);";

    // pictures table
    $sql_request .= "CREATE TABLE pictures(
                      id INTEGER PRIMARY KEY,
                      data INTEGER,
                      user_id INTEGER,
                      FOREIGN KEY(user_id) REFERENCES users(id));";

    // likes table
    $sql_request .= "CREATE TABLE likes(
                      id INTEGER PRIMARY KEY,
                      user_id INTEGER,
                      picture_id INTEGER,
                      FOREIGN KEY(user_id) REFERENCES users(id),
                      FOREIGN KEY(picture_id) REFERENCES pictures(id),
                      UNIQUE(user_id, picture_id));";

    // comments table
    $sql_request .= "CREATE TABLE comments(
                      id INTEGER PRIMARY KEY,
                      user_id INTEGER,
                      picture_id INTEGER,
                      data TEXT);";

    $dbh->exec($sql_request);
    $dbh->commit();
} catch (PDOException $e) {
    print $e;
}
?>