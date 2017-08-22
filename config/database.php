<?php
  $DB_DSN = "sqlite:camagru.db";
  $DB_USER = "tpayet";
  $DB_PASSWORD = "route";

  try {
    $db_connection = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "DB Connection failed: " . $e->getMessage();
  }

  return $db_connection;
?>