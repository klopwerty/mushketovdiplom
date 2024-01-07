<?php session_start()/*Старт сессии */ ?>
<?php require_once 'login/check_session.php' /* проверка аутентификации сессии */?>
<?php require_once 'inc/header.php'/* подключение шапки */?>

<div class="content">
    <div class="Main_text col-md-12 ">
        <h1>
            <p>Главное Меню</p>
        </h1>
    </div>
    <div class="row"></div>
    <div class="col-md-12  Button">
        <form name="Operator" method="post">
            
                <input type="button" class="button col-lg-3" value="Заполнить показатели" onclick="javascript:window.location='/pages/Otchet_kul.php'" />

                <input type="button" class="button col-lg-3" value="Посмотреть результаты" onclick="javascript:window.location='/pages/Result_kul.php'">
            
                <input type="button" class="button col-lg-3 " value="Выгрузка в Excel" onclick="javascript:window.location='/pages/Result_kul_Excel.php'">
            
                <input type="button" class="button col-lg-3" value="Настройки" onclick="javascript:window.location='/pages/Settings.php'" />
            
           
                <input type="button" class="button col-lg-3 " value="Сотрудники" onclick="javascript:window.location='/pages/staff.php'">
            
                <input type="button" class="button col-lg-3" value="Выйти" onclick="javascript:window.location='/pages/login/Out.php'" />
            



</div>
</div>
<?php require_once 'inc/footer.php'/* подключение подвала */ ?>
