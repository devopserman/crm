<?php
#session_start();
#projects		
		
		
		$id = $_GET['id'];
		$userrole  = GetUserRole($UserID);

#ЕСЛИ авторизован
if((USER_LOGGED)) {
	
		echo'
		<div class="note_yellow">
			<h2>Редактировать данные фирмы</h2>
		</div>
		<div class="note_white">
			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>
			<td style="width: 100%;"></td>
			<form method="post" action="index.php?cat=frm&op=firm_to_edit&id='.$id.'" width="100%"> 
			
			';
			
			# Название
			
			if ($id > 0)
			{				
				$query = "SELECT * FROM firms WHERE firm_id=".$id;
				$result = mysql_query($query) or die(mysql_error());
				
				while ($row = mysql_fetch_array($result)) { 
				
				$firm_name = $row[firm_name];
				$firm_full_name=$row[firm_full_name];
				$my_firm = $row[my_firm];
				$black_list = $row[black_list];
				$firm_datetime_edit = GetDateFormat_dmY_Hi($row[firm_datetime_edit]);
				$firm_datetime_add = GetDateFormat_dmY_Hi($row[firm_datetime_add]);
				
				$firm_inn = $row[firm_inn];
				$firm_kpp = $row[firm_kpp];
				$firm_another_request = $row[firm_another_request];
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
				
				echo '<tr><td>';
				
				echo '<p>Наименование фирмы:</br> <input '.$important_style.' type="text" size="50" name="firm_name" value="'.$firm_name.'"></p>';
				echo '<p>Полное наименование:</br> <input type="text" size="50" name="firm_full_name" value="'.$firm_full_name.'"></p>';
				echo '<p>ИНН: <input type="text" size="20" name="firm_inn" value="'.$firm_inn.'"></p>';
				echo '<p>КПП: <input type="text" size="20" name="firm_kpp" value="'.$firm_kpp.'"></p>';
				echo '<p>Отрасль: <input type="text" size="50" name="firm_sphera" value="'.$firm_sphera.'"></p>';
				echo '<p>Комментарий: </br><textarea cols="60" rows="5" name="firm_comment">'.$firm_comment.'</textarea></p>';
		
				echo '<p>Реквизиты: </br><textarea cols="60" rows="5" name="firm_another_request">'.$firm_another_request.'</textarea></p>';
				echo '<p>Адрес: </br><textarea cols="60" rows="5" name="firm_adress">'.$firm_adress.'</textarea></p>';
		
				echo '<p>Телефон: <input type="text" size="30" name="firm_telno" value="'.$firm_telno.'"></p>';
				echo '<p>E-mail: <input type="text" size="30" name="firm_email" value="'.$firm_email.'"></p>';
				echo '<p>Факс: <input type="text" size="30" name="firm_faxno" value="'.$firm_faxno.'"></p>';
				
				echo '<p>ФИО директора: <input type="text" size="30" name="firm_dir" value="'.$firm_dir.'"></p>';
				echo '<p>Должность директора: <input type="text" size="30" name="firm_dir_dolgn" value="'.$firm_dir_dolgn.'"></p>';
				echo '<p>Действует на основании: <input type="text" size="30" name="firm_dir_opt" value="'.$firm_dir_opt.'"></p>';
				
				echo '<p>Другие контакты: </br><textarea cols="60" rows="5" name="firm_contacts">'.$firm_contacts.'</textarea></p>';
		
			echo'</td>
					</tr>
				';

					echo'

					</tr>
					<tr>
						<td style="width: 50%; padding:10px;"><a style="color:#f00;" href="index.php?cat=frm&op=firm_to_del&id='.$id.'">Удалить</a></td>
						<td align="right" style=" width: 50%; padding:10px;"><input type="submit" value="Сохранить"></td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>';
		
			}
		}
				mysql_free_result($result);

}
else {echo 'Вы не авторизованы!';}
?>
