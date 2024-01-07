<?php session_start()/*Старт сессии */ ?>
<?php require_once 'login/check_session.php' /* проверка аутентификации сессии */?>
<?php require_once 'inc/header.php'/* подключение шапки */?>

<div class="MAIN">
    <div class="Name">
        <h1>
            <p>Заполнить показатели</p>
        </h1>


    </div>
    <div class="container">
        <div class="row">

            <div class=" col-lg-12 col-md-12  col-xs-12 ">
                <form name="x1" method="post" action="form/form_kul.php" class="X1">


<!--                 <input type="datetime-local" name="time1" size="40%"> -->

                    <p>

                        <br>
                        <input type="text" placeholder="№ проекта" style="text-align:center" name="number" size="8%">



                       
                            <?php require 'form/capcity_name.php'?>
                            <select name="capcity" style="width: 140px;" onChange="getFIO(this.value)">
                    
                                <option> Площадка</option>
                            <?php while ($row = mysql_fetch_array($result)) { ?>
	                   <option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	               <?php } ?>

	               </select>

<br>
                            <br>
<!--                                <?php require 'form/FIO.php'?>
                                <select name="FIO" onChange="getFIO(this.value)">
	                   <option>ФИО Сотрудника</option>
                            <?php while ($row = mysql_fetch_array($result)) { ?>
	                   <option value=<?php echo $row['users_id']?>><?php echo $row['FIO']?></option>
	               <?php } ?>

	               </select>
                            </p>-->
                            
                                <?php require 'form/kult.php'?>
                                <select name="period" onChange="getFIO(this.value)">
                                    <option>Период</option>
                            <?php while ($row = mysql_fetch_array($result)) { ?>
	                   <option value=<?php echo $row['id']?>><?php echo $row['kult']?></option>
	               <?php } ?>

	               </select>
                            </p>

                            <input type="text" placeholder="SL" name="SL" size="17%" style="text-align:center">
                            <input type="text" placeholder="LCR" name="LCR" size="17%" style="text-align:center">
                            <br>
                            <br>
                            <input type="text" placeholder="AHT" name="AHT" size="17%" style="text-align:center">
                            <input type="text" placeholder="AR" name="AR" size="17%" style="text-align:center">

                            <br>
                            <br>
                            <p><input type="submit" value="Отправить" style="width:130px;height:30px">
                                <input type="reset" value="Очистить" style="width:130px;height:30px"></p>
                </form>


            </div>
            <div style="margin:auto">
                <input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='main.php'">
            </div>
        </div>
        <?php require_once 'inc/footer.php'/* подключение подвала */ ?>
