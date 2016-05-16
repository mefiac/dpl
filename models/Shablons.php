<?php
class Shablons extends Model
{

    public function __construct()
    {
        parent::__construct();

    }
    public  function update($id,$name)
    {
        $query = 'select max(id) as id from shablons';
        $id=  $this->database->query($query)[0][0] ;
        var_dump($id);
     //   $id= $this->database->id();

        $query = " UPDATE `shablons` SET `pic`=" . "'" . "$name" . "'" . " where id=" . "$id";
        return $this->database->query($query);
    }


    public function gets($id = 1)
    {

        $query = 'select * from `shablons` WHERE id='."$id";

        return $this->database->query($query);
    }
    public function set($type,$body,$name)
    {

        $query = "INSERT INTO `shablons`(`id_user`, `id`, `id_type`, `body`, `name`) VALUES (". $_SESSION['id']. ",null, $type ,"."'".$body."'".","."'".$name."'".")";

        return $this->database->query($query);
    }
    public function menu($id)
    {

        $query = 'select * from shablons s where id_type='."$id"." and user=1";

        return $this->database->query($query);
    }

}