<?php
declare(strict_types=1);

function sql_build_query($params): string {
    if (array_key_exists("id", $params)) {
        unset($params["id"]);
    }

    $fields = array();
    foreach ($params as $key => $value) {
        $fields[] = "$key=$value";
    }
    return join(", ", $fields);
}

function fill_models($array, $class_name):array {
    $instances = array();
    foreach($array as $object) {
        $instance = new $class_name();
        $instance->fill($object);
        array_push($instances, $instance);
    }
    return $instances;
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

    public function get_id() { return $this->id; }

    public function save(PDO $dbh) {
        $object_vars = array_filter(get_object_vars($this));
        $table_name = self::get_tablename();

        $array_keys = implode(", ", array_keys($object_vars));
        $array_symbols = array_map(function($str){return ":". $str;}, array_keys($object_vars));

        if (array_key_exists("id", $object_vars)) {
            $array_keys_symbols = array_combine(array_keys($object_vars), $array_symbols);
            $sql_query = "UPDATE $table_name SET " . sql_build_query($array_keys_symbols) . " WHERE $table_name.id = $this->id;";
            unset($object_vars["id"]);
        } else {
            $sql_query = "INSERT INTO $table_name($array_keys) VALUES(" . implode(", ", $array_symbols) . ");";
        }

        $dbh->beginTransaction();
        print($sql_query);
        $stmt = $dbh->prepare($sql_query);
        $stmt->execute($object_vars);
        $dbh->commit();
    }

    public function delete(PDO $dbh) {
        $table_name = self::get_tablename();
        $dbh->beginTransaction();
        $stmt = $dbh->prepare("DELETE FROM '$table_name' WHERE '$table_name'.'id' = :id;");
        $stmt->execute(array("id" => $this->id));
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

    //TODO refactor the find and where static methods

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

    public static function where(PDO $dbh, string $column, $value):array {
        $class_name = self::get_classname();
        $table_name = self::get_tablename();

        $sql_query = "SELECT * FROM $table_name WHERE $table_name.$column = '$value';";
        $query = $dbh->query($sql_query);
        $models = $query->fetchAll();
        return fill_models($models, $class_name);
    }

    public static function all(PDO $dbh): array {
        $class_name = self::get_classname();
        $table_name = self::get_tablename();

        $sql_query = "SELECT * FROM $table_name;";
        $query = $dbh->query($sql_query);
        $models = $query->fetchAll();
        return fill_models($models, $class_name);   
    }
}
?>