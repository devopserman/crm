<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	echo'

		<div class="note_yellow">
			<h2>Добавить контакт к проекту</h2>
		</div>
		<div class="note_white">
			<form method="post" action="index.php?cat=usr&op=usr_to_new_prj&id='.$_GET[id].'" width="400px"> 
			';
	
	   
			   
			$user_name = GetUserName($_GET['id']);
			echo '<table border="0" style="border-collapse: collapse; width: 100%;"bgcolor="#fff">
			<tbody>
			<tr>';

		
			echo'<td style="width: 50%; padding:10px;">
			Пользователь:</br> <input type="text" size="30" name="user_name" disabled="disabled" value="'.$user_name.'">';
			
# проекты
				$query = "SELECT * FROM projects WHERE pr_status<8 ORDER BY pr_id DESC";
				$result = mysql_query($query) or die(mysql_error());
								
				print '
				<p>Текущие проекты: <SELECT name="pr_commit" ><option value=""></option>';
				#while ($row = mysql_fetch_array($result)) { print '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; }
					while ($row = mysql_fetch_array($result)) { 	
													print '<option value="'.$row[pr_id].'" selected >'.$row[pr_id].'. '.$row[pr_name].'</option>';							
												}
					mysql_free_result($result);
					
				print'</p>
							
				</td>';
									
					
						
			echo '</tr>

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
