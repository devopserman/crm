<?php
	
#ЕСЛИ авторизован
if((USER_LOGGED)) {

		echo'
		<div class="note_yellow">
			<h2>Добавить новую фирму</h2>
		</div>
		<div class="note_white">
			<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
			<tbody>
			<tr>
			<td style="width: 100%;"></td>
			<form method="post" action="index.php?cat=frm&op=firm_to_add" width="100%">';
			
			# Название
			
			
				echo '<tr><td>';
				
				echo '<p>Наименование фирмы:</br> <input '.$important_style.' type="text" size="50" name="firm_name" ></p>';
				echo '<p>Полное наименование:</br> <input type="text" size="50" name="firm_full_name"></p>';
				echo '<p>ИНН: <input type="text" size="20" name="firm_inn" ></p>';
				echo '<p>КПП: <input type="text" size="20" name="firm_kpp" ></p>';
				echo '<p>Отрасль: <input type="text" size="50" name="firm_sphera" ></p>';
				echo '<p>Комментарий: </br><textarea cols="60" rows="5" name="firm_comment"></textarea></p>';
		
				echo '<p>Реквизиты: </br><textarea cols="60" rows="5" name="firm_another_request"></textarea></p>';
				echo '<p>Адрес: </br><textarea cols="60" rows="5" name="firm_adress"></textarea></p>';
		
				echo '<p>Телефон: <input type="text" size="30" name="firm_telno" ></p>';
				echo '<p>E-mail: <input type="text" size="30" name="firm_email"></p>';
				echo '<p>Факс: <input type="text" size="30" name="firm_faxno" ></p>';
				
				echo '<p>ФИО директора: <input type="text" size="30" name="firm_dir" ></p>';
				echo '<p>Должность директора: <input type="text" size="30" name="firm_dir_dolgn" ></p>';
				echo '<p>Действует на основании: <input type="text" size="30" name="firm_dir_opt" ></p>';
				
				echo '<p>Другие контакты: </br><textarea cols="60" rows="5" name="firm_contacts"></textarea></p>';
		
			echo'</td>
					</tr>
				';
		
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
