<?php
		
#ЕСЛИ авторизован
if((USER_LOGGED) AND ($userrole >= $userrole2)) {
	

	echo '

		<div class="note_yellow">
			<h2>Добавить новый контакт</h2>
		</div>
		<div class="note_white">	

			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>
			<td style="width: 8.90869%;"><img src="/images/user-avatar.png" width="40px"/></td>
			<form method="post" action="index.php?cat=usr&op=user_to_add" width="400px">';
						
				echo '<td style="width: 91.0913%;">Имя пользователя:</br> <input '.$important_style.' type="text" size="50" name="user_name" value=""></td>';
				echo'</td>';			
			echo'
			</tr>
			</tbody>
			</table>';


			echo'<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
				<tbody>
					';
					$size1 = 'width: 1%;';
					#$size2 = 'width: 100%;';
						#Дата рождения пользователя
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;">Дата рождения:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><input type="date" size="10" name="user_dob" ></td>';
						echo '</tr>';
						#Мобильный телефон
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;">Мобильный телефон:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><input type="text" size="30" name="user_mobtelno" ></td>';
						echo '</tr>';
						#Email
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;">E-mail:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><input type="text" size="30" name="user_email" ></td>';
						echo '</tr>';
						#Comment
						echo '<tr>';
						echo'<td align="right" style="'.$size1.' padding:10px;" valign="top">Комментарий:</td>';
						echo'<td align="left"  style="'.$size2.' padding:10px;"><textarea cols="40" rows="5" name="user_comment"></textarea></td>';
						echo '</tr>';
						
						
	

					echo'

					</tr>
					<tr>
						<td style="width: 50%; padding:10px;"></td>
						<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Добавить"></td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>';

		
				
}
else {echo 'Вы не авторизованы!';}
?>
