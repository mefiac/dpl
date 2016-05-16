<?php require 'views/header.php'; ?>
    <div class="well">
        <form action="/api/checkMy" id="form" method="post">
            <h1>Регистрация нового участника</h1>


            <p><input type="text" name="login" value="" required placeholder="Логин"/></p>

            <p><input type="password" name="pass" value="" required placeholder="Пароль"/></p>

            <p><input type="submit" value="Отправить"></p>
        </form>
    </div>
<?php require "views/footer.php"; ?>