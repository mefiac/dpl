<?php

class Api extends Base
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get($arg = 0, $params = 0)
    {

        $page = (empty($params['page'])) ? 0 : $params['page'];

        $sort = [(empty($params['by']) ? 'id' : $params['by']), (empty($params['vector']) ? 'asc' : $params['vector'])];
        require 'models/user.php';
        $article = new article();
        $this->view->articles = $article->get($page, $sort);
        $this->view->render('index/index');

    }

    public function load($arg = 0, $params = 0)
    {

        $data = array();

        if (isset($_GET['uploadfiles'])) {
            $error = false;
            $files = array();

            $uploaddir = './upload/';


            if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);


            foreach ($_FILES as $file) {
                $file['name'] = md5($file['name'] . time()) . substr($file['name'], -4, 4);
                if (move_uploaded_file($file['tmp_name'], $uploaddir . basename($file['name']))) {
                    $files[] = substr($uploaddir . $file['name'], 1, strlen($uploaddir . $file['name']));

                } else {
                    $error = true;
                }
            }

            $data = $error ? array('error' => 'Ошибка загрузки файлов.') : array('files' => $files);

            echo json_encode($data);

        }

    }


    public function cabinet($arg, $params = 0)
    {

        if (isset($_SESSION['id'])) {
            require 'models/cabinet.php';
            $cabinet = new cabinet();
            $placats = $cabinet->get($_SESSION['id']);
            $this->view->articles = $placats;
            $this->view->render('index/center');
        } else   $this->view->render('index/err');
    }
public  function endthis($arg, $params = 0)
{
    unset($_SESSION['id']);
    $this->view->render('index/start');
}
    public function login($arg, $params = 0)
    {

        $this->view->render('index/login');
    }

    public function reguser($arg, $params = 0)
    {
        $this->view->render('index/reguser');
    }

    public function RegMe($arg, $params = 0)
    {
         require 'models/user.php';
         $user = new user();
        $user=  $user->reguser($params['name'],$params['login'], md5($params['pass']),$params['email']);
         $this->view->render('index/index');



    }

    public function doIt($arg, $params = 0)
    {


        $this->view->h = (empty($params['h'])) ? 300 : $params['h'];
        $this->view->w = (empty($params['w'])) ? 400 : $params['w'];
        $this->view->type = (empty($params['type'])) ? 1 : $params['type'];

        $this->view->redact = 1;
        $this->view->render('index/index');
    }
    public function redactIt($arg, $params = 0)
    {


        $this->view->h = (empty($params['h'])) ? 300 : $params['h'];
        $this->view->w = (empty($params['w'])) ? 400 : $params['w'];
        require 'models/Shablons.php';
        $Shablons = new Shablons();
        $Shablons = $Shablons->gets($params['id']);
       
        $this->view->type=$Shablons[0]['id_type'];
        $this->view->body=$Shablons[0]['body'];

        $this->view->redact =0 ;
        $this->view->render('index/index');
    }
    public function   see($arg, $params = 0)
    {
        require 'models/Shablons.php';
        $head = new Shablons();

            $menu =$head->menu($params['part']);
           $this->view->menu=$menu;



        $this->view->render('index/stats');
    }
    public function upl($arg, $params = 0){
        $uploaddir = './upload/';
        $img = $params['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $name=md5(time()).'.png';
        $result = file_put_contents($uploaddir.$name, base64_decode($img));
        require 'models/Shablons.php';
        $head = new Shablons();
        $head->update(1,$uploaddir.$name);

    }


    public function   save($arg, $params = 0)
    {


        require 'models/Shablons.php';
        $Shablons = new Shablons();
        $Shablons = $Shablons->set($params['type'],$params['bodys'],$params['sname']);
    }

    public function checkMy($arg, $params = 0)
    {

        require 'models/user.php';
        $user = new user();
        $ansver = $user->get($params['login'], md5($params['pass']));

        if ($ansver != false) {

            $_SESSION['id'] = $ansver[0]['id'];
            $this->view->h = (empty($params['h'])) ? 300 : $params['h'];
            $this->view->w = (empty($params['w'])) ? 400 : $params['w'];
            $this->view->type = (empty($params['type'])) ? 1 : $params['type'];

            $this->view->redact = 1;
            $this->view->render('index/index');
        }else{
        $this->view->msg = "Неверный логин пароль";
        $this->view->render('index/err');}
    }


}

?>