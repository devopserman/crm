<?php
#session_start();
#projects		
		
		
		$id = $_GET['id'];
		$userrole  = GetUserRole($UserID);
		$userrole2 = GetUserRole($id);
		
#ЕСЛИ авторизован
if((USER_LOGGED) 
	#AND ($userrole >= $userrole2)
	) 
	{
	

	echo '

		<div class="note_yellow">
			<h2>Редактировать информацию о контакте</h2>
		</div>
		<div class="note_white">
			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>
			<td style="width: 8.90869%;"><img src="/images/user-avatar.png" width="40px"/></td>
			<form method="post" action="index.php?cat=usr&op=user_to_edit&id='.$id.'" width="400px"> ';
			
			# Название
			$query = "SELECT * FROM users WHERE uid=".$id;
				$result = mysql_query($query) or die(mysql_error());
				while ($row = mysql_fetch_array($result)) { echo '<td style="width: 91.0913%;">Имя пользователя:</br> <input '.$important_style.' type="text" size="50" name="user_name" value="'.$row[username].'"></td>'; 
				$user_dob = $row[user_dob];
				$user_datereg = date('Y-m-d H:i:s');
				$user_mobtelno = $row[user_mobtelno];
				$user_email = $row[user_email];
				$user_comment = $row[user_comment];
				$edit_author = $UserID;
				$edit_datetime = date('Y-m-d H:i:s');
				
				
				echo'</td>';			
			echo'
			</tr>
			</tbody>
			</table>';
# пароль если карточка самого юзера
			
			if ($UserID == $id) {

						echo '<p align="right" class="button_blue"><a href="index.php?cat=usr&op=usr_new_pass&id='.$_GET['id'].'" >Изменить пароль</a></p>';
			}
				


			echo'<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
				<tbody>
					';
					$size1 = 'width: 1%;';
					#$size2 = 'width: 100%;';
						#Дата рождения пользователя
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;">Дата рождения:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><input type="date" size="10" name="user_dob" value="'.$user_dob.'"></td>';
						echo '</tr>';
						#Мобильный телефон
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;">Мобильный телефон:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><input type="text" size="30" name="user_mobtelno" value="'.$user_mobtelno.'"></td>';
						echo '</tr>';
						#Email
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;">E-mail:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><input type="text" size="30" name="user_email" value="'.$user_email.'"></td>';
						echo '</tr>';
						#Comment
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;" valign="top">Комментарий:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><textarea cols="40" rows="5" name="user_comment">'.$user_comment.'</textarea></td>';
						echo '</tr>';
						
						
	

					echo'

					</tr>
					<tr>
						<td style="width: 50%; padding:10px;"><a style="color:#f00;" href="index.php?cat=usr&op=usr_to_del&id='.$row[uid].'">Удалить</a></td>
						<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Сохранить"></td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>';

		}
				mysql_free_result($result);
}
else {echo 'Вы не авторизованы!';}
?>
