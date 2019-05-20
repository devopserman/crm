<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
		$user = $_GET[user];
		$pr_id = $_GET[id];
		$user_name = GetUserName($user);
		$pr_name = mysql_result(mysql_query('SELECT pr_name FROM projects WHERE pr_id='.$pr_id.' LIMIT 1'),0);
	echo'

		<div class="note_yellow">
			<h2>Редактировать запись пользователя</h2>
		</div>
		<div class="note_white">
			<form method="post" action="index.php?cat=usr&op=show&id='.$user.'" width="400px"> 
			';
	
		$id = $_GET[id];
		if ($id >0){
			$sql = mysql_query("SELECT * FROM user_to_project WHERE project_id =".$id.""); 
			while($data = mysql_fetch_array($sql)){
				
			$user = $data['user_id'];
			$username=GetUserName($user);	
			$pr_id = $data['pr_id'];
			$firmname=GetFirmName($firm);	

			}
		}
			 
			$user_name = GetUserName($_GET['user']);
			echo '<table border="0" style="border-collapse: collapse; width: 100%;"bgcolor="#fff">
			<tbody>
			<tr>';

		
			echo'<td style="width: 100%; padding:10px;">
				<p>Пользователь:</br> <input type="text" size="30" name="user_name" disabled="disabled" value="'.$user_name.'"></p>
				<p>Проект:</br> <input type="text" size="30" name="user_name2" disabled="disabled" value="'.$pr_name.'"></p>
			
			';
			
			
			
			# фирма заказчик (подбор)
			#hidden
				print'</td></tr></td>
			<tr>
			';
			# телефон, email
				$query = "SELECT * FROM users WHERE user_role>=1 ORDER BY username";
				$result = mysql_query($query) or die(mysql_error());

			echo'

			</tr>
			<tr>
			<td style="width: 50%; padding:10px;"><a style="color:#f00;" href="index.php?cat=usr&op=usr_to_del_prj&id='.$id.'&user='.$user.'">Удалить</a></td>
			<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Назад"></td>
			</tr>
			</tbody>
			</table>
			</form>
</div>';
			
			

}
else {echo 'Вы не авторизованы!';}
?>
