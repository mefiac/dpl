<?php
session_start();
// if(!eregi(" ", $_SERVER['HTTP_REFERER'])) die("легкая защита от дурака!");
  require 'app/router.php';
  require 'app/base.php';
  require 'app/database.php';
  require 'app/model.php';
  require 'app/View.php';

  $app = new router();

?>
