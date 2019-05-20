<?php
session_start();
#projects


#ЕСЛИ авторизован	
if(USER_LOGGED) {

$op = $_GET['op']; 
$id = $_GET['id'];

switch ($op) 
{  
	# Добавление нового сообщения
	case 'newreport' :
			$datetime = date('Y-m-d H:i:s');
			$author = $UserID;
			#$page = htmlspecialchars($_POST[reppage], ENT_COMPAT, 'windows-1251');
			$page = htmlspecialchars($_POST[reppage]);
			$mess = htmlspecialchars($_POST[report_mess], ENT_COMPAT, 'windows-1251');

			if ($mess<>'')
			{
				#mysql_select_db($dbname, $link);	
				
				
				$sql = 'INSERT INTO reports (datetime,author, page, message) 
				VALUES("'.$datetime.'", "'.$author.'", "'.$page.'", "'.$mess.'")';
				 if(!mysql_query($sql))
					{$m = 'err';} 
						else
						{$m = 'repadd';
					}
				}
				else { echo '<font color="red">Поле "Сообщение" должно быть заполнено!</font>';	}
				mysql_query($query, $link);
				mysql_close($link);
			break;

	case 'confirm' :
			if ($id>1)
			{		
				$confirm_sql = "UPDATE reports SET result='0' WHERE id=".$id;
				mysql_query($confirm_sql) or die("Ошибка вставки" . mysql_error());
				$m='confirm';
			}
			break;
			
	case 'noconfirm' :
			if ($id>1)
			{		
				$confirm_sql = "UPDATE reports SET result='1' WHERE id=".$id;
				mysql_query($confirm_sql) or die("Ошибка вставки" . mysql_error());
				$m='noconfirm';
			}
			break;
}


	echo '<div class="block1">';
		switch ($m)  
			{  
				case 'repadd' 		: echo '<p>Спасибо! Ваше сообщение отправлено.</p><p><a href="'.$page.'">Вернуться назад</a></p>'; break;  
				case 'confirm' 		: echo '<p>Удалено.</p><p><a href="index.php?cat=rep">Вернуться назад</a></p>'; break; 
				case 'noconfirm' 		: echo '<p>Возвращено на доработку.</p><p><a href="index.php?cat=rep">Вернуться назад</a></p>'; break; 
				
				case 'err' 			: echo '<p>Возникла ошибка! Проверьте данные и повторите операцию.</p><p><a href="'.$page.'">Вернуться назад</a></p>'; break;  
			   
			}  
		
	echo '</div>';
}
?>
