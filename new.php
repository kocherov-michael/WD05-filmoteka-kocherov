<?php 
require('config.php');
require('database.php');
$link = db_connect();
require('models/films.php');

if ( array_key_exists('add-film', $_POST) ) {
	//Обработка ошибок
	if ( $_POST['title'] == '' ) {
		$errors[] = "Необходимо ввести название фильма";
	}
	if ( $_POST['genre'] == '' ) {
		$errors[] = "Необходимо ввести жанр фильма";
	}
	if ( $_POST['year'] == '' ) {
		$errors[] = "Необходимо ввести год фильма";
	} 
	//Если нет ошибок - сохраняем фильм
	if(empty($errors)){
		$result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
		if ( $result ) {
			$resultSuccess = "<p>Фильм был успешно добавлен!</p>";
		} else { 
			$resultError = "<p>Что то пошло не так. Добавьте фильм еще раз!</p>";
		}
	}
}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');
 ?>
