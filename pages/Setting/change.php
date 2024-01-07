<?php session_start()/*Старт сессии */ ?>
<?php require_once '../login/check_session_sys_admin.php' /* проверка аутентификации сессии */?>
<?php require_once '../inc/header.php'/* подключение шапки */?>
<div class="MAIN">
    <div class="Name">
        <h1>
            <p>Сотрудники</p>
        </h1>
    </div>
    <div><input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='http://workgroup/pages/Settings.php'"></div>


    <h3>
        <p>Изменить Запись</p>
    </h3>

    <form action="user/edit.php" method="post">
        <fieldset>
            <?php
            require '../form/connect.php';
                $sql_select = "SELECT * FROM `users`INNER JOIN positions ON users.position = positions.id WHERE `dismis` is NULL";
                $result = mysql_query($sql_select);
                $row = mysql_fetch_array($result);
            do
            {
                printf("<input type='radio' name='user' value='%s'>%s %s<br/><br/>", $row['users_id'], $row['FIO'],  $row['users_login'],  $row['position']);	
            }
                while($row = mysql_fetch_array($result))
            ?>
        </fieldset>
        <fieldset>
            <input type="submit" class ="back" value="Изменить">
        </fieldset>
    </form>





</div>
</div>

<?php require_once '../inc/footer.php'/* подключение подвала */ ?>
