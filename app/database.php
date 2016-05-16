<?php

class DB_Class
{
    public $a;
    protected $db;

    function __construct(PDO $db = null)
    {
        $dsn = 'mysql:host=localhost;dbname=Diplom';
        $this->db = $db;

        try {
            if ($this->db === null) {
                $this->db = new PDO($dsn, 'root', '');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($query)
    {
        try {
            $query = $this->db->prepare($query);

            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insQuery($query)
    {
        try {
            $query = $this->db->prepare($query);

            $query->execute();

            return $this->db->lastInsertId();


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function id()
    {
        try {


            return $this->db->lastInsertId();


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function __destruct()
    {

        $this->db = null;
    }
}

?>