<?php

class router
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $get = $_GET;

        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();


            return false;
        } else {
            $file = 'controllers/' . $url[0] . '.php';
            if (file_exists($file)) {
                require $file;
            } else {
                require 'controllers/error.php';
                $controller = new Error();
                return false;
            }
            $controller = new $url[0];
            $params = (!empty($_POST)) ? $this->check($_POST) : $this->check($_GET) ;
            if (isset($url[2])) {

                $controller->$url[1]($url[2], $params);
            } else {

                if (isset($url[1])) {
                    $controller->$url[1](null, $params);
                }
            }
        }
    }

    private function check($arr)
    {
    /*   $clean = [];
        foreach ($arr as $variable => $value) {
            $clean[static::clean_data($variable)] = static::clean_data($value);
            // array_push($clean, [ static::clean_data($variable) => static::clean_data($value)]);

        }*/
        $clean=$arr;
        return $arr;
    }

    public static function clean_data($var)
    {
    /*    if (!is_array($var)) {
            $quotes = array("\x27", "\x22", "\x60", "\t", "\n", "\r", "*", "%", "<", ">", "?", "!");
            $goodquotes = array("+", "#");
            $repquotes = array("\+", "\#");
            $var = trim(strip_tags($var));
            $var = str_replace($quotes, '', $var);
            $var = str_replace($goodquotes, $repquotes, $var);
            $var = ereg_replace(" +", " ", $var);
        }*/
        return $var;
    }
}

?>