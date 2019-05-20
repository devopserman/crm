<?php
session_start();
#firms
#include "../auth.php";  
#ЕСЛИ авторизован	
if(USER_LOGGED) {
$act = $_GET['act'];  
switch ($op) 
{ 

	case 'firm_to_del' :
			mysql_select_db($dbname, $link);	
			
			$firm = $_GET['id'];
			$firm_author_edit = $UserID;
			$firm_datetime_edit = date('Y-m-d H:i:s');
			if (($firm >0)) {
			$update_sql = "UPDATE firms SET 
								firm_active=0,
								firm_author_edit='$frim_author_edit',
								firm_datetime_edit='$firm_datetime_edit'
								
								 
							WHERE firm_id=".$firm." ";
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='firm_to_del';
						
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;

	case 'firm_to_edit' :
			mysql_select_db($dbname, $link);	
			

				$firm_name = htmlspecialchars($_POST[firm_name], ENT_COMPAT, 'windows-1251');
				$firm_full_name= htmlspecialchars($_POST[firm_full_name], ENT_COMPAT, 'windows-1251');
				$my_firm = 0;
				$black_list = $_POST[black_list];
				
				$firm = $_GET['id'];
				$firm_inn = htmlspecialchars($_POST[firm_inn], ENT_COMPAT, 'windows-1251');
				$firm_kpp = htmlspecialchars($_POST[firm_kpp], ENT_COMPAT, 'windows-1251');
				$firm_another_request = htmlspecialchars($_POST[firm_another_request], ENT_COMPAT, 'windows-1251');
				$firm_sphera = htmlspecialchars($_POST[firm_sphera], ENT_COMPAT, 'windows-1251');
				$firm_adress = htmlspecialchars($_POST[firm_adress], ENT_COMPAT, 'windows-1251');;
				$firm_email = htmlspecialchars($_POST[firm_email], ENT_COMPAT, 'windows-1251');
				$firm_telno = htmlspecialchars($_POST[firm_telno], ENT_COMPAT, 'windows-1251');
				$firm_faxno = htmlspecialchars($_POST[firm_faxno], ENT_COMPAT, 'windows-1251');
				$firm_dir = htmlspecialchars($_POST[firm_dir], ENT_COMPAT, 'windows-1251');
				$firm_dir_dolgn = htmlspecialchars($_POST[firm_dir_dolgn], ENT_COMPAT, 'windows-1251');
				$firm_dir_opt = htmlspecialchars($_POST[firm_dir_opt], ENT_COMPAT, 'windows-1251');
				$firm_contacts = htmlspecialchars($_POST[firm_contacts], ENT_COMPAT, 'windows-1251');
				$firm_comment = htmlspecialchars($_POST[firm_comment], ENT_COMPAT, 'windows-1251');
			
			
			
				$firm_author_edit = $UserID;
				$firm_datetime_edit = date('Y-m-d H:i:s');
				
				if (($firm >0) AND ($firm_name<>'')) {
				$update_sql = "UPDATE firms SET 
								firm_name = '$firm_name',
								firm_full_name = '$firm_full_name',
								firm_comment = '$firm_comment',
								firm_sphera = '$firm_sphera',
								firm_inn = '$firm_inn',
								firm_kpp = '$firm_kpp',
								firm_adress = '$firm_adress',
								firm_dir = '$firm_dir',
								firm_dir_dolgn = '$firm_dir_dolgn',
								firm_dir_opt = '$firm_dir_opt',
								firm_email = '$firm_email', 
								firm_telno = '$firm_telno',
								firm_faxno = '$firm_faxno',
								firm_contacts = '$firm_contacts',
								firm_datetime_edit = '$firm_datetime_edit',
								firm_author_edit = '$firm_author_edit',
								firm_another_request = '$firm_another_request'
								

			
								
								
								 
							WHERE firm_id=".$firm;
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='firm_to_edit';
				}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
	case 'firm_to_add' :
			mysql_select_db($dbname, $link);	
			

				$firm_name = htmlspecialchars($_POST[firm_name], ENT_COMPAT, 'windows-1251');
				$firm_full_name= htmlspecialchars($_POST[firm_full_name], ENT_COMPAT, 'windows-1251');
				$my_firm = 0;
				$black_list = 0;
				$firm_active = 1;
				
				$firm_datetime_add = date('Y-m-d H:i:s');
				$firm_datetime_edit = date('Y-m-d H:i:s');
				$firm_author = $UserID;
				$firm_author_edit = $UserID;
				$firm = $_GET['id'];
				$firm_inn = htmlspecialchars($_POST[firm_inn], ENT_COMPAT, 'windows-1251');
				$firm_kpp = htmlspecialchars($_POST[firm_kpp], ENT_COMPAT, 'windows-1251');
				$firm_another_request = htmlspecialchars($_POST[firm_another_request], ENT_COMPAT, 'windows-1251');
				$firm_sphera = htmlspecialchars($_POST[firm_sphera], ENT_COMPAT, 'windows-1251');
				$firm_adress = htmlspecialchars($_POST[firm_adress], ENT_COMPAT, 'windows-1251');;
				$firm_email = htmlspecialchars($_POST[firm_email], ENT_COMPAT, 'windows-1251');
				$firm_telno = htmlspecialchars($_POST[firm_telno], ENT_COMPAT, 'windows-1251');
				$firm_faxno = htmlspecialchars($_POST[firm_faxno], ENT_COMPAT, 'windows-1251');
				$firm_dir = htmlspecialchars($_POST[firm_dir], ENT_COMPAT, 'windows-1251');
				$firm_dir_dolgn = htmlspecialchars($_POST[firm_dir_dolgn], ENT_COMPAT, 'windows-1251');
				$firm_dir_opt = htmlspecialchars($_POST[firm_dir_opt], ENT_COMPAT, 'windows-1251');
				$firm_contacts = htmlspecialchars($_POST[firm_contacts], ENT_COMPAT, 'windows-1251');
				$firm_comment = htmlspecialchars($_POST[firm_comment], ENT_COMPAT, 'windows-1251');
			
			
				if (($firm_name<>'')) {
				$update_sql = "INSERT INTO firms 
									(firm_name, my_firm, black_list, firm_author, firm_comment, firm_active, firm_full_name, firm_sphera, firm_inn, firm_kpp, firm_adress, firm_dir, firm_dir_dolgn, firm_dir_opt, firm_email, firm_telno, firm_faxno, firm_contacts, firm_datetime_add, firm_datetime_edit, firm_author_edit, firm_another_request)
								VALUES
									('$firm_name','$my_firm','$black_list','$firm_author','$firm_comment','$firm_active','$firm_full_name','$firm_sphera','$firm_inn','$firm_kpp','$firm_adress','$firm_dir','$firm_dir_dolgn','$firm_dir_opt','$firm_email',
									'$firm_telno','$firm_faxno','$firm_contacts','$firm_datetime_add','$firm_datetime_edit','$firm_author_edit','$firm_another_request')";
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='firm_to_add';
				}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
	
	
	
	
	
	



			# Добавление новой фирмы
	case 'add' :
			mysql_select_db($dbname, $link);
			$firm_author = $UserID;
			$firm_name = $_POST['firm_name'];
			$firm_parrent = $_POST['firm_parrent'];
			$firm_full_name = $_POST['firm_full_name'];
			$firm_short_name = $_POST['firm_short_name'];
			$firm_inn = $_POST['firm_inn'];
			$firm_kpp = $_POST['firm_kpp'];
			$firm_adr_country = $_POST['firm_adr_country'];
			$firm_adr_index = $_POST['firm_adr_index'];
			$firm_adr_state = $_POST['firm_adr_state'];
			$firm_adr_region = $_POST['firm_adr_region'];			
			$firm_adr_city = $_POST['firm_adr_city'];
			$firm_adr_street = $_POST['firm_adr_street'];
			$firm_adr_house = $_POST['firm_adr_house'];			
			$firm_adr_office = $_POST['firm_adr_office'];
			$firm_adr_comment = $_POST['firm_adr_comment'];
			$firm_dir = $_POST['firm_dir'];
			$firm_dir_opt = $_POST['firm_dir_opt'];
			$firm_dir_rp = $_POST['firm_dir_rp'];
			$firm_glbuch = $_POST['firm_glbuch'];
			$firm_email = $_POST['firm_email'];
			$firm_telno = $_POST['firm_telno'];
			$firm_faxno = $_POST['firm_faxno'];
			$firm_contacts = $_POST['firm_contacts'];
			$firm_sphera = $_POST['firm_sphera'];
			$firm_comment = $_POST['firm_comment'];
			$firm_datetime_add = date('Y-m-d H:i:s');
			$firm_another_request = $_POST['firm_another_request'];
			
			if ($firm_name <> NULL) {
				
	
				
			$sql = 'INSERT INTO firms (firm_name, firm_author, firm_parrent,firm_full_name, firm_short_name, firm_inn, firm_kpp, firm_adr_country, firm_adr_index, firm_adr_state, firm_adr_region, 
			firm_adr_city, firm_adr_street, firm_adr_house, firm_adr_office, firm_adr_comment, firm_dir, firm_dir_opt, firm_dir_rp, firm_glbuch, firm_email, firm_telno, firm_faxno, 
			firm_contacts, firm_sphera, firm_comment, firm_datetime_add, firm_another_request) 
			VALUES("'.$firm_name.'","'.$firm_author.'", "'.$firm_parrent.'", "'.$firm_full_name.'", "'.$firm_short_name.'", "'.$firm_inn.'", "'.$firm_kpp.'", "'.$firm_adr_country.'", "'.$firm_adr_index.'", 
			"'.$firm_adr_state.'", "'.$firm_adr_region.'", "'.$firm_adr_city.'","'.$firm_adr_street.'", "'.$firm_adr_house.'","'.$firm_adr_office.'", "'.$firm_adr_comment.'","'.$firm_dir.'", "'.$firm_dir_opt.'",
			"'.$firm_dir_rp.'", "'.$firm_glbuch.'","'.$firm_email.'", "'.$firm_telno.'","'.$firm_faxno.'", "'.$firm_contacts.'","'.$firm_sphera.'", "'.$firm_comment.'", "'.$firm_datetime_add.'", "'.$firm_another_request.'")';
			
			

			
			 if(!mysql_query($sql))
 			{$m = 'err';} 
	 			else
	 			{$m = 'add';}
			#echo $firm_author.'error - '.mysql_error();
			}
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
			# Редактирование данных о фирме	
	case 'edit'	:
			if (isset($_GET['id']) && is_numeric($_GET['id'])){
			
			$sql = mysql_query("SELECT * FROM users WHERE uid =".$_GET['id']."  LIMIT 1");
			$id = $_GET['id'];
			$firm_author = $UserID;
			$firm_name = $_POST['firm_name'];
			$firm_parrent = $_POST['firm_parrent'];
			$firm_full_name = $_POST['firm_full_name'];
			$firm_short_name = $_POST['firm_short_name'];
			$firm_inn = $_POST['firm_inn'];
			$firm_kpp = $_POST['firm_kpp'];
			$firm_adr_country = $_POST['firm_adr_country'];
			$firm_adr_index = $_POST['firm_adr_index'];
			$firm_adr_state = $_POST['firm_adr_state'];
			$firm_adr_region = $_POST['firm_adr_region'];			
			$firm_adr_city = $_POST['firm_adr_city'];
			$firm_adr_street = $_POST['firm_adr_street'];
			$firm_adr_house = $_POST['firm_adr_house'];			
			$firm_adr_office = $_POST['firm_adr_office'];
			$firm_adr_comment = htmlspecialchars($_POST['firm_adr_comment']);
			$firm_dir = $_POST['firm_dir'];
			$firm_dir_opt = $_POST['firm_dir_opt'];
			$firm_dir_rp = $_POST['firm_dir_rp'];
			$firm_glbuch = $_POST['firm_glbuch'];
			$firm_email = $_POST['firm_email'];
			$firm_telno = $_POST['firm_telno'];
			$firm_faxno = $_POST['firm_faxno'];
			$firm_contacts = htmlspecialchars($_POST['firm_contacts']);
			$firm_sphera = $_POST['firm_sphera'];
			$firm_comment = htmlspecialchars($_POST['firm_comment']);
			#$firm_datetime_add = date('Y-m-d H:i:s');
			$firm_another_request = $_POST['firm_another_request'];
			$firm_author_edit = $UserID;
			$firm_datetime_edit = date('Y-m-d H:i:s');
			
			if ($firm_name <> NULL) {
			$update_sql = "UPDATE firms SET firm_name='$firm_name', firm_parrent='$firm_parrent',firm_full_name='$firm_full_name', firm_short_name='$firm_short_name', firm_inn='$firm_inn', firm_kpp='$firm_kpp', firm_adr_country='$firm_adr_country', firm_adr_index='$firm_adr_index', firm_adr_state='$firm_adr_state', firm_adr_region='$firm_adr_region', 
			firm_adr_city='$firm_adr_city', firm_adr_street='$firm_adr_street', firm_adr_house='$firm_adr_house', firm_adr_office='$firm_adr_office', firm_adr_comment='$firm_adr_comment', firm_dir='$firm_dir', firm_dir_opt='$firm_dir_opt', firm_dir_rp='$firm_dir_rp', firm_glbuch='$firm_glbuch', firm_email='$firm_email', firm_telno='$firm_telno', firm_faxno='$firm_faxno', 
			firm_contacts='$firm_contacts', firm_sphera='$firm_sphera', firm_comment='$firm_comment', firm_another_request='$firm_another_request', firm_author_edit='$firm_author_edit', firm_datetime_edit='$firm_datetime_edit'
			 WHERE firm_id='$id'";
			
			mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$m = 'edit';
							}
							else {$m = 'err';
							echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	
						}
			}
				mysql_query($query, $link);
				mysql_close($link);
		break;

			# Удаление фирмы		
	case 'del'	:
				if (isset($_GET['id']) && is_numeric($_GET['id'])){
					$id=$_REQUEST['id'];
					$qr_result = "UPDATE firms SET firm_active='0' WHERE firm_id='$id'";
					mysql_query($qr_result) or die("Ошибка вставки" . mysql_error());
					$m = 'del';	
				}
				mysql_query($query, $link);
				mysql_close($link);
		break;
			
			

}

echo '<div class="block1">';
switch ($op)  
{  	
		case 'firm_to_edit' 				: echo '<p>Запись отредактирована!</p><p><a href="index.php?cat=frm&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
		case 'firm_to_del' 					: echo '<p>Запись удалена!</p><p><a href="index.php?cat=frm&op=main">Вернуться назад</a></p>'; break;  
		case 'firm_to_add' 					: echo '<p>Запись добавлена!</p><p><a href="index.php?cat=frm&op=main">Вернуться назад</a></p>'; break;  
		
		
        case 'add' : echo '<p>Запись добавлена!</p>'; break;  
		case 'edit' : echo '<p>Запись отредактирована!</p>'; break;  
		case 'del' : echo '<p>Запись удалена!</p>'; break;  
				case 'err' : echo '<p>Возникла ошибка! Проверьте данные и повторите операцию.</p><p><a href="index.php?cat=frm&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
       
}  

echo '</div>';
}
?>
