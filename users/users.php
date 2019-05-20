<?php
session_start();
# Модуль users

include "auth.php";  

			#ЕСЛИ авторизован	
			if(USER_LOGGED) {
				// Получаем параметр op из URL  
				$op = $_GET['op'];  
				$id = $_GET['id'];			
				
			
	// Выбираем нужное нам действие  
	switch ($op)  
	{  
        case 'main' 		 	: include "main.php"; break;  
		case 'show'          	: include "show.php"; break;  
		case 'usr_new_firm'  	: include "usr_new_firm.php"; break; 
		case 'usr_new_prj'  	: include "usr_new_prj.php"; break; 
		case 'usr_to_new_firm'	: include "action.php"; break;  
		case 'usr_to_new_prj'	: include "action.php"; break;  
		case 'usr_edit_firm'	: include "usr_edit_firm.php"; break;  
		case 'usr_edit_prj'		: include "usr_edit_prj.php"; break;  
		case 'usr_to_edit_firm'	: include "action.php"; break; 
		case 'usr_to_edit_prj'	: include "action.php"; break; 
		case 'usr_to_del_firm'	: include "action.php"; break; 
		case 'usr_to_del_prj'	: include "action.php"; break; 
		case 'edit' 			: include "usr_edit.php"; break; 
		case 'usr_to_del' 		: include "action.php"; break; 
		case 'user_to_edit' 	: include "action.php"; break; 
		case 'user_add' 		: include "usr_add.php"; break; 
		case 'user_to_add' 		: include "action.php"; break; 
		case 'usr_new_pass'		: include "usr_new_pass.php"; break; 
		case 'usr_to_new_pass'	: include "action.php"; break; 
		
		
		
		
		case 'archive' : include "archive.php"; break;  
		case 'search' : include "search.php"; break;  
        case 'del' : include "del.php"; break;  
         
		case 'messadd' : include "action.php"; break;  
        case 'add' : include "add.php"; break;  
        
        default :  include "main.php";  
	}  

				}

				
	
?>