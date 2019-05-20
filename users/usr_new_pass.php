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
	$query = "SELECT * FROM users WHERE uid=".$id;
				$result = mysql_query($query) or die(mysql_error());
			while ($row = mysql_fetch_array($result)) 
			{  
				$user_dob = $row[user_dob];
				$user_datereg = date('Y-m-d H:i:s');
				$user_mobtelno = $row[user_mobtelno];
				$user_email = $row[user_email];
				$user_comment = $row[user_comment];
				$edit_author = $UserID;
				$edit_datetime = date('Y-m-d H:i:s');
				

			echo '

			<div class="note_yellow">
				<h2>Изменить свой пароль</h2>
			</div>
			<div class="note_white">
				<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
				<tbody>
				<tr>
				<td style="width: 8.90869%;"></td>
				<form method="post" action="index.php?cat=usr&op=usr_to_new_pass&id='.$id.'" width="400px"> ';
				
			# Название
			
				
				echo'</td>';			
			echo'
			</tr>
			</tbody>
			</table>';
# пароль если карточка самого юзера
			
			if ($UserID == $id) {
				
				echo '<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
				<tbody>
					';
						#Дата рождения пользователя
						echo '';
						echo'<td align="right" style="width:50%; padding:10px;">Текущий пароль:</td>';
						echo'<td align="left"  style="width:50%; padding:10px;"><input '.$important_style.' type="text" size="15" name="user_pass1" ></td>';
						echo '</tr>';
						echo '<tr>';
						echo'<td align="right" style="width:50%; padding:10px;">Новый пароль:</td>';
						echo'<td align="left"  style="width:50%; padding:10px;"><input '.$important_style.' type="text" size="15" name="user_pass2" ></td>';
						echo '</tr>';

						echo '<tr>';
						echo'<td align="right" style="width:50%; padding:10px;">Повторите пароль:</td>';
						echo'<td align="left"  style="width:50%; padding:10px;"><input '.$important_style.' type="text" size="15" name="user_pass3" ></td>';
						echo '</tr>';
						
						
					echo'

					</tr>

			
					<tr>
						<td style="width: 50%; padding:10px;"></td>
						<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Сохранить"></td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>';
			}
		}
				mysql_free_result($result);
}
else {echo 'Вы не авторизованы!';}
?>
