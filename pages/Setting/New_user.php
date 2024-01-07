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

    </div>
    <div class="MAIN">

     

                    <h3>
                        <p>Добавить сотрудника</p></h3>
                     
                    <div class="box">
                        <form name="new_staff" method="post" action="../form/NEW_Staff.php" class="staff">
                            <b>Дата Принятие: </b>
                            <input type="date" name="date" size="40%">
                           <br>
                            <br>
                            <input type="text" name="FIO" size="40%"  placeholder="ФИО" style="text-align:center">
                            <br>
                            <br>
                            <input type="text" name="login" size="40%"  placeholder="Логин" style="text-align:center">
                            <br>
                            <br>
                            <input type="password" name="password" size="40%"  placeholder="Пароль" style="text-align:center">
                            <br>
                            <br>
                            <?php require 'position.php'?>
                            <select name="position" onChange="getposition(this.value)">
                             <option> Должность</option>
                            <?php while ($row = mysql_fetch_array($result)) { ?>
	                   <option value=<?php echo $row['id']?>><?php echo $row['position']?></option>
	               <?php } ?>
                            </select>
                            <br>
                            <br>
                                <p><input type="submit" value="Отправить" style="width:130px;height:30px">
                                    <input type="reset" value="Очистить" style="width:130px;height:30px"></p>

                        </form>



            </div>
           

 </div> 
 


     
  

<?php require_once '../inc/footer.php'/* подключение подвала */ ?>
