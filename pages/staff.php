<?php session_start()/*Старт сессии */ ?>
<?php require_once 'login/check_session_sys_admin.php' /* проверка аутентификации сессии */?> 
<?php require_once 'inc/header.php'/* подключение шапки */?> 

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
                            <form method="post" action="Setting/user/Search_user.php">

                                <br>
                                <input type="text" name="FIO" style="text-align:center" placeholder="Ф.И.О. Сотрудника" size="30">
                                <br>
                                <br>
                                <input type="text" name="users_login" style="text-align:center"s placeholder="Логин" size="30"><br><br>
                                <input id="submit" type="submit" value="Найти и вывести"><br>
                            </form>
                        </fieldset>
                        <fieldset>
                            <form method="post" action="Setting/user/ALL_users.php"> <br>
                                <input id="submit" type="submit" value="Вывести всех пользователей"><br/>
                            </form>
                        </fieldset>


                    </div>

                </div>
           
<?php require_once 'inc/footer.php'/* подключение подвала */ ?>
