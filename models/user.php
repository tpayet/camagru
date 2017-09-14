<?php declare(strict_types=1);

require_once __DIR__."/model.php";

class User extends Model
{   
    public function get_pwd():string { return $this->password; }

    public function get_email():string { return $this->email; }

    public function get_confirmed() { return $this->confirmed; }

    public function get_username() { return $this->username; }

    public function set_pwd(string $password) {
        $this->password = self::hash_pwd($password);
    }
    
    public function set_confirmed(bool $value) {
        $this->confirmed = $value;
    }

    public static function login(PDO $dbh, string $username, string $password):bool {
        $user = User::find($dbh, "username", $username);
        if ($user->get_confirmed()) {
            return ($user->get_pwd() === hash("sha512", "toto$password"));
        }
        return false;
    }

    private static function hash_pwd($password):string {
        return hash("sha512", "toto$password");
    }

    public static function create(PDO $dbh, array $params): Model{
        array_key_exists("password", $params);
        $params["password"] = self::hash_pwd($params["password"]);
        return parent::create($dbh, $params);
    }

    public static function exists(PDO $dbh, array $params):bool {
        if (array_key_exists("username", $params)) {
            if (self::find($dbh, "username", $params["username"])) {
                return true;
            }
        } elseif (array_key_exists("email", $params)) {
            if (self::find($dbh, "email", $params["email"])) {
                return true;
            }
        }
        return false;
    }
}
?>