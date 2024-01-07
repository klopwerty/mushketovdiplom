
<?php 
    include_once 'connect.php'/*Подключение БД*/;
$select_sql="SELECT * FROM `users` WHERE position = 1 AND `dismis` is NULL";/*запрос к БД*/
$result = mysql_query($select_sql);/*создание переменной*/



?>