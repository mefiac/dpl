<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Генератор баннеров</title>

    <script src="/views/js/external/jquery/jquery.js"></script>
    <script src="/views/js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="/views/css/bootstrap.css"/>

    <link rel="stylesheet" type="text/css" href="/views/css/bootstrap-theme.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="/views/fancybox/jquery.fancybox.css" type="text/css" media="screen"/>
    <script src="/views/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/views/bootstrap/css/bootstrap.min.css"  >
    <link rel="stylesheet" href="/views/js/jquery-ui.css"  >
    <script src="/views/js/jscolor.js"></script>
    <script src="/views/js/saver.js"></script>
    <link rel="stylesheet" href="/views/bootstrap/css/bootstrap-theme.min.css" >

    <link rel="stylesheet" type="text/css" href="/views/css/style.css"/>
    <script src="/views/bootstrap/js/bootstrap.min.js"  ></script>


</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="/index/"><a href="/">Начальная</a></li>
                <?php if(!empty($_SESSION['id'])) { ?>
                <li><a href="/api/cabinet">Личный кабинет</a></li>
                <?php }   ?>


            </ul>
            <ul  <ul class="nav navbar-nav navbar-center"> <li><img src="../views/img/zagolov.jpg" style="width: 420px;"></li></ul>
            <ul class="nav navbar-nav navbar-right">

            <?php if(empty($_SESSION['id'])) { ?>    <li><a href="/api/login">Вход</a></li>
                <li><a href="/api/reguser">Регистрация</a></li>
                <?php } else {
    echo '    <li><a href="/api/endthis">Выход</a></li> ';
 }?>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

<style>
    .activElem {
        box-shadow: 0px 0px 22px 7px #ff2b2b;
    }

    #worksheet {
        height: 300px;
        width: 500px;
        position: relative;
        float: left;
        box-shadow: 0px 0px 22px 2px #000;
        margin: 0px 0px 0px 100px;
    }

    .btn-group-vertical {
        position: relative;
        float: left;
        margin-left: 20px;
    }


</style>
<div class="container">

