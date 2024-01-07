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
$capcity = trim($_REQUEST['capcity']);
    
        //Проверяем на пустоту
    if(  $capcity=="")
     {   
        echo "<script>alert(\"Заполните обязательные поля\");</script>";
        die();
    }
    //Вставляем значения в БД  
$insert_sql = "INSERT INTO capcity_name (name)". 
"VALUES('{$capcity}');";
mysql_query($insert_sql) or die("УПС");    
?>
</body>

</html>