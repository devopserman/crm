<?php

	#ЕСЛИ авторизован
if(USER_LOGGED) {
echo '
					<p><input type="search" name="q" placeholder="Поиск"> 
					<input type="submit" value="Найти"></p>';

echo   '<p><a href="index.php?cat=usr&op=user_add">Новый контакт</a></p>
		<p></p>
		<p><a href="index.php?cat=usr&op=main">Все контакты</a></p>
		<p><a href="index.php?cat=usr&op=main&select=my">Мои контакты</a></p>

		<p><a href="#">Удаленные</a></p>
';

}
?>
