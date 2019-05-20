<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	echo'
		<div class="note_yellow">
			<h2>Редактировать контакты пользователя</h2>
		</div>
		<div class="note_white">
			
			<form method="post" action="index.php?cat=usr&op=usr_to_edit_firm&id='.$_GET[id].'" width="400px"> 
			<p></p>';
	
		$id = $_GET[id];
		if ($id >0){
			$sql = mysql_query("SELECT * FROM user_to_firm WHERE id =".$id.""); 
			while($data = mysql_fetch_array($sql)){
				
			$user = $data['user_id'];
			$username=GetUserName($user);	
			$firm = $data['firm_id'];
			$firmname=GetFirmName($firm);
			$tel = $data['tel'];
			$email = $data['email'];
			$comment = $data['comment'];
			
			}
		}
					 
			$user_name = GetUserName($id);
			echo '<table border="0" style="border-collapse: collapse; width: 100%;"bgcolor="#fff">
			<tbody>
			<tr>';

		
			echo'<td style="width: 50%; padding:10px;">
			Пользователь:</br> 
			<input type="text" name="user_name" size="30" disabled="disabled" value="'.$username.'" >
			<input type="hidden" name="user_id" size="30" value="'.$user.'" >';
			
			
			# фирма заказчик (подбор)
			#hidden
				print'</td><td style="width: 50%; padding:10px;">

				<input type="text" name="referal" size="30" placeholder="Предприятие"  class="who"  autocomplete="off" value="'.$firmname.'">
				<input type="hidden" name="id_value" value="'.$firm.'" />
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
				<p>Телефон : <input type="text" size="20" name="tel" value="'.$tel.'"></p>
				<p>E-mail : <input type="text" size="20" name="email" value="'.$email.'"></p>
				
							
				</td>';

			
			#Комментарий
			echo'<td style="width: auto; padding:10px;">Комментарий: <textarea cols="40" rows="5" name="comment">'.$comment.'</textarea></td>
			';
		

				print'';	

			echo'

			</tr>
			<tr>
			<td style="width: 50%; padding:10px;"><a style="color:#f00;" href="index.php?cat=usr&op=usr_to_del_firm&id='.$id.'&user='.$user.'">Удалить</a></td>
			<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Сохранить"></td>
			</tr>
			</tbody>
			</table>
			</form>
</div>';
			
			

}
else {echo 'Вы не авторизованы!';}
?>
