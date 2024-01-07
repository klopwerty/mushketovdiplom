<?php session_start()/*Старт сессии */ ?>
<?php require_once '../login/check_session_sys_admin.php' /* проверка аутентификации сессии */?>
<?php require_once '../inc/header.php'/* подключение шапки */?>

<div class="MAIN">
    <div class="Name">
        <h1>
            <p>Сотрудники</p>
        </h1>
    </div>
    <div><input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='http://workgroup/pages/main.php'"></div>
    <div class="Search">

        <h3>
            <p>Поиск сотрудников</p>
        </h3>

        <fieldset>
            <form method="post" action="user/Search_user.php">


                <input type="text" name="FIO" size="30" placeholder="ФИО" style="text-align:center"><br>
                <br>
                <input type="text" name="users_login" size="30" placeholder="Логин" style="text-align:center"><br><br>
                <input id="submit" type="submit" value="Найти и вывести"><br>
            </form>
        </fieldset>
        <br>
        <fieldset>
            <form method="post" action="user/ALL_users.php">
                <input id="submit" type="submit" value="Вывести всех пользователей"><br/>
            </form>
        </fieldset>
        <br>
        <fieldset>
            <form method="post" action="user/ALL_users_with_dis.php">
                <input id="submit" type="submit" value="Вывести всех пользователей с уволенными"><br/>
            </form>
        </fieldset>
        <br>
        <fieldset>
            <form method="post" action="user/dis_users.php">
                <input id="submit" type="submit" value="Только уволенные пользователи"><br/>
            </form>
        </fieldset>


    </div>

</div>

<?php require_once '../inc/footer.php'/* подключение подвала */ ?>
