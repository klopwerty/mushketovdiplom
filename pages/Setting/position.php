
<?php 
require 'login/connect.php'; /*Подключение БД*/


mysql_select_db("workgroup")//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
$select_sql="SELECT id , position FROM positions";/* Запрос к БД*/
$result = mysql_query($select_sql);/*Создание переменной*/



?>