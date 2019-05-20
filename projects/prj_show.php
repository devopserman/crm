<?php
#projects		
		
#ЕСЛИ авторизован
if(USER_LOGGED) {
	$id = $_GET['id'];
	
	echo'

<div>
			<table border="0" style="border-collapse: collapse; width: 100%;">
			<tbody>
			<tr>
			<td style="width: 10%;"><img src="/images/projects_folder.png" width="40px"/></td>';
			
			# Название

			$query = "SELECT * FROM projects WHERE pr_id=".$id;
				$result = mysql_query($query) or die(mysql_error());
				

				while ($row = mysql_fetch_array($result)) { 
				$firm = $row[pr_firm];
				$firm_performer = $row[pr_performer];
				$pr_lid = $row[pr_lid];			
				$pr_date_reg = GetDateFormat_dmY($row[pr_date_reg]);
				
				$pr_date_limit = GetDateFormat_dmY($row[pr_date_limit]);
				$pr_date_finish = GetDateFormat_dmY($row[pr_date_finish]);
				$pr_date_cost = GetDateFormat_dmY($row[pr_date_cost]);
				$pr_date_acts = GetDateFormat_dmY($row[pr_date_acts]);
				$pr_date_get_acts = GetDateFormat_dmY($row[pr_date_get_acts]);
				
				
				$pr_status = $row[pr_status];
				$pr_comment = $row[pr_comment];
				$pr_update = GetDateFormat_dmY_Hi($row[pr_update]);
				
				# Помечаем, если я ответственный за этот проект
				if ($UserID == $row['pr_lid'])	{
				$mark = '<img src="images/star_icon.png" width="12px" alt="Мой проект"/>';	} else 	{$mark='';}
				
				print '<td style="width: 70%;"><h2> '.$id.' '.$row[pr_name].' '.$mark.'</h2></td>'; 
				}
				mysql_free_result($result);
				print'</td>';			
			echo'<td width="20%"><p class="mess_date" align="right"  >Обновлено:</br>'.$pr_update.'</p></td>
			</tr>
			</tbody>
			</table>';
	   
			   

			echo '<table border="0" style="border-collapse: collapse; width: 100%;">
			<tbody>
			<tr>';

			# фирма заказчик
				$query = "SELECT firm_id, firm_name FROM firms  ORDER BY firm_name";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: auto; padding:10px;">Фирма заказчик: ';
					while ($row = mysql_fetch_array($result)) { 	
								if ($firm == $row['firm_id']){
												print '<h2><a href="/index.php?cat=frm&op=show&id='.$firm.'">'.$row[firm_name].'</a></h2>';
										}
										else{}
												}
					mysql_free_result($result);
				print'</td>';

			echo '</tr></tbody>
			</table>
			<table border="0" style="border-collapse: collapse; width: 100%;">
			<tbody>
			<tr>';
			# фирма исполнитель
				$query = "SELECT firm_id, firm_name FROM firms ORDER BY firm_name";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;">Фирма исполнитель: ';
					while ($row = mysql_fetch_array($result)) { 	
								if ($firm_performer == $row['firm_id']){
												print '<b><a href="/index.php?cat=frm&op=show&id='.$firm_performer.'">'.$row[firm_name].'</a></b>';
										}
										else{}
												}
					mysql_free_result($result);
				print'</td>';	

			
			# ответственный
				$query = "SELECT uid, username FROM users WHERE user_role>=1 ORDER BY username";
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;">Ведущий проекта: ';
					while ($row = mysql_fetch_array($result)) { 	
								if ($pr_lid == $row['uid']){
									
												print '<b><a href="index.php?cat=usr&op=show&id='.$pr_lid.'">'.$row[username].'</a></b>';							
										}
										else{}
												}
					mysql_free_result($result);
				print'</td>';	
			
			echo '
			</tr>
			</tbody>
			</table>
			<table border="0" style="border-collapse: collapse; width: 100%;">
			<tbody>
			<tr>';
			
			
			
			#Дата регистрации проекта
			echo'<td style="width: 50%; padding:10px;">Дата регистрации проекта: <b>'.$pr_date_reg.'</b></td>';
			
			#Дата полного расчета
			echo'<td style="width: 50%; padding:10px;">Дата полного расчета: <b>'.$pr_date_cost.'</b></td>


			</tr>
			<tr>';
			
			#Срок завершения
			echo'<td style="width: 50%; padding:10px;">Срок завершения: <b>'.$pr_date_limit.'</b></td>';
			#Дата полнипания акта
			echo'<td style="width: 50%; padding:10px;">Дата подписания акта: <b>'.$pr_date_acts.'</b></td>
			</tr>
			<tr>';
			#Дата завершения
			echo'<td style="width: 50%; padding:10px;">Дата завершения: <b>'.$pr_date_finish.'</b></td>';
			#Дата получения акта
			echo'<td style="width: 50%; padding:10px;">Дата получения акта: <b>'.$pr_date_get_acts.'</b></td>';
						
			echo'</tr>
			<tr>';
			
			echo'<td style="width: 50%; padding:10px;"></td>';
			
			
			# Статус проекта
			
			if (!empty($pr_status)) 
				{$msearch = "WHERE id=".$pr_status;}
				else {$msearch="WHERE id=1";}
				$query = "SELECT * FROM project_status ".$msearch;
				$result = mysql_query($query) or die(mysql_error());
								
				print '<td style="width: 50%; padding:10px;">Статус проекта: ';
					while ($row = mysql_fetch_array($result)) { 
						$status_value = $row['value'];

								$background_color = mysql_result(mysql_query("SELECT background_color FROM project_status WHERE id=".$pr_status." LIMIT 1"),0);
								$color = mysql_result(mysql_query("SELECT color FROM project_status WHERE id=".$pr_status." LIMIT 1"),0);
								$mark_status = '<span style="background-color:'.$background_color.'; color:'.$color.'; padding:4px; ">'.$status_value.'</span>';
						
								echo $mark_status;
								
												}
					mysql_free_result($result);
				print '</td>';	

			echo'

			</tr>
			<tr>
			
			</tr>
			</tbody>
			</table>
			
</div>';

#Комментарий
			if (!empty($pr_comment)){
			#echo'Комментарий: <div class="pr_comment"><h3>'.$pr_comment.'</h3></div>';
			echo'Комментарий: <div class="pr_comment"><h4>'.nl2br($pr_comment).'</h4></div>';
			}
			else {
				echo'Комментарий: (пусто)';
			}
#echo '<div align="right"><p><a href="index.php?cat=prj&op=edit&id='.$id.'">Редактировать</a></p>
echo '<div><p align="right" class="button_blue"><a href="index.php?cat=prj&op=edit&id='.$id.'">Редактировать</a></p></div>';


}
else {echo 'Вы не авторизованы!';}
?>
