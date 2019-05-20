<?php
session_start();

include ("auth.php");


$cat = $_GET['cat'];


if((USER_LOGGED) /*AND ($UserRole > 1)*/) {
# вывод главного меню

echo '
	<ul class="topmenu">';
	
		echo "<li "; if ($cat == NULL) 		echo " class=\"current\""; echo "><a href='/'><b>Главная</b></a></li>";
		echo "<li "; if ($cat == 'prj') 	echo " class=\"current\""; echo "><a href='index.php?cat=prj&op=main'><b>Проекты</b></a></li>";				
		echo "<li "; if ($cat == 'frm')    	echo " class=\"current\""; echo "><a href='index.php?cat=frm&op=main'><b>Предприятия</b></a></li>";
		echo "<li "; if ($cat == 'usr')  	echo " class=\"current\""; echo "><a href='index.php?cat=usr&op=main'><b>Пользователи</b></a></li>";
		#echo "<li "; if(($_SERVER['PHP_SELF']=='/products/products.php')or($_SERVER['PHP_SELF']=='/groups/groups.php'))  		echo " class=\"current\""; echo "><a href='/products/products.php'><b>Товары</b></a></li>";
		
		#echo "<li "; if($_SERVER['PHP_SELF']=='/messages/messages.php') echo " class=\"current\""; echo "><a href='/messages/messages.php'><b>Сообщения</b></a></li>";
		#echo "<li "; if($_SERVER['PHP_SELF']=='/tasks/tasks.php') 		echo " class=\"current\""; echo "><a href='/tasks/tasks.php'><b>Задачи</b></a></li>";
		
		
echo '	</ul>
	<div class="block_gray">
 ';
}
else ;
//{echo '<div class="block_mess">Недостаточно прав</div>';}
?>