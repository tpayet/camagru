<?php

abstract class Model
{
    function __construct(PDO $dbh, int $id) {
        $class = $this->get_tablename();
        $sql_query = "SELECT * FROM $class WHERE $class.id = $id LIMIT 1;";
        $query = $dbh->query($sql_query);
        $model = $query->fetch();
        print_r($model);
    }

    public function get_tablename() {
        return $this->table_name;
    }

    public static function find(PDO $dbh, int $id) {
        $called_class = get_called_class();
        return new $called_class($dbh, $id);
    }
}
?>