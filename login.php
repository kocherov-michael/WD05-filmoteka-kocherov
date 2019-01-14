<?php 
require('config.php');
require('database.php');
$link = db_connect();
require('functions/login-function.php');

// if ( isset($_POST['enter']) ) {
// 	$userName = 'admin';
// 	$userPassword = '123456';
// 	if ( $_POST['login'] == $userName ) {
// 		if ( $_POST['password'] == $userPassword ) {
// 			$_SESSION['user'] = 'admin';
// 			header('Location: ' . HOST . 'index.php');
// 		}
// 	}
// }

if(isset($_POST['enter']))
{
	if ( $_POST['login'] == '' ) {
		$errors[] = "Необходимо ввести логин";
	}
	if ( $_POST['password'] == '' ) {
		$errors[] = "Необходимо ввести пароль";
	}
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT * FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."' LIMIT 1");
    //формируем из полученных данных ассоциативный массив
    $data = mysqli_fetch_assoc($query);

	// echo ("<pre>");
	// print_r($data);
	// echo ("</pre>");

    // Сравниваем пароли
    if ($data['password'] === ($_POST['password'])) {
       $_SESSION['user'] = 'admin';
       //Устанавливаем куки
       $userName = $data['name'];
       $userCity = $data['city'];
       $expire = time() + 60*60*24*30;
       setcookie('user-name', $userName, $expire);
       setcookie('user-city', $userCity, $expire);
       header('Location: ' . HOST . 'index.php');
    } else if ( $_POST['login'] != '' && $_POST['password'] != '' ){
    	$errors[] = "Вы ввели неправильный логин/пароль";
    }
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');
?>
