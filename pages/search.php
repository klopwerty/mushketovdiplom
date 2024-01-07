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
<div class="col-lg-11 Button">

    <?php
    require 'form/connect.php';
    $number =  trim($_REQUEST['number']);
    $capcity = trim($_REQUEST['capcity']);
   
     //Проверяем на пустоту
    if(  $number=="" or $capcity=="Ёмкость")
    {
        echo "<script>alert(\"Заполните обязательные поля\");</script>";
        die();
    }
    
    
$sql_select = "SELECT * FROM capcity_info INNER JOIN users ON capcity_info.FIO = users.users_id INNER JOIN kult ON capcity_info.period = kult.id INNER JOIN capcity_name ON capcity_info.capcity_name = capcity_name.id  WHERE capcity_number = $number AND capcity_name = $capcity  ORDER BY `id_capcity` DESC limit 100";  
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
    
    printf(
    "<table border='1' cellpadding='8' cellspacing='0'>
     <tr>
            <td width='1920PX' colspan='8' align='center'>".$row['name']."  ".$row['capcity_number']."</td>
        </tr>
    <tr>
        <td valign='top'><b>Время</td>
        <td valign='top'><b>ФИО Сотрудника</td>
        <td valign='top'><b>Период</td>
        <td valign='top'><b>SL</td>
        <td valign='top'><b>LCR</td>
        <td valign='top'><b>AHT</td>
        <td valign='top'><b>AR</td> 
    </tr>");
   
    do{
     printf("<tr>
     <td valign='top'>".$row['time_auto']."</td>
    <td  valign='top'>".$row['FIO']."</td>
    <td  valign='top'>".$row['kult']."</td>
        <td  valign='top'>".$row['SL']."</td>
        <td  valign='top'>".$row['LCR']."</td>
        <td  valign='top'>".$row['AHT']."</td>
       <td  valign='top'>".$row['AR']."</td>
   </tr>");}
while($row = mysql_fetch_array($result)); 
?>
</table>

<?php require_once 'inc/footer.php'/* подключение подвала */ ?>