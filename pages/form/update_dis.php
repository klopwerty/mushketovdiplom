<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;">
    <META HTTP-EQUIV="REFRESH" CONTENT="1;  http://workgroup/pages/staff.php"></META>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<title>Untitled Document</title>
</head>

<body>
<?php
require 'connect.php'/*подключение БД*/;
        switch($_REQUEST['DO']) {

    case 'Редактировать запись': /*Создание PHP переменных*/
                $id=$_REQUEST['users_id'];
$FIO=trim($_REQUEST['FIO']);
$users_login=trim($_REQUEST['users_login']);
$dismis=trim($_REQUEST['dismis']);
/*Изменение записей в БД*/
$update_sql = "UPDATE users SET FIO='$FIO', users_login='$users_login', dismis='$dismis' WHERE users_id='$id'";
mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
echo '<p>Запись успешно обновлена!</p>';
                break;
/*Удаление записей из БД*/
  /*case 'Удалить': 
                $id = $_REQUEST['users_id'];
$delete_sql = "DELETE FROM users WHERE users_id=$id";
mysql_query($delete_sql) or 
die("<p>При удалении проезошла ошибка</p>". mysql_error());
echo "<p>Запись была успешно удалена!</p>";
                break;
*/
}

?>

</body>
</html>