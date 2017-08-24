<?php

require_once __DIR__."/../templates/template.php";

abstract class Controller
{
    public static function render_template($content){
        print template("Camagrou", $this->content());
    }
}
?>