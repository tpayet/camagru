<?php
$dbh = require "database.php";

try {
    $dbh->beginTransaction();

    $sql_request = "INSERT INTO users (username, email, password, confirmed)
                    VALUES ('totolapaille', 'totolapaille@gmail.com', 'toto', 1);";

    $dbh->exec($sql_request);
    $dbh->commit();
} catch (PDOException $e) {
    print $e;
}
?>