<?php
# подключаем конфиг
include 'config.php';  

# проверка авторизации
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) 
{    /*запрос SQL по которму осуществляется получение данных о пользователе*/
    $userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE position = '3' AND users_id = '".intval($_COOKIE['id'])."' LIMIT 1"));
/*если все в порядке, то пользователь получает доступ, если нет то ошибка*/
    if(($userdata['users_hash'] !== $_COOKIE['hash']) or ($userdata['users_id'] !== $_COOKIE['id'])) 
    { 
        setcookie('id', '', time() - 60*24*30*12, '/'); 
        setcookie('hash', '', time() - 60*24*30*12, '/');
    setcookie('errors', '3', time() + 60*24*30*12, '/');
    header('Location: main.php'); exit();
    } 
} 
else 
{ 
  setcookie('errors', '2', time() + 60*24*30*12, '/');
  header('Location: index.php'); exit();
}
if($userdata ['NULL']){
    echo "НЕТ";
}
session_start();
?>
