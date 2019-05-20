<?php
session_start();

include ("auth.php");


$cat = $_GET['cat'];


if((USER_LOGGED) /*AND ($UserRole > 1)*/) {

				$cat = $_GET['cat'];  
			#	$id = $_GET['id'];
				
			#форма поиска
				
					
				
			
	// Выбираем нужное нам действие  
	switch ($cat)  
	{  
        case 'prj' : include "projects/prj_sub.php"; break;  
		case 'frm' : include "firms/frm_sub.php"; break;  
		case 'usr' : include "users/usr_sub.php"; break;
		case 'rep' : include "reports/rep_sub.php"; break;
		
        default :  ;  
	}  

				
}
else ;
//{echo '<div class="block_mess">Недостаточно прав</div>';}
?>