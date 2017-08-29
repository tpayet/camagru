<?php
$dbh = require "database.php";
  
try {
    $dbh->beginTransaction();

    // users table
    $sql_request = "CREATE TABLE users(
                      id INTEGER PRIMARY KEY,
                      username VARCHAR(255) UNIQUE NOT NULL,
                      email VARCHAR(255) UNIQUE NOT NULL,
                      password VARCHAR(255) NOT NULL,
                      confirmed BOOLEAN DEFAULT 0,
                      token VARCHAR(255),
                      expiration_date DATE);";

    // pictures table
    $sql_request .= "CREATE TABLE pictures(
                      id INTEGER PRIMARY KEY,
                      data INTEGER NOT NULL,
                      user_id INTEGER NOT NULL,
                      FOREIGN KEY(user_id) REFERENCES users(id));";

    // likes table
    $sql_request .= "CREATE TABLE likes(
                      id INTEGER PRIMARY KEY,
                      user_id INTEGER NOT NULL,
                      picture_id INTEGER NOT NULL,
                      FOREIGN KEY(user_id) REFERENCES users(id),
                      FOREIGN KEY(picture_id) REFERENCES pictures(id),
                      UNIQUE(user_id, picture_id));";

    // comments table
    $sql_request .= "CREATE TABLE comments(
                      id INTEGER PRIMARY KEY,
                      user_id INTEGER NOT NULL,
                      picture_id INTEGER NOT NULL,
                      data TEXT);";

    $dbh->exec($sql_request);
    $dbh->commit();
} catch (PDOException $e) {
    print $e;
}
?>