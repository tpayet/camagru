<?php declare(strict_types=1);

function sql_build_query($params): string {
    if (array_key_exists("id", $params)) {
        unset($params["id"]);
    }

    $fields = array();
    foreach ($params as $key => $value) {
        $fields[] = "$key='$value'";
    }
    return join(", ", $fields);
}

abstract class Model
{
    function __construct() {
    }

    public function fill($params) {
        foreach ($params as $key => $value) {
            if (!is_numeric($key)) {
                $this->$key = $value;
            }
        }
    }

    public function save(PDO $dbh) {
        $object_vars = array_filter(get_object_vars($this));
        $table_name = self::get_tablename();

        $array_keys = implode(", ", array_keys($object_vars));
        $array_values = implode(", ", array_map(function(string $str) { return "'$str'"; }, array_values($object_vars)));

        if (array_key_exists("id", $object_vars)) {
            $sql_query = "UPDATE $table_name SET " . sql_build_query($object_vars) . " WHERE $table_name.id = $this->id;";
        } else {
            $sql_query = "INSERT INTO $table_name($array_keys) VALUES($array_values);";
        }
        $dbh->beginTransaction();
        $dbh->exec($sql_query);
        $dbh->commit();
    }

    public static function get_tablename(): string {
        return strtolower(get_called_class())."s";
    }

    public static function get_classname(): string {
        return get_called_class();
    }

    public static function create(PDO $dbh, array $params): Model{
        $class_name = self::get_classname();
        $instance = new $class_name();
        $instance->fill($params);
        $instance->save($dbh);
        return $instance;
    }

    public static function find(PDO $dbh, string $column, $value) {
        $class_name = self::get_classname();
        $instance = new $class_name();

        $table_name = self::get_tablename();
        $sql_query = "SELECT * FROM $table_name WHERE $table_name.$column = '$value' LIMIT 1;";
        $query = $dbh->query($sql_query);
        $model = $query->fetch();
        if (empty($model)) {
            return null;
        } else {
            $instance->fill($model);
            return $instance;
        }
    }
}
?>