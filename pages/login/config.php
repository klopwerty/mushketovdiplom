<?php
# настройки
define ('DB_HOST', 'localhost');/*ХОСТ*/
define ('DB_LOGIN', 'u2421439_default');/*ПОЛЬЗОВАТЕЛЬ*/
define ('DB_PASSWORD', 'Q8tJA6b2ucCc57E8');/*ПАРОЛЬ*/
define ('DB_NAME', 'u2421439_default');/*БАЗА ДАННЫХ*/
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die ("MySQL Error: " . mysql_error());
mysql_query("set names utf8") or die ("<br>Invalid query: " . mysql_error());
mysql_select_db(DB_NAME) or die ("<br>Invalid query: " . mysql_error());

# массив ошибок
$error[0] = 'Вы не авторизованы';
$error[1] = 'Включите куки';
$error[2] = 'Вы не авторизованы';
$error[3] = 'Вы не Cистемный Администратор';
?>