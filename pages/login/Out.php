<?php session_start();



// Наконец, уничтожаем сессию.
session_destroy();

//И сразу перенаправляем на нужную страницу пользователя
header('Location:../index.php');
?>