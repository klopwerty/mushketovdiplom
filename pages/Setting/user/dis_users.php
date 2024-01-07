<?php session_start()/*Старт сессии */?> 
<?php require_once '../../login/check_session_sys_admin.php' /* проверка аутентификации сессии */?>
<?php require_once '../../inc/header.php'/* подключение шапки */?> 

<div class="MAIN">
      <div class="Name">
        <h1>Пользователи</h1>
    </div>
 <table border="1" cellpadding="7" cellspacing="0">
        <tr>
            <td width="1920PX" colspan="5" align="center"><b>Все пользователи</td>
        </tr>
        <div><input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='http://workgroup/pages/main.php'"></div>
</div>
<br>
<tr>
    <td valign="top"><b>Пользователь</td>
    <td valign="top"><b>Логин</td>
    <td valign="top"><b>Должность</td>
    <td valign="top"><b>Дата вступления в должность</td>
    <td valign="top"><b>Дата увольнения</td>

</tr>
<?php
require '../login/connect.php'; /*Подключение БД*/
$sql_select = "SELECT * FROM `users`  INNER JOIN positions ON users.position = positions.id WHERE `dismis`"; /*запрос к БД*/
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

    do{
     printf("<tr>
     <td valign='top'>".$row['FIO']."</td>
     <td  valign='top'>".$row['users_login']."</td>
    <td  valign='top'>".$row['position']."</td>
    <td  valign='top'>".$row['date']."</td>
    <td  valign='top'>".$row['dismis']."</td>
   </tr>");}
while($row = mysql_fetch_array($result));
?>
    </table>  
<?php require_once '../../inc/footer.php' /*Подключение подвала*/?>     