<?php 
require('config.php');

if ( isset($_POST['user-submit'])){
	$userName = $_POST['user-name'];
	$userCity = $_POST['user-city'];
	$expire = time() + 60*60*24*30;
	//Устанавливаем setcookie (имя куки, значение, срок действия)
	setcookie('user-name', $userName, $expire);
	setcookie('user-city', $userCity, $expire);
}
//Перенаправляем браузер
header('Location: ' . HOST . 'request.php');

 ?>