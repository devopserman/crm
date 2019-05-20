<?php
session_start();
#users


#ЕСЛИ авторизован	
if(USER_LOGGED) {
$op = $_GET['op'];  
if (isset($_GET['id']) && is_numeric($_GET['id'])){$id = $_GET['id']; } else {$id = NULL;}

switch ($op) 
{ 

	case 'usr_to_new_firm' :
			mysql_select_db($dbname, $link);	
		
			$mess_text = htmlspecialchars($_POST['pr_comment'], ENT_COMPAT, 'windows-1251');
			$firm = $_POST[id_value];
			$tel = $_POST[tel];
			$email = $_POST[email];
			
			if ($firm>0) {
			$sql = 'INSERT INTO user_to_firm (user_id, firm_id, tel, email, comment) 
			VALUES("'.$id.'", "'.$firm.'", "'.$tel.'", "'.$email.'", "'.$mess_text.'")';
			 if(!mysql_query($sql))
 			{$op = 'err';} 
	 			else
	 			{
					$op = 'firmadd';
				}
			}
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
		
	case 'usr_to_new_prj' :
			mysql_select_db($dbname, $link);	
			
			$user_id = $_GET[id];
			$pr_id = $_POST[pr_commit];
						$query = "SELECT * FROM user_to_project WHERE user_id=".$user_id." AND project_id=".$pr_id." AND active=1 ORDER BY user_id";
						$result = mysql_query($query) or die(mysql_error());

						$count = mysql_num_rows($result);
						$datetime = date('Y-m-d H:i:s');
			
				if ($pr_id>0){		
						if ($count>0) {
							$op = 'usr_add_prj_err';
						}
						else{
							$sql = 'INSERT INTO user_to_project (user_id, project_id, date_add) 
							VALUES("'.$user_id.'", "'.$pr_id.'", "'.$datetime.'")';
							mysql_query($sql) or die("Ошибка вставки" . mysql_error());
							$op = 'usr_add_prj_add';
						}
				}		
				else { echo '<font color="red">Проект не выбран!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;	
		
		
	case 'usr_to_edit_firm' :
			mysql_select_db($dbname, $link);	
			
			
			$user =  $_POST['user_id'];
			$comment = htmlspecialchars($_POST['comment'], ENT_COMPAT, 'windows-1251');
			$firm = $_POST[id_value];
			$tel = $_POST[tel];
			$email = $_POST[email];

			if (($firm>0) and ($user >0)) {
			$update_sql = "UPDATE user_to_firm SET 
									user_id='$user', 
									firm_id='$firm', 
									tel='$tel', 
									email='$email', 
									comment='$comment'
									
									WHERE id=".$id;
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='usr_to_edit_firm';
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	case 'usr_to_del_firm' :
			mysql_select_db($dbname, $link);	
			
			$user =  $_GET['user'];
			
			if (($id >0)) {
			$update_sql = "UPDATE user_to_firm SET active='0' WHERE id=".$id;
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='usr_to_del_firm';
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	case 'usr_to_del_prj' :
			mysql_select_db($dbname, $link);	
			
			$user =  $_GET['user'];
			$pr_id = $_GET['id'];
			if (($pr_id >0) and ($user>0)) {
			$update_sql = "UPDATE user_to_project SET active='0' WHERE user_id=".$user." AND project_id=".$pr_id;
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='usr_to_del_prj';
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	case 'usr_to_del' :
			mysql_select_db($dbname, $link);	
			
			$user = $_GET['id'];
			$edit_author = $UserID;
			$edit_date = date('Y-m-d H:i:s');
			if (($user >0)) {
			$update_sql = "UPDATE users SET 
								user_active=0,
								edit_author='$edit_author',
								edit_datetime='$edit_date',
								
								 
							WHERE uid=".$user;
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='usr_to_del';
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
	case 'user_to_edit' :
			mysql_select_db($dbname, $link);	
			
			$user = $_GET['id'];
			$username = $_POST[user_name];
			$user_dob = $_POST[user_dob];
			$user_mobtelno = $_POST[user_mobtelno];
			$user_email = $_POST[user_email];
			$user_comment = htmlspecialchars($_POST['user_comment'], ENT_COMPAT, 'windows-1251');
			$edit_author = $UserID;
			$edit_date = date('Y-m-d H:i:s');
	
			
			if (($user >0) AND ($username<>'')) {
			$update_sql = "UPDATE users SET 
								username='$username',
								user_dob='$user_dob',
								user_mobtelno='$user_mobtelno',
								user_email='$user_email',
								user_comment='$user_comment',
								
								edit_author='$edit_author',
								edit_datetime='$edit_date'
								 
							WHERE uid=".$user;
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='usr_to_edit';
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
		
	case 'usr_to_new_pass' :
			mysql_select_db($dbname, $link);	
			
			$user = $_GET['id'];
			$id = $_GET['id'];
			$user_pass1 = $_POST[user_pass1];
			$user_pass2 = $_POST[user_pass2];
			$user_pass3 = $_POST[user_pass3];
	
			if (md5($user_pass1)==GetUserHash($UserID)) {
				if (($user_pass2==$user_pass3)){
					
							if ($user >0) {
								$hash = md5($user_pass2);
							$update_sql = "UPDATE users SET 
											password='$hash'
											
										WHERE uid=".$user;
									mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
									$op='pass_ok';
						}			
				}
				else
				{
					$op='pass_error2';					
				}
				
				
				
			}
			else
			{
				$op='pass_error';
			}
			
	
			mysql_query($query, $link);
			mysql_close($link);
		break;		
		
		
	
	case 'user_to_add' :
			mysql_select_db($dbname, $link);	
			
			$user = $_GET['id'];
			$username = $_POST[user_name];
			$password = '1';
			$user_dob = $_POST[user_dob];
			$user_date_add = date('Y-m-d H:i:s');
			$user_mobtelno = $_POST[user_mobtelno];
			$user_email = $_POST[user_email];
			$user_comment = htmlspecialchars($_POST['user_comment'], ENT_COMPAT, 'windows-1251');
			$edit_author = $UserID;
			$edit_date = date('Y-m-d H:i:s');
			
			if ($username<>'') {
				
				$sql = 'INSERT INTO users (username, password, user_email, user_role, user_date_add, user_mobtelno, user_comment, user_dob, edit_author, edit_datetime) 
							VALUES("'.$username.'", "'.$password.'", "'.$user_email.'", "'.$user_role.'", "'.$user_date_add.'", "'.$user_mobtelno.'", "'.$user_comment.'", "'.$user_dob.'", "'.$edit_author.'", "'.$edit_datetime.'")';
							mysql_query($sql) or die("Ошибка вставки" . mysql_error());
							$op = 'usr_to_add';
				
			}
			
			
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
	# Редактирование данных
	case 'predit'	:
			$id=$_GET['id'];
			$pr_name = $_POST[pr_name];
			#$pr_firm = $_POST[pr_firm];
			$pr_firm = $_POST[id_value];
			$pr_performer = $_POST[pr_performer];
			$pr_lid = $_POST[pr_lid];
			$pr_date_reg = $_POST[pr_date_reg];
			$pr_date_limit = $_POST[pr_date_limit];
			$pr_date_finish = $_POST[pr_date_finish];
			$pr_date_cost = $_POST[pr_date_cost];
			$pr_date_acts = $_POST[pr_date_acts];
			$pr_date_get_acts = $_POST[pr_date_get_acts];
			$pr_type = $_POST[pr_type];
			$pr_status = $_POST[pr_status];
			$pr_comment = htmlspecialchars($_REQUEST[pr_comment], ENT_COMPAT, 'windows-1251');
			$pr_update = date('Y-m-d H:i:s');
			
			if ($pr_name <> NULL) {
						$update_sql = "UPDATE projects SET 
									pr_name='$pr_name', 
									pr_firm='$pr_firm', 
									pr_performer='$pr_performer', 
									pr_lid='$pr_lid', 
									pr_date_reg='$pr_date_reg',
									pr_date_limit='$pr_date_limit',
									pr_date_finish='$pr_date_finish',
									pr_date_cost='$pr_date_cost',
									pr_date_acts='$pr_date_acts',
									pr_date_get_acts='$pr_date_get_acts',
									pr_status='$pr_status',
									pr_type='$pr_type',
									pr_comment='$pr_comment',
									pr_update='$pr_update'

									WHERE pr_id=".$_GET['id'];
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='edit';
					}
			
		break;
	# Новый проект	
	case 'prnew'	:
			#$id=$_GET['id'];
			$pr_active = 1;
			$pr_name = $_POST[pr_name];
			$firm_id = $_POST[id_value];
			$pr_author = $UserID;
			$pr_performer = $_POST[pr_performer];
			$pr_lid = $_POST[pr_lid];
			$pr_date_reg = date('Y-m-d');
			$pr_date_limit = $_POST[pr_date_limit];
			$pr_type = $_POST[pr_type];
			$pr_status = 1;
			$pr_comment = htmlspecialchars($_REQUEST[pr_comment], ENT_COMPAT, 'windows-1251');
			$pr_update = date('Y-m-d H:i:s'); 
	
			if ($pr_name <> NULL) {
				
		
						$update_sql = "INSERT INTO projects
									(pr_id,
									pr_active,
									pr_name,
									pr_firm,
									pr_author,
									pr_lid,
									pr_date_reg,
									pr_date_limit,
									pr_date_finish,
									pr_type,
									pr_date_cost,
									pr_date_acts,
									pr_date_get_acts,
									pr_status,
									pr_performer,
									pr_comment,
									pr_update)
									
									VALUES (NULL,
									'".$pr_active."',
									'".$pr_name."',
									'".$firm_id."',
									'".$pr_author."',
									'".$pr_lid."',
									'".$pr_date_reg."',
									'".$pr_date_limit."',
									'".$pr_date_finish."',
									'".$pr_type."',
									'".$pr_date_cost."',
									'".$pr_date_acts."',
									'".$pr_date_get_acts."',
									'".$pr_status."',
									'".$pr_performer."',
									'".$pr_comment."',
									'".$pr_update."')"
									
									;
									
									
									
						mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$op='new';
					}
			
		break;

	# Удаление проекта		
	case 'prdel'	:
				if (isset($_GET['id']) && is_numeric($_GET['id'])){
					$id=$_GET['id'];
					$qr_result = "UPDATE project SET pr_active='0' WHERE pr_id=".$id;
					mysql_query($qr_result) or die("Ошибка вставки" . mysql_error());
					$op = 'prdel';	
				}
				mysql_query($query, $link);
				mysql_close($link);
		break;
	
	# Удаление сообщения
	case 'msgdel'	:
				if (isset($_GET['msg']) && is_numeric($_GET['msg'])){
					$msg=$_GET['msg'];
					$qr_result = "UPDATE messages SET mess_active='0' WHERE mess_id=".$msg;
					mysql_query($qr_result) or die("Ошибка вставки" . mysql_error());
					$op = 'msgdel';	
				}
				mysql_query($query, $link);
				mysql_close($link);
		break;			
			

}



	echo '<div class="block1">';
		switch ($op)  
			{  
				case 'firmadd' 					: echo '<p>Запись добавлена!</p><p><a href="index.php?cat=usr&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'usr_to_edit_firm' 		: echo '<p>Данные обновлены!</p><p><a href="index.php?cat=usr&op=show&id='.$user.'">Вернуться назад</a></p>'; break;  
				case 'usr_to_del_firm' 			: echo '<p>Запись удалена!</p><p><a href="index.php?cat=usr&op=show&id='.$user.'">Вернуться назад</a></p>'; break;  
				case 'usr_add_prj_add' 			: echo '<p>Запись добавлена!</p><p><a href="index.php?cat=usr&op=show&id='.$user_id.'">Вернуться назад</a></p>'; break;  
				case 'usr_add_prj_err' 			: echo '<p>Пользователь уже прикреплен в этот проект!</p><p><a href="index.php?cat=usr&op=show&id='.$user_id.'">Вернуться назад</a></p>'; break;  
				case 'usr_to_del_prj' 			: echo '<p>Запись удалена!</p><p><a href="index.php?cat=usr&op=show&id='.$user.'">Вернуться назад</a></p>'; break;  
				case 'usr_to_del' 				: echo '<p>Запись удалена!</p><p><a href="index.php?cat=usr">Вернуться назад</a></p>'; break;  
				case 'usr_to_edit' 				: echo '<p>Запись отредактирована!</p><p><a href="index.php?cat=usr&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'usr_to_add' 				: echo '<p>Запись добавлена!</p><p><a href="index.php?cat=usr&op=main&sort=desc">Вернуться назад</a></p>'; break;  
				
				case 'pass_error' 				: echo '<p>Неверный пароль!</p><p><a href="index.php?cat=usr&op=usr_new_pass&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'pass_error2' 				: echo '<p>Новые пароли не совпадают!</p><p><a href="index.php?cat=usr&op=usr_new_pass&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'pass_ok' 					: echo '<p>Пароль изменен!</p><p><a href="index.php?cat=usr&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
				
				
				
				case 'edit' 		: echo '<p>Запись отредактирована!</p><p><a href="index.php?cat=prj&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'new' 			: echo '<p>Проект создан!</p><p><a href="index.php?cat=prj&op=main">Вернуться назад</a></p>'; break;  
				case 'prdel' 		: echo '<p>Запись удалена!</p><p><a href="index.php?cat=prj&op=main">Вернуться назад</a></p>'; break;
				case 'msgdel' 		: echo '<p>Запись удалена!</p><p><a href="index.php?cat=prj&op=show&id='.$id.'">Вернуться назад</a></p>'; break;
				case 'err' 			: echo '<p>Возникла ошибка! Проверьте данные и повторите операцию.</p><p><a href="index.php?cat=prj&op=main">Вернуться назад</a></p>'; break;  
			   
			}  
		}
	echo '</div>';

?>
