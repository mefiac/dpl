<?php

class cabinet extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get($id = null)
    {

        $query = 'select * from shablons where id_user='."$id";

        return $this->database->query($query);
    }




}

?>