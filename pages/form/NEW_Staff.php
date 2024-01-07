<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META HTTP-EQUIV="REFRESH" CONTENT="1;  http://workgroup/pages/Settings.php">
    <title>Отправляем в базу данных</title>
</head>

<body>
    <?php 
require 'connect.php';
    //Создаем переменные 
$date = trim($_REQUEST['date']);
$position= trim($_REQUEST['position']);
$FIO = trim($_REQUEST['FIO']);
$users_login = trim($_REQUEST['login']);
# Убераем лишние пробелы и делаем двойное шифрование 
$users_password = md5(md5(trim($_POST['password']))); 
    
        //Проверяем на пустоту
    if(  $FIO=="" or $users_login=="" or $users_password=="")
     {   
        echo "<script>alert(\"Заполните обязательные поля\");</script>";
        die();
    }
    //Вставляем значения в БД  
$insert_sql = "INSERT INTO users (users_login, users_password, date, FIO, position)". 
"VALUES('{$users_login}', '{$users_password}', '{$date}', '{$FIO}', '{$position}');";
mysql_query($insert_sql) or die("УПС");    
?>
</body>

</html>
