<?php

require_once __DIR__."/model.php";
require_once __DIR__."/user.php";
require_once __DIR__."/like.php";
require_once __DIR__."/comment.php";


class Picture extends Model
{
    // protected $table_name = "pictures";
  public function get_path():string {
    return $this->file_path;
  }

  public function get_type():string {
    return $this->type;
  }

  public function get_likes(PDO $dbh):int {
    return count(Like::where($dbh, "picture_id", $this->id));
  }

  public function get_comments(PDO $dbh):array {
    return Comment::where($dbh, "picture_id", $this->id);
  }  

  public function get_name():string {
    return $this->name;
  }

  public function get_id():string {
    return $this->id;
  }

  public function author(PDO $dbh) {
    return User::find($dbh, "id", $this->user_id);
  }
}
?>