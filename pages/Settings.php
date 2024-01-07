<?php session_start()/*Старт сессии */ ?>
<?php require_once 'login/check_session_sys_admin.php' /* проверка аутентификации сессии */?> 
<?php require_once 'inc/header.php'/* подключение шапки */?> 
<div class="content">
    <div class="Main_text col-md-12 ">
        <h1>
            <p>Настройки</p>
        </h1>
    <div class="row"></div>
    <div class="col-lg-12  Button">
        <form name="Operator" method="post">
            
                <input type="button" class="button col-lg-4" value="Добавить площадку" onclick="javascript:window.location='/pages/Setting/New_capcity.php'" >

                
                <input type="button" class="button col-lg-4" value="Изменение пользователей" onclick="javascript:window.location='/pages/Setting/change.php'">
            
                <input type="button" class="button col-lg-4" value="Поиск Сотрудников" onclick="javascript:window.location='/pages/Setting/Search_Form.php'" >
            
           
                <input type="button" class="button col-lg-4" value="Увольнение" onclick="javascript:window.location='/pages/Setting/Dismis.php'">
            
                <input type="button" class="button col-lg-4" value="Добавление Сотрудников" onclick="javascript:window.location='/pages/Setting/New_user.php'">
            
                <input type="button" class="button col-lg-4" value="Главное меню" onclick="javascript:window.location='/pages/main.php'">
            



</div>
</div>
</div>
<?php require_once 'inc/footer.php'/* подключение подвала */ ?>