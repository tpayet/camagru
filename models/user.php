<?php declare(strict_types=1);

require __DIR__."/model.php";

class User extends Model
{
    public function set_pwd($password) {
        $this->password = hash("sha512", "toto$password");
    }

    private function get_pwd():string {
        return $this->password;
    }

    public static function login(PDO $dbh, string $username, string $password):bool {
        $user = User::find($dbh, "username", $username);
        return ($user->get_pwd() === hash("sha512", "toto$password"));
    }
}
?>