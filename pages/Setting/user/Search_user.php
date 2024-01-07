<?php session_start()/*Старт сессии */?> 
<?php require_once '../../login/check_session.php' /* проверка аутентификации сессии */?>
<!DOCTYPE html>

<?php require_once '../../inc/header.php'/* подключение шапки */?> 

<div class="MAIN">
    <div class="Name">
        <h1>Пользователи</h1>
    </div>
 <table border="1" cellpadding="7" cellspacing="0">
        <tr>
            <td width="1920PX" colspan="4" align="center"><b>Пользователи по запросу</td>
        </tr>
        <div><input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='http://workgroup/pages/main.php'"></div>
</div>
<br>
<tr>
    <td valign="top"><b>Пользователь</td>
    <td valign="top"><b>Логин</td>
    <td valign="top"><b>Должность</td>
    <td valign="top"><b>Дата вступления в должность</td>

</tr>
<?php
require '../login/connect.php'; /*Подключение БД*/

$users_login = trim($_REQUEST['users_login']); /*Выбор пользователя по ID*/
$FIO = trim($_REQUEST['FIO']);

 
   //Проверяем на пустоту
    if(  $FIO=="" and $users_login=="")
    {
        echo "<script>alert(\"Заполните обязательные поля\");</script>";
        die();
    }
print $users_login;
$sql_select = "SELECT * FROM users INNER JOIN positions ON users.position = positions.id WHERE users_login='$users_login' or FIO='$FIO' "; /*запрос к БД*/
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

if($row)
{
	printf("<tr>
     <td valign='top'>".$row['FIO']."</td>
     <td  valign='top'>".$row['users_login']."</td>
    <td  valign='top'>".$row['position']."</td>
    <td  valign='top'>".$row['date']."</td>
   </tr>"
	); /*Поиск по БД*/
    while($row = mysql_fetch_array($result));
}
else{echo ("Пользователя с таким именем в базе нет<br/><br/>");}
?>


<?php require_once '../../inc/footer.php' /*Подключение подвала*/?>