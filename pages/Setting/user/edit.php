<?php session_start()/*Старт сессии */ ?>
<?php require_once '../../login/check_session_sys_admin.php' /* проверка аутентификации сессии */?> 
<?php require_once '../../inc/header.php'/* подключение шапки */?> 
<div class="MAIN">
    <div class="Name">
    <h1>
            <p>Редактирование записей</p>
        </h1>
    </div>
     <fieldset>
            <form>
                <input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='http://workgroup/pages/Settings.php'">
        </fieldset>
        </form>
<?php
require '../login/connect.php'; /*Подключение БД*/
$id = $_REQUEST['user'];/*Выбор пользователя по ID*/
$select_sql = "SELECT * FROM users INNER JOIN positions ON users.position=positions.id WHERE users_id= $id"; /*запрос к БД*/
$result = mysql_query($select_sql);
$row = mysql_fetch_array($result);
printf("<form action='../../form/update_change.php' method='post' name='user'class='Staff'>
<fieldset>
        <input type='hidden' name='users_id'  value='%s'><br>
    <label for='FIO'>Ф.И.О</label><br>
        <input type='text' name='FIO' size='30' value='%s'><br>
    <label for='users_login'>Логин</label><br/>
        <input type='text' name='users_login' size='30' value='%s'><br/>
      <label for='position'>Должность</label><br/>
    <select name='position' value='%s'>
                             <option value='position'></option>
                            	                   <option value='1'>Оператор</option>
	               	                   <option value='2'>Администратор</option>
	               	                   <option value='3'>Системный администратор</option>
	                                           </select>
  
</fieldset>
<br>
<fieldset>
<input id='submit' type='submit' class='back'  value='Редактировать запись' name='DO'>
<br>


</form>",$row['users_id'], $row['FIO'], $row['users_login'], $row['position']); /*Добавление к БД*/?> 
        <br/>
        </fieldset>
        <br/>
       
<?php require_once '../../inc/footer.php'/* подключение подвала */ ?>