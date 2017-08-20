<?php
  $dbh = include "database.php";
  
  $dbh->beginTransaction();

  $sql = 'CREATE TABLE user(
            id INTEGER,
            username VARCHAR(255),
            email VARCHAR(255),
            password VARCHAR(255),
            confirmed BOOLEAN,
            token VARCHAR(255),
            expiration_date DATE)';
  $dbh->exec($sql);
  $dbh->commit();
?>