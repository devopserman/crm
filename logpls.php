<div class="block1">

    
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<p class="note_white">
				<a href="/index.php"><img src="/images/crm_logo.png" valign="middle"/></a></br></br>
					Имя:<input type="text" name="user">
					Пароль:<input type="password" name="pass">
					<input type="submit" name="login" value="Войти">
					</br></br>
					Выполните вход в систему или <a href="registration.php">Зарегистрируйтесь</a>
				</p>
		</form>
		



<?php

echo '<p class="note_green">Тестовый аккаунт:</br>Логин: user</br>Пароль: 1</p>';
?>

</div>