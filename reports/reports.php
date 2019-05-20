<?php
session_start();
# Модуль проектов

include "auth.php";  

			#ЕСЛИ авторизован	
			if(USER_LOGGED) {
				// Получаем параметр op из URL  
				$op = $_GET['op'];  
				$id = $_GET['id'];

	// Выбираем нужное нам действие  
	switch ($op)  
	{  
        case 'main'       : include "main.php"; break;  
		case 'newreport'  : include "action.php"; break;  
		case 'confirm'    : include "action.php"; break;  
		case 'noconfirm'    : include "action.php"; break;  
		
	
        default :  include "main.php";  
	}  

				}

				
	
?>