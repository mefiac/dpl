<?php

class user extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get($login, $pass)
    {
        $query = "SELECT users.* from users where login=" . "'" . "$login" . "'" . " and pass=" . "'" . "$pass" . "'" . "";

        $answer = $this->database->query($query);

        if (!empty($answer)) {
            return $answer;
        }
        return false;


    }

    public function reguser($name, $login, $pass, $mail)
    {
        if (!empty($name)) {
            $query = "INSERT INTO `users`(`id`, `name`, `login`, `pass`,mail) VALUES (null, " . "'" . "$name" . "'" . "," . "'" . "$login" . "'" . ", " . "'" . "$pass " . "'" . "," . "'" . " $mail" . "'" . ")";

            return $this->database->query($query);
        }

    }


}


?>