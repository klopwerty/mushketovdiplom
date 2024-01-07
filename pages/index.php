<?php

  # Функция для генерации случайной строки 
  function generateCode($length=6) { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
    $code = ""; 
    $clen = strlen($chars) - 1;   
    while (strlen($code) < $length) { 
        $code .= $chars[mt_rand(0,$clen)];   
    } 
    return $code; 
  } 
  
  # Если есть куки с ошибкой то выводим их в переменную и удаляем куки
  if (isset($_COOKIE['errors'])){
      $errors = $_COOKIE['errors'];
      setcookie('errors', '', time() - 60*24*30*12, '/');
  }

  # Подключаем конфиг
  include '../config.php';

  if(isset($_POST['submit'])) 
  { 
    
    # Вытаскиваем из БД запись, у которой логин равняеться введенному 
    $data = mysql_fetch_assoc(mysql_query("SELECT users_id, users_password FROM `users` WHERE `users_login`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1")); 
     
    # Сравниваем пароли 
    if($data['users_password'] === md5(md5($_POST['password']))) 
    { 
      # Генерируем случайное число и шифруем его 
      $hash = md5(generateCode(10)); 
           
      # Записываем в БД новый хеш авторизации и IP 
      mysql_query("UPDATE users SET users_hash='".$hash."' WHERE users_id='".$data['users_id']."'") or die("MySQL Error: " . mysql_error()); 
        
      # Ставим куки 
      setcookie("id", $data['users_id'], time()+60*60*24*30); 
      setcookie("hash", $hash, time()+60*60*24*30);
        
      # Переадресовываем браузер на страницу проверки нашего скрипта 
      header("Location: login/check.php"); exit(); 

    } 
    else 
    { 
   echo "<script>alert(\"Неверный Пароль, попробуйте снова\");</script>";
        
    } 
  }

?>

 <?php require_once 'inc/header.php'/* подключение шапки */?> 

    <form method="POST" class="login_form">
        <p>Логин</p> <input name="login" type="text"><br>
        <p>Пароль</p> <input name="password" type="password"><br>
        <input name="submit" type="submit" class="submit" value="Войти">
    </form>
    <?php
  # Проверяем наличие в куках номера ошибки
  if (isset($errors)) {print '<h4>'.$error[$errors].'</h4>';}
  ?>

<?php require_once 'inc/footer.php'/* подключение подвала */ ?>