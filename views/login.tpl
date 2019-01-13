<h1>Вход для администратора</h1>
<?php 
if ( !empty($errors)) {
	foreach ($errors as $key => $value) {
		echo "<div class='notify notify--error mb-20'>$value</div>";
	}
}?>
<form action="login.php" method="POST" class="mb-50">
	<div class="form-group"><label class="label">Логин<input class="input" name="login" type="text" placeholder="заходи как admin, будь как дома" /></label></div>
	
	<div class="form-group"><label class="label">Пароль<input class="input" name="password" type="password" placeholder="небольшая подсказонька - 123456" /></label></div>
	
	<input class="button" type="submit" name="enter" value="Войти на сайт" />
</form>