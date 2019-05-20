<?php
session_start();
#projects


#ЕСЛИ авторизован	
if(USER_LOGGED) {
$op = $_GET['op'];  


switch ($op) 
{ 
	# Добавление нового сообщения
	case 'messadd' :
			mysql_select_db($dbname, $link);	
			if (isset($_GET['id']) && is_numeric($_GET['id'])){$id = $_GET['id']; } else {$id = $_POST['mess_project'];}
			$mess_text = htmlspecialchars($_POST['mess_text'], ENT_COMPAT, 'windows-1251');
			$mess_datetime = date('Y-m-d H:i:s');

			if ($mess_text<>"") {
			$sql = 'INSERT INTO messages (mess_author,mess_project, mess_text, mess_datetime) 
			VALUES("'.$UserID.'", "'.$id.'", "'.$mess_text.'", "'.$mess_datetime.'")';
			 if(!mysql_query($sql))
 			{$op = 'err';} 
	 			else
	 			{$op = 'messadd';
					$sql2 = "UPDATE projects SET pr_update='$mess_datetime' WHERE pr_id=".$id;
						if(!mysql_query($sql2))
						{} 
							else
							{}
			
			}
			
			}
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
	# Редактирование данных
	case 'predit'	:
			$id=$_GET['id'];
			$pr_name = $_POST[pr_name];
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
			$pr_active = 1;
			$pr_name = htmlspecialchars($_POST[pr_name], ENT_COMPAT, 'windows-1251');
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
					$qr_result = "UPDATE projects SET pr_active='0' WHERE pr_id=".$id;
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
				case 'messadd' 		: echo '<p>Запись добавлена!</p><p><a href="index.php?cat=prj&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'edit' 		: echo '<p>Запись отредактирована!</p><p><a href="index.php?cat=prj&op=show&id='.$id.'">Вернуться назад</a></p>'; break;  
				case 'new' 			: echo '<p>Проект создан!</p><p><a href="index.php?cat=prj&op=main">Вернуться назад</a></p>'; break;  
				case 'prdel' 		: echo '<p>Запись удалена!</p><p><a href="index.php?cat=prj&op=main">Вернуться назад</a></p>'; break;
				case 'msgdel' 		: echo '<p>Запись удалена!</p><p><a href="index.php?cat=prj&op=show&id='.$id.'">Вернуться назад</a></p>'; break;
				case 'err' 			: echo '<p>Возникла ошибка! Проверьте данные и повторите операцию.</p><p><a href="index.php?cat=prj&op=main">Вернуться назад</a></p>'; break;  
			   
			}  
		}
	echo '</div>';

?>
