<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
	$id = $_GET['id'];
	

	echo'

<div style="background-color:#dd0; padding:4px;">


			<h2>Редактировать информацию о проекте</h2>
			<form method="post" action="index.php?cat=prj&op=predit&id='.$id.'" width="400px"> 
			<p></p>
			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>
			<td style="width: 8.90869%;"><img src="/images/projects_folder.png" width="40px"/></td>';
			
			# Название
			$query = "SELECT * FROM projects WHERE pr_id=".$id;
				$result = mysql_query($query) or die(mysql_error());
				while ($row = mysql_fetch_array($result)) { print '<td style="width: 91.0913%;">Проект ('.$id.'):</br> <input '.$important_style.' type="text" size="50" name="pr_name" value="'.$row[pr_name].'"></td>'; 
				$firm = $row[pr_firm];
				$firm_performer = $row[pr_performer];
				$pr_lid = $row[pr_lid];
				$pr_date_reg = $row[pr_date_reg];
				$pr_date_limit = $row[pr_date_limit];
				$pr_date_finish = $row[pr_date_finish];
				$pr_date_cost = $row[pr_date_cost];
				$pr_date_acts = $row[pr_date_acts];
				$pr_date_get_acts = $row[pr_date_get_acts];
				$pr_status = $row[pr_status];
				$pr_comment = $row[pr_comment];
				$pr_update = $row[pr_update];
				}
				mysql_free_result($result);
				print'</td>';			
			echo'
			</tr>
			</tbody>
			</table>';
	   
			   

			echo '<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>';

			# фирма заказчик, живой поиск
				if ($firm>0){
				$pr_firm=GetFirmName($firm);}
				else{$pr_firm='';}

				print '<td valign="top" style="width: 50%; padding:10px;">Фирма заказчик:</br>
				
				<input type="text" name="referal" placeholder="Заказчик"  class="who"  autocomplete="off" value="'.($pr_firm).'">
				<input type="hidden" name="id_value" value="'.$firm.'" />
				<ul class="search_result"></ul>
				<p></p>';

				print'</td>';


			# фирма исполнитель
				$query = "SELECT * FROM firms  WHERE my_firm='1' ORDER BY firm_name";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td valign="top" style="width: 50%; padding:10px;">Фирма исполнитель: </br><SELECT name="pr_performer" ><option value=""></option>';
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
			<td style="width: 50%; padding:10px;"></td>';

			
			# ответственный
				$query = "SELECT * FROM users WHERE user_role>=1 ORDER BY username";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;">Ведущий проекта: <SELECT name="pr_lid" ><option value=""></option>';
					while ($row = mysql_fetch_array($result)) { 	
								if ($pr_lid == $row['uid']){
												print '<option value="'.$pr_lid.'" selected >'.$row[username].'</option>';							
										}
										else{
												print '<option value="'.$row[uid].'">'.$row[username].'</option>'; 
												}
												}
					mysql_free_result($result);
				print'</td>';	
			
			echo '
			</tr>
			</tbody>
			</table>
			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>';
			
			
			
			#Дата регистрации проекта
			echo'<td style="width: 50%; padding:10px;">Дата регистрации проекта: <input type="date" size="10" name="pr_date_reg" value="'.$pr_date_reg.'"></td>';
			
			#Дата полного расчета
			echo'<td style="width: 50%; padding:10px;">Дата полного расчета: <input type="date" size="10" name="pr_date_cost" value="'.$pr_date_cost.'"></td>


			</tr>
			<tr>';
			
			#Срок завершения
			echo'<td style="width: 50%; padding:10px;">Срок завершения: <input type="date" size="10" name="pr_date_limit" value="'.$pr_date_limit.'"></td>';
			#Дата полнипания акта
			echo'<td style="width: 50%; padding:10px;">Дата подписания акта: <input type="date" size="10" name="pr_date_acts" value="'.$pr_date_acts.'"></td>
			</tr>
			<tr>';
			#Дата завершения
			echo'<td style="width: 50%; padding:10px;">Дата завершения: <input type="date" size="10" name="pr_date_finish" value="'.$pr_date_finish.'"></td>';
			#Дата получения акта
			echo'<td style="width: 50%; padding:10px;">Дата получения акта: <input type="date" size="10" name="pr_date_get_acts" value="'.$pr_date_get_acts.'"></td>
			</tr>
			<tr>';
			#Комментарий
			echo'<td style="width: 50%; padding:10px;">Комментарий: <textarea cols="40" rows="5" name="pr_comment">'.$pr_comment.'</textarea></td>
			';

			# Статус проекта
				$query = "SELECT * FROM project_status ORDER BY id";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;">Статус проекта: <SELECT name="pr_status" ><option value=""></option>';
					while ($row = mysql_fetch_array($result)) { 	
								if ($pr_status == $row['id']){
												print '<option value="'.$pr_status.'" selected >'.$row[value].'</option>';							
										}
										else{
												print '<option value="'.$row[id].'">'.$row[value].'</option>'; 
												}
												}
					mysql_free_result($result);
				print'</td>';	

			echo'

			</tr>
			<tr>
			<td style="width: 50%; padding:10px;">
				<!-- Удаляем только изменением статуса -->
				<!--<a style="color:#f00;" href="index.php?cat=prj&op=prdel&id='.$id.'">Удалить</a> -->
			</td>
			<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Сохранить"></td>
			</tr>
			</tbody>
			</table>
			</form>
</div>';


}
else {echo 'Вы не авторизованы!';}
?>
