<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META HTTP-EQUIV="REFRESH" CONTENT="1;  http://workgroup/pages/Otchet_kul.php">
    <title>Отправляем в базу данных</title>
</head>

<body>
    <?php 
require 'connect.php';/*Подключение к БД*/
    //Создаем переменные 
//$time = trim($_REQUEST['time']);
$number = trim($_REQUEST['number']);
$capcity = trim($_REQUEST['capcity']);
$SL = trim($_REQUEST['SL']);
$LCR = trim($_REQUEST['LCR']);
$FIO = trim($_COOKIE['id']); 
$AHT = trim($_REQUEST['AHT']);
$AR = trim($_REQUEST['AR']);
$period = trim($_REQUEST['period']);
    
        //Проверяем на пустоту
    if( $capcity=="" or $SL=="" or $LCR==""  or $AHT=="" or $AR=="" or $kult=="Площадка")
    {
        echo "<script>alert(\"Заполните обязательные поля\");</script>";
        die();
    }
    //Вставляем значения в БД  
$insert_sql = "INSERT INTO capcity_info (capcity_number, capcity_name, period, AHT, AR, SL, LCR, FIO)". 
"VALUES('{$number}', '{$capcity}', '{$period}', '{$AHT}', '{$AR}', '{$SL}', '{$LCR}', '{$FIO}');";
mysql_query($insert_sql);    
?>
</body>

</html>
