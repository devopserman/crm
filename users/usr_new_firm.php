<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	echo'

		<div class="note_yellow">
			<h2>Добавить контакт к предприятию</h2>
		</div>
		<div class="note_white">
			<form method="post" action="index.php?cat=usr&op=usr_to_new_firm&id='.$_GET[id].'" width="400px"> 
			';
	
	   
			   
			$user_name = GetUserName($_GET['id']);
			echo '<table border="0" style="border-collapse: collapse; width: 100%;"bgcolor="#fff">
			<tbody>
			<tr>';

		
			echo'<td style="width: 50%; padding:10px;">
			Пользователь:</br> <input type="text" size="30" name="user_name" disabled="disabled" value="'.$user_name.'">';
			# фирма заказчик (подбор)
			#hidden
				print'</td><td style="width: 50%; padding:10px;">
				<input type="text" name="referal" placeholder="Предприятие"  class="who"  autocomplete="off">
				<input type="hidden" name="id_value" />
				<ul class="search_result"></ul>';

			
			# фирма исполнитель
				$query = "SELECT firm_id, firm_name FROM firms WHERE my_firm='1' ORDER BY firm_name";
				$result = mysql_query($query) or die(mysql_error());
									

			echo '</tr></td>
			<tr>
			';
			# телефон, email
				$query = "SELECT * FROM users WHERE user_role>=1 ORDER BY username";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;" align="right">
				<p>Телефон : <input type="text" size="20" name="tel"></p>
				<p>E-mail : <input type="text" size="20" name="email"></p>
				
							
				</td>';

			
			#Комментарий
			echo'<td style="width: auto; padding:10px;">Комментарий: <textarea cols="40" rows="5" name="pr_comment">'.$pr_comment.'</textarea></td>
			';
		

				print'';	

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
else {echo 'Вы не авторизованы!';}
?>
