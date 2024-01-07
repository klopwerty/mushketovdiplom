
<?php 
    include_once 'connect.php';/*Подключение БД*/;
$select_sql="SELECT * FROM `kult`";/*запрос к БД*/
$result = mysql_query($select_sql);/*создание переменной*/
?>