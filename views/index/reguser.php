<?php require 'views/header.php'; ?>
    <div class="well">
        <form action="/api/RegMe" id="form" method="post">
            <h1>Регистрация нового участника</h1>


          <p> <input type="text"  name="login" value="" required placeholder="Логин"/></p>
            <p> <input type="text"  name="name" value="" required placeholder="Ваше имя"/></p>
            <p><input type="password" name="pass" value="" required placeholder="Пароль"/></p>
            <p> <input type="password" name="pass2" value="" required placeholder="Повторите пароль Пароль"/></p>
            <p> <input type="email" name="email" value="" required placeholder="Введите почтовый адресс"/></p>
            <p><input type="submit" value="Отправить"></p>
        </form>
    </div>
<?php require "views/footer.php"; ?>