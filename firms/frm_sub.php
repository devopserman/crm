<?php

	#ЕСЛИ авторизован
if(USER_LOGGED) {
echo '
					<p><input type="search" name="q" placeholder="Поиск"> 
					<input type="submit" value="Найти"></p>';

echo    '<p><a href="index.php?cat=frm&op=frm_add">Новая фирма</a></p>
		 <p><a href="index.php?cat=frm&op=main&select=del">Удаленные</a></p>
		 <p><a href="index.php?cat=frm&op=main&select=blacklist">Должники</a></p>
';

}
?>
