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
						case 'main' : include "main.php"; break;  
						case 'archive' : include "archive.php"; break;  
						case 'search' : include "search.php"; break;
						case 'new' : include "prj_new.php"; break;  
						case 'prnew' : include "action.php"; break;  
						case 'prdel' : include "action.php"; break;  
						case 'msgdel' : include "action.php"; break;  
						case 'edit' : include "prj_edit.php"; break;  
						case 'predit' : include "action.php"; break;  
						case 'messadd' : include "action.php"; break;  
						case 'add' : include "add.php"; break;  
						case 'show' : include "show.php"; break;  
						default :  include "main.php";  
					}  

				}

				
	
?>