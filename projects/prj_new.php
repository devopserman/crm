<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	echo'

<div style="background-color:#3f6; padding:4px;">


			<h2>Регистрация нового проекта</h2>
			<form method="post" action="index.php?cat=prj&op=prnew" width="400px"> 
			<p></p>
			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>
			<td style="width: 8.90869%;"><img src="/images/projects_folder.png" width="40px"/></td>';
			
			# Название
				print '<td style="width: 91.0913%;">Проект:</br> <input '.$important_style.' type="text" size="50" name="pr_name"></td>'; 
				
				print'</td>';			
			echo'
			</tr>
			</tbody>
			</table>';
	   
			   

			echo '<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>';

		# фирма заказчик (подбор)
		#hidden
			echo'<td style="width: 50%; padding:10px;">
			
			<input type="text" name="referal" placeholder="Фирма заказчик"  class="who"  autocomplete="off">
			<input type="hidden" name="id_value" />
			<ul class="search_result"></ul>
			<p></p>';
				print'</td>';


			# фирма исполнитель
				$query = "SELECT firm_id, firm_name FROM firms WHERE my_firm='1' ORDER BY firm_name";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;">Фирма исполнитель: </br> <SELECT name="pr_performer" ><option value=""></option>';
					while ($row = mysql_fetch_array($result)) { 	
								if ($firm_performer == $row['firm_id']){
												print '<option value="'.$firm_performer.'" selected >'.$row[firm_name].'</option>';							
										}
										else{
												print '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; 
												}
												}
					mysql_free_result($result);
				print'</td>';	
				
	

			echo '</tr>
			<tr>
			<!--<td style="width: 50%; padding:10px;">Срок завершения: <input type="date" size="10" name="pr_date_limit" value="'.$pr_date_limit.'"></td>-->

			';
			# ответственный
				$query = "SELECT * FROM users WHERE user_role>=1 ORDER BY username";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;"><p>Срок завершения: <input type="date" size="10" name="pr_date_limit" value="'.$pr_date_limit.'"></p><p>Ведущий проекта: <SELECT name="pr_lid" ><option value=""></option>';
				#while ($row = mysql_fetch_array($result)) { print '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; }
					while ($row = mysql_fetch_array($result)) { 	
								if ($pr_lid == $row['uid']){
												print '<option value="'.$pr_lid.'" selected >'.$row[username].'</option>';							
										}
										else{
												print '<option value="'.$row[uid].'">'.$row[username].'</option>'; 
												}
												}
					mysql_free_result($result);
				print'</p>
							
				</td>';

			
		
			#Комментарий
			echo'<td style="width: auto; padding:10px;">Комментарий: <textarea cols="40" rows="5" name="pr_comment">'.$pr_comment.'</textarea></td>
			';
	
				echo'';	

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
