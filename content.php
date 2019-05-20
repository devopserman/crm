<?php
session_start();

include ("auth.php");





if((USER_LOGGED) ) {
	
	$cat = $_GET['cat'];
	
	// Выбираем нужное нам действие  
	switch ($cat)  
	{  
        case 'prj' 			: include "projects/projects.php"; break;  
        case 'frm' 			: include "firms/firms.php"; break;  
        case 'usr' 			: include "users/users.php"; break;  
		case 'rep' 			: include "reports/reports.php"; break;  
		case 'reg' 			: include "registration.php"; break;		
		case 'regfinish' 	: include "action.php"; break;	
		
		
        default    : 

						echo'		
						<p>Главная</p>
						<p></p>
						<p class="note_white">[здесь что-то будет]</p>
						<div class="note_white">
							<p> а пока доступны следующие модули:</p>
							
							<p><a href="index.php?cat=prj&op=main">Проекты</a></p>
							<p><a href="index.php?cat=frm&op=main">Предприятия</a></p>
							<p><a href="index.php?cat=usr&op=main">Пользователи</a></p>
						</div>
						
								';
								  ;
	}  


	
}
else ;
//{echo '<div class="block_mess">Недостаточно прав</div>';}
?>