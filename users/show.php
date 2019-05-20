<?php
	
if (isset($_GET['id']) && is_numeric($_GET['id'])){
   $sql = mysql_query("SELECT * FROM users WHERE uid =".$_GET['id']."  LIMIT 1");
  
#$sql = "SELECT u.*, f.firm_name FROM users u LEFT JOIN firms f ON f.firm_id = u.user_firm WHERE u.uid =".$_GET['id'];

$result = $sql;

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
 	
	
	
while ($row = mysql_fetch_assoc($result)) {
	
	if ($row['user_role']>1)
			{
			$myuser = '<img src="images/star_icon.png" width="12px"/>';	
			}else{$myuser='';}
	
	
	echo'
				<table border="0" style="border-collapse: collapse; width: 100%;">
				<tbody>
				<tr>
				<td align="center" style="width: 200px;"><img src="images/user-avatar.png" width="150px"/></td>
				<td valign="top">
				<table border="0" style="border-collapse: collapse; width: 100%;">
				<tbody>
				<tr>
				<td style="width: 100%;">';
					echo "<h1>".$row['username']." ".$myuser."</h1>";
					echo'</td>
				</tr>
				<tr>
				<td style="width: 100%;">
				<p>';
				echo "Дата регистрации: <b>".GetDateFormat_dmY($row[user_date_add]). "</b></p>";
				echo'<p>';
				if (($row[user_dob])>0){
				$dob=GetDateFormat_dmY($row[user_dob]);}
				else {$dob='';}
				
				if (($dob>1)) 
				{
					$age = " (".calculate_age($dob).")";
				}
				else 
				{
					$age = "";
				}
				
			
				echo "День рождения: <b>".$dob. "</b>".$age;
				echo'</p>
				</td>
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				</tbody>
				</table>
	';
					echo'<div class="note_white">
						<table border="0" style="border-collapse: collapse; width: 100%;">
						<tbody>
							<tr>
								<td style="width: 100%;" valign="top">';
								#tolno, email
								echo "<p>Мобильный телефон: <b>".$row["user_mobtelno"]. "</b></p>";
								echo "<p>E-mail: <b>".$row["user_email"]. "</b></p>";

								#comment
								if ($row[user_comment]==''){$comm='';}else
									{$comm='<p><div class="note_yellow"><b>'.nl2br($row[user_comment]).'</b></div></p>';}
								
								echo $comm;
								echo'</td>
							</tr>
						</tbody>
					</table>
					
					
					<p  class="button_blue"><a href="index.php?cat=usr&op=edit&id='.$_GET['id'].'" >Редактировать</a></p>
					</div>';
	

	
	$qr_result2 = mysql_query("SELECT * FROM user_to_firm	WHERE active=1 AND user_id=".$_GET['id']) or die(mysql_error());
			
			
			$i2=1;
			echo'
			';
			
			echo'		<table border="0" style="border-collapse: collapse; width: 100%; padding:4px;" bgcolor="#eee">
					<tbody>
					<tr>
					<td style="width: 50%;"><h3>Связь с предприятиями</h3></td>
					<td style="width: 50%;"><p align="right" class="button_blue"><a href="index.php?cat=usr&op=usr_new_firm&id='.$_GET['id'].'" >+ предприятие</a></p>	</td>
					</tr>
					</tbody>
					</table>
			';		
			
			
			while($data2 = mysql_fetch_array($qr_result2)){ 
			
			$frm_id = $data2[id];
			
			if ($data2['firm_id']>0)
				{$user_firm2=GetFirmName($data2['firm_id']);}
				else {$user_firm2="";}	
			
			
			
			if (($data2['comment'])!='') 
			{
				$user_comment2 = '<span style="padding:1px; background-color:#eee;">'.$data2['comment'].'</span>';
			}else
			{
				$user_comment2='';
			}
			
			
			# фирмы юзера и контакты в фирме
			
			echo'
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
							<td style="width: 25%;"><p class="sub_content"> <a href="index.php?cat=frm&op=show&id='.$data2['firm_id'].'">'.$user_firm2.'</a></p></td>
							<td style="width: 20%;">'.$data2['tel'].'</td>
							<td style="width: 25%;">'.$data2['email'].'</td>
							<td style="width: 29%;">'.$user_comment2.'</td>
							<td style="width: 1%;"><span class="button_blue"><a href="index.php?cat=usr&op=usr_edit_firm&id='.$frm_id.'">></a></span></td>';							
							echo'</tr>
							</tbody>
							</table>
			
			';
			
			}

	
		# Участие в проектах
		
		
			
			
			if ($row['user_role']>1)
			{
				# для своих контактов
				$qr_result3 = mysql_query("SELECT * FROM projects WHERE pr_lid=".$_GET['id']." ORDER BY pr_update DESC") or die(mysql_error());
				$s1='<h3>Проекты пользователя</h3>';
				$s2='';

			}
			else
				# для чужих контактов
			{
				 $qr_result3 = mysql_query("SELECT * FROM user_to_project WHERE user_id=".$_GET['id']." AND active=1 ORDER BY id DESC") or die(mysql_error());	
				 $s1='<h3>Участие в проектах</h3>';
				 $s2='<p align="right" class="button_blue"><a href="index.php?cat=usr&op=usr_new_prj&id='.$_GET['id'].'" >+ проект</a></p>';
			}
			

			echo'<p></p><p></p>	<table border="0" style="border-collapse: collapse; width: 100%; padding:4px; " bgcolor="#eee">
					<tbody>
					<tr>
					<td style="width: 50%;">'.$s1.'</td>
					<td style="width: 50%;">'.$s2.'</td>
					</tr>
					</tbody>
					</table>
			';		
						
			if ((mysql_num_rows($qr_result3))<>0) 
			
			{
			echo'<div class="select"><h4>
			
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
							<td style="width: 40%">Проект</td>
							<td style="width: 29%;" align="center">Ведущий</td>
							<td style="width: 20%;" align="center">Статус</td>
							
							<td style="width: 10%;" align="center">Обновлено</td>
							
							</tr>
							</tbody>
							</table>
			</h4></div>';
			
			}
			
			# для чужих контактов
			if (($row['user_role']<=1))
			{
			while($data3 = mysql_fetch_array($qr_result3)){ 
			
			if ($data3['project_id']>0)
				{$user_project=mysql_fetch_array(mysql_query("SELECT pr_name, pr_firm, pr_status, pr_lid, pr_update FROM projects WHERE pr_id=".$data3['project_id']." LIMIT 1"),0);}
				else {$user_project="";}	
			
			$pr_status = $user_project['pr_status'];
			$pr_update = $user_project['pr_update'];
						# Статус проекта
			
						if (!empty($pr_status)) 
							{$msearch = "WHERE id=".$pr_status;}
							else {$msearch="WHERE id=1";}
							$query = "SELECT * FROM project_status ".$msearch;
							$result = mysql_query($query) or die(mysql_error());
											
							
								while ($row = mysql_fetch_array($result)) { 
									$status_value = $row['value'];
									$background_color = mysql_result(mysql_query("SELECT background_color FROM project_status WHERE id=".$pr_status." LIMIT 1"),0);
									$color = mysql_result(mysql_query("SELECT color FROM project_status WHERE id=".$pr_status." LIMIT 1"),0);

									$mark_status = '<span style="background-color:'.$background_color.'; color:'.$color.'; padding:4px; ">'.$status_value.'</span>';
								}
	
					
							$pr_lid = GetUserName($user_project['pr_lid']);
					
							echo'<div class="select">
					
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
							<td style="width: 40%">
								<a href="index.php?cat=prj&op=show&id='.$data3['project_id'].'">'.$user_project['pr_name'].'</a></br>
								<p class="sub_content">'.GetFirmName($user_project[pr_firm]).'</p>
							</td>
							<td style="width: 29%;" align="center">'.$pr_lid.'</td>
							<td style="width: 20%;" align="center">'.$mark_status.'</br></br>'.$pr_update.'</td>
							<td style="width: 1%;" align="center"><span class="button_blue"><a href="index.php?cat=usr&op=usr_edit_prj&id='.$data3['project_id'].'&user='.$_GET[id].'">></a></span></td>
							</tr>
							</tbody>
							</table>
					</div>
				';
			
				}
			}
			
			if ($row['user_role']>1)
			{
			# если юзер = моя мирма
			while($data4 = mysql_fetch_array($qr_result3)){ 
			
			if ($data4['project_id']>0)
				{$user_project=mysql_fetch_array(mysql_query("SELECT pr_id, pr_name, pr_firm, pr_status, pr_lid FROM projects WHERE pr_id=".$data4['project_id']." LIMIT 1"),0);}
				else {$user_project="";}	
			
					$pr_status = $data4['pr_status'];
					$pr_update = GetDateFormat_dmY_Hi($data4['pr_update']);
						# Статус проекта
			
						if (!empty($pr_status)) 
							{$msearch = "WHERE id=".$pr_status;}
							else {$msearch="WHERE id=1";}
							$query = "SELECT * FROM project_status ".$msearch;
							$result = mysql_query($query) or die(mysql_error());
											
							
								while ($row = mysql_fetch_array($result)) { 
									$status_value = $row['value'];
									$background_color = mysql_result(mysql_query("SELECT background_color FROM project_status WHERE id=".$pr_status." LIMIT 1"),0);
									$color = mysql_result(mysql_query("SELECT color FROM project_status WHERE id=".$pr_status." LIMIT 1"),0);
									$mark_status = '<span style="background-color:'.$background_color.'; color:'.$color.'; padding:4px; ">'.$status_value.'</span>';
								}

							$pr_lid = GetUserName($data4['pr_lid']);
							
							echo'<div class="select">
			
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
							<td style="width: 45%">
								<a href="index.php?cat=prj&op=show&id='.$data4['pr_id'].'">'.$data4['pr_name'].'</a>
								</br>
								<p class="sub_content">'.GetFirmName($data4['pr_firm']).'</p>
							
							</td>
							<td style="width: 120px;" align="center">'.$pr_lid.'</td>
							<td style="width: 100px;" align="center">'.$mark_status.'</td>
							<td style="width: 120px;" align="center">'.$pr_update.'</td>
							</tr>
							</tbody>
							</table>
					</div>
					';
			
				}
			}
}

mysql_free_result($result);

}
mysql_query($query, $link);

mysql_close($link);


?>
