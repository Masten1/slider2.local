<?php /* Smarty version 2.6.21, created on 2014-10-31 14:44:18
         compiled from login.login.tpl */ ?>
<div class="login body">
<div align="center">
    <div id="actionmessage"></div>
    <FORM action="/backend/login/login" method="post">
    <div class="form">
        <H1>Вход в систему</H1>
        <label for="login">Логин</label>
            <input type="text" id="login" name="login" />
                <br clear="all" />
        <label for="password">Пароль</label>
            <input type="password" id="password" name="password">
        <br clear="all" />
                <input type="submit" name="doLogin" value="login" class="button">
    </div>
    </FORM>
    </div>
</div>