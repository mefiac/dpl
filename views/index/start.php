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


    <link rel="stylesheet" href="/views/bootstrap/css/bootstrap-theme.min.css" >

    <link rel="stylesheet" type="text/css" href="/views/css/style.css"/>
    <script src="/views/bootstrap/js/bootstrap.min.js"  ></script>


</head>

<body>
<a href="index.php"><img src="../views/image/zagolov.jpg"></a>


<nav id="idm">
    <ul>
        <li><a href="index.php">Сделать макет</a>
            <ul class="navi">

                <li><a id="yellow">Билеты</a>
                    <ul>
                        <li><a href="/api/doIt?w=793&h=219&type=1" >Размер 210х58</a></li>
                        <li><a href="/api/doIt?w=756&h=264&type=1">Размер 200x70</a></li>
                        <li><a href="/api/doIt?w=376&h=189&type=1">Размер 100x50</a></li>
                    </ul>
                </li>
                <li><a id="yellow">Брошюры</a>
                    <ul>
                        <li><a href="/api/doIt?w=826&h=1169&type=2">Размер A4</a></li>
                        <li><a href="/api/doIt?w=396&h=280,5&type=2">Размер A5</a></li>
                    </ul>
                </li>
                <li><a id="yellow">Буклеты</a>
                    <ul>
                        <li><a href="/api/doIt?w=826&h=1169&type=3">Размер A4</a></li>
                        <li><a href="/api/doIt?w=756&h=397&type=3">Размер 400x210</a></li>
                    </ul>
                </li>
                <li><a id="yellow" href="evro2.php">Визитки</a>
                    <ul>
                        <li><a href="/api/doIt?w=340&h=189&type=4">Размер 90x50</a></li>
                        <li><a href="/api/doIt?w=321&h=208&type=4">Размер 85x55</a></li>
                    </ul>
                </li>
                <li><a id="yellow">Листовки</a>
                    <ul>
                        <li><a href="/api/doIt?w=826&h=1169&type=5">Размер A4</a></li>
                        <li><a href="/api/doIt?w=397&h=185&type=5">Размер 210x98</a></li>
                        <li><a href="/api/doIt?w=283&h=132&type=5">Размер 150x70</a></li>
                        <li><a href="/api/doIt?w=188&h=132&type=5">Размер 100x70</a></li>
                    </ul>
                </li>
                <li><a id="yellow">Плакаты</a>
                    <ul>
                        <li><a href="/api/doIt?w=826&h=1169&type=6">Размер A2</a></li>
                        <li><a href="/api/doIt?w=388&h=388&type=6">Размер 100x100</a></li>
                        <li><a href="/api/doIt?w=388&h=188&type=6">Размер 100x50</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a >Выбрать шаблон</a>
            <ul>
                <li><a id="yellow" href="/api/see?part=1"  >Билеты</a>

                 </li>
                <li><a id="yellow" href="/api/see?part=2">Брошюры</a>
                </li>
                <li><a id="yellow"  href="/api/see?part=3">Буклеты</a>
                    </li>
                <li><a id="yellow"  href="/api/see?part=4">Визитки</a>
                 </li>
                <li><a id="yellow"  href="/api/see?part=5">Листовки</a>
                     </li>
                <li><a id="yellow"  href="/api/see?part=6">Плакаты</a>
                    </li>
            </ul>
        </li>
        <li><a href="index.php">Информация</a>
            <ul>
                <li><a id="yellow" href="evro.php">О нас</a></li>
                <li><a id="yellow" href="evro1.php">Технические требования</a></li>
            </ul>
        </li>
    </ul>
</nav>


<?php require 'views/footer.php'; ?>