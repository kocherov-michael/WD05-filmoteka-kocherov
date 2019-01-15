<?php 
require('config.php');
require('database.php');
$link = db_connect();
require('functions/login-function.php');

if ( isset($_POST['user-submit'])){
	//Если администратор залогинен, то меняем его имя и город в базе данных
	if ($_POST['user-name'] != '') {
		if (isAdmin()){
				$query = mysqli_query($link,"UPDATE users 
											SET name = '". mysqli_real_escape_string($link, $_POST['user-name']) ."', 
												city = '". mysqli_real_escape_string($link, $_POST['user-city']) ."'
											WHERE login='admin'  LIMIT 1");
		}
		$userName = $_POST['user-name'];
		$userCity = $_POST['user-city'];
		$expire = time() + 60*60*24*30;
		//Устанавливаем setcookie (имя куки, значение, срок действия)
		setcookie('user-name', $userName, $expire);
		setcookie('user-city', $userCity, $expire);
	}
	
}
//Перенаправляем браузер
header('Location: ' . HOST . 'request.php');

 ?>