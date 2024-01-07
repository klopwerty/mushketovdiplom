<?php session_start()/*Старт сессии */ ?>
<?php require_once 'login/check_session.php' /* проверка аутентификации сессии */?>
<?php require_once 'inc/header.php'/* подключение шапки */?>

<div class="content">
    <div class="Main_text ">
        <h1>
            <p>Поиск</p>
        </h1>
        <div><input type="reset" value="Вернуться" class="back" onclick="javascript:window.location='main.php'"></div>
    </div>
    <div class="row">
        <div class=" Button col-lg-12 col-md-12  col-xs-12">
            <form name="search" method="post" action="search.php">


                <input type="text" placeholder="№ проекта" name="number" size="8%">
                
                <?php require 'form/capcity_name.php'?>
                <select name="capcity" style="width: 140px;" onChange="getFIO(this.value)">
	                   <option>Площадка</option>
                            <?php while ($row = mysql_fetch_array($result)) { ?>
	                   <option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	               <?php } ?>

	               </select>


        

        
            <input type="submit" value="Искать" style="width:130px;height:30px">
        </form>
      </div>


    </div>
</div>


<?php require_once 'inc/footer.php'/* подключение подвала */ ?>
