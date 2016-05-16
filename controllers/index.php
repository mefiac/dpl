<?php

class Index extends Base
{

    public function __construct()
    {
        parent::__construct();


        $this->view->render('index/start');
    }

    public function stats($arg = false)
    {

        $this->view->render('index/start');
    }
}

?>