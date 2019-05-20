<?php

	#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	echo'		<table border="0" style="border-collapse: collapse; width: 100%; padding:4px;" bgcolor="#eee">
					<tbody>
					<tr>
					<td style="width: 100%;"><h3>Проекты</h3></td>
					
					</tr>
					</tbody>
					</table>
			';		
	
			$id = $_GET['id'];
	# Участие в проектах

			 $qr_result3 = mysql_query("SELECT * FROM projects WHERE pr_firm=".$id." AND pr_active=1 ORDER BY pr_id DESC") or die(mysql_error());	
					
			if ((mysql_num_rows($qr_result3))<>0) {
			echo'<div class="select"><h4>
			
							<table border="0" style="border-collapse: collapse; width: 100%;">
								<tbody>
									<tr>
										<td style="width: 50%">Проект</td>
										<td style="width: 30%;" align="center">Ведущий</td>
										<td style="width: 20%;" align="center">Статус</td>
									</tr>
								</tbody>
							</table>
			</h4></div>';
			
			}
			

			while($data3 = mysql_fetch_array($qr_result3)){ 
			
			$user_project=mysql_fetch_array(mysql_query("SELECT pr_name, pr_status, pr_lid, pr_update FROM projects WHERE pr_id=".$id." LIMIT 1"),0);
				
			
			$pr_status = $data3['pr_status'];
			$pr_update = $data3['pr_update'];
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
	
					
						$pr_lid_label = GetUserName($data3['pr_lid']);
												
					
							echo'<div class="select">
					
							<table border="0" style="border-collapse: collapse; width: 100%;">
								<tbody>
									<tr>
										<td style="width: 50%"><a href="index.php?cat=prj&op=show&id='.$data3['pr_id'].'">'.$data3['pr_name'].'</a></td>
										<td style="width: 30%;" align="center">'.$pr_lid_label.'</td>
										<td style="width: 20%;" align="center">'.$mark_status.'</br></br>'.$pr_update.'</td>
									</tr>
								</tbody>
							</table>
					</div>
				';
			
				}
			}
			
mysql_query($query, $link);

#mysql_close($link);

?>
