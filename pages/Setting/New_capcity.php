<?php session_start()/*Старт сессии */ ?>
<?php require_once '../login/check_session_sys_admin.php' /* проверка аутентификации сессии */?>
<?php require_once '../inc/header.php'/* подключение шапки */?>

<div class="MAIN">
    <div class="Name">
        <h1>
            <p>Площадки</p>
        </h1>
    </div>
    <div><input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='http://workgroup/pages/Settings.php'"></div>

</div>
<div class="MAIN">

    <div class="container">
        <div class="row">


            <div class="box col-md-6">
                <h3>
                    <p>Добавить Площадку</p>
                </h3>


                <form name="new_staff" method="post" action="../form/New_capcity_form.php" class="staff">
                    <br>
                    <input type="capcity" placeholder="Название новой площадки" name="capcity" size="30%">

                    <br>
                    <br>
                    <p><input type="submit" value="Отправить" style="width:130px;height:30px">
                        <input type="reset" value="Очистить" style="width:130px;height:30px"></p>

                </form>

            </div>

            <div class="box col-md-6">
                
                <h3>
                    <p>Добавить Площадку</p>
                </h3>

                <table align="center" border="1" cellpadding="7" cellspacing="0">
                    <tr>
                        <td valign="top">
                            <h5><b>Наименование</h5>
                        </td>
                    </tr>
                    <?php
require 'login/connect.php'; /*Подключение БД*/
$sql_select = "SELECT * FROM capcity_name"; /*запрос к БД*/
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

    do{
     printf("<tr>
     <td valign='top'>".$row['name']."</td>
   </tr>");}
while($row = mysql_fetch_array($result));
?>
                </table>



            </div>
        </div>
    </div>




    <?php require_once '../inc/footer.php'/* подключение подвала */ ?>
