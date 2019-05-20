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
			<td style="width: 10%;"><img src="/images/firm.png" width="40px"/></td>';
			
			# Название
			
			$query = "SELECT * FROM firms WHERE firm_id=".$id;
				$result = mysql_query($query) or die(mysql_error());
				
					

				
				while ($row = mysql_fetch_array($result)) { 
				
				$firm_name = $row[firm_name];
				$firm_full_name=$row[firm_full_name];
				$myfirm = $row[my_firm];
				$black_list = $row[black_list];
				
				$firm_datetime_edit = GetDateFormat_dmY_Hi($row[firm_datetime_edit]);
				$firm_datetime_add = GetDateFormat_dmY_Hi($row[firm_datetime_add]);
				
				$firm_inn = $row[firm_inn];
				$firm_kpp = $row[firm_kpp];
				$firm_request = $row[firm_another_request];
				$firm_sphera = $row[firm_sphera];
				$firm_adress = $row[firm_adress];
				$firm_email = $row[firm_email];
				$firm_telno = $row[firm_telno];
				$firm_faxno = $row[firm_faxno];
				$firm_dir = $row[firm_dir];
				$firm_dir_dolgn = $row[firm_dir_dolgn];
				$firm_dir_opt = $row[firm_dir_opt];
				$firm_contacts = $row[firm_contacts];
				$firm_comment = $row[firm_comment];
				
				
				if ($myfirm=='1')
					{$myfirm_label = '<img src="images/star_icon.png" width="12px" alt="Моя фирма"/>';}
				else
					{$myfirm_label = '';}
				
				if ($black_list=='1')
					{$black_list_label = '<img src="images/black_list.jpg" width="16px" alt="В черном списке"/>';}
				else
					{$black_list_label = '';}
				
												
				echo '<td style="width: 70%;"><h2> '.$firm_name.' '.$myfirm_label.' '.$black_list_label.'</h2></td>'; 
				}
				mysql_free_result($result);
				echo'</td>';			
			echo'<td width="20%"><p class="mess_date" align="right"  >Обновлено:</br>'.$firm_datetime_edit.'</p></td>
			</tr>
			</tbody>
			</table>';
	   
		 
			# Полное наименование, инн, кпп, сфера, реквизиты
			echo '
			
			<div class="note_white">
										<p><b>Полное наименование</b>: '.$firm_full_name.'</p>
										<p><b>Телефон</b>:'.$firm_telno.'</p>
										<p><b>E-mail</b>:'.$firm_email.'</p>
										<p><b>Факс</b>:'.$firm_faxno.'</p>
										
			
			<div class="note_yellow" style="height:100%;">
										<p><b>Комментарий</b>:</p>
										<p>'.nl2br($firm_comment).'</p>
			</div>									
									';
			
			?>
					<input class="spoilerbutton" type="button" value="Показать" onclick="this.value=this.value=='Показать'?'Скрыть':'Показать';">
						<div class="spoiler"><div>
				<?php
			
			echo '
									
								<div class="note_white" style="height:100%;">
									<p><b>Другие контакты</b>:</p>
									<p>'.nl2br($firm_contacts).'</p>
								</div>	
								
								<div class="note_white" style="height:100%;">
										<p><b>ИНН</b>: '.$firm_inn.'</p>
										<p><b>КПП</b>: '.$firm_kpp.'</p>
										<p><b>Отрасль</b>: '.$firm_sphera.'</p>
								</div>								
									
									
								<div class="note_white">
									<p><b>Реквизиты:</b></p>
									<p>'.nl2br($firm_request).'</p>
								</div>


								<div class="note_white">
									<p><b>Адрес</b>:</p>
									<p>'.nl2br($firm_adress).'</p>
								</div>		
				
				
								
							
								<div class="note_white" style="height:100%;">
									<p><b>ФИО директора</b>:</br>'.$firm_dir.'</p>
									<p><b>Должность директора</b>:'.$firm_dir_dolgn.'</p>
									<p><b>Действует на основании</b>:'.$firm_dir_opt.'</p>
								</div>
							
								';
								
						echo '
								</div>
							</div>
							</div>
							';
		echo '
		<p align="right" class="button_blue"><a href="index.php?cat=frm&op=frm_edit&id='.$_GET['id'].'" >Редактировать</a></p>
		';
}
else {echo 'Вы не авторизованы!';}
?>
