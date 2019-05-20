<?php
#firms

#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
				$sql = mysql_query("SELECT * FROM firms WHERE firm_id =".$_GET['id']."  LIMIT 1");
				$row = mysql_fetch_array($sql);
				

print '<form method="post" action="action.php?act=edit&id='.$_GET['id'].'" width="auto">';
echo "<div class='block_submenu'><p class='caption'>".$row['firm_name']. "</p></div>";


include 'sum.php';






	printf('



<fieldset>
<table>
  <tr>
  <td style="vertical-align: top;">
  
  
  
  <p style="color:red";><label for="firm_name">Краткое наименование*:</label></br><input type="text" name="firm_name" size="50" value="%s"></p>
  ', $row['firm_name']);
  
  $query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<p>Родительская компания: <br /><SELECT name="firm_parrent" ><option value=""></option>';
								while ($row2 = mysql_fetch_array($result)) { 
										if($row["firm_parrent"] == $row2["firm_id"]) {
												print '<option value="'.$row2[firm_id].'" selected >'.$row2[firm_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[firm_id].'">'.$row2[firm_name].'</option>'; 
												}
								}
								mysql_free_result($result);
						print ('</p></select>');

  printf('
  <p><label for="firm_full_name">Полное наименование:</label><br/><input type="text" name="firm_full_name" size="50" value="%s"></p>
  <p><label for="firm_short_name">Сокращенное наименование:</label><br/><input type="text" name="firm_short_name" size="50" value="%s"></p>
  <p><label for="firm_sphera">Сфера деятельности предприятия:</label><br/><input type="text" name="firm_sphera" size="50" value="%s"></p>
  <p><label for="firm_inn">ИНН:</label><input type="text" name="firm_inn" size="30" value="%s"></p>  
  <p><label for="firm_kpp">КПП:</label><input type="text" name="firm_kpp" size="30" value="%s"></p>
  <p><label for="firm_another_request">Остальные реквизиты:</label></br><textarea cols="60" rows="5" name="firm_another_request">%s</textarea></p>
  </td>',$row['firm_full_name'],$row['firm_short_name'],$row['firm_sphera'],$row['firm_inn'],$row['firm_kpp'],$row['firm_another_request']);
  printf('<td style="vertical-align: top;">

  <p><label for="firm_adr_index">Почтовый индекс:</label><input type="text" name="firm_adr_index" size="20" value="%s"></p>
  <p><label for="firm_adr_country">Страна:</label><input type="text" name="firm_adr_country" size="30" value="%s"></p>
  <p><label for="firm_adr_state">Область:</label><input type="text" name="firm_adr_state" size="30" value="%s"></p>
  <p><label for="firm_adr_region">Район:</label><input type="text" name="firm_adr_region" size="30" value="%s"></p>  
  <p><label for="firm_adr_city">Город/населенный пункт:</label><input type="text" name="firm_adr_city" size="30" value="%s"></p>
  <p><label for="firm_adr_street">Улица:</label><input type="text" name="firm_adr_street" size="30" value="%s"></p>
  <p><label for="firm_adr_house">Номер дома:</label><input type="text" name="firm_adr_house" size="15" value="%s">
  <label for="firm_adr_office">Офис:</label><input type="text" name="firm_adr_office" size="15" value="%s"></p>
  
  <p><label for="firm_adr_comment">Дополнение к адресу:</label></br><textarea cols="60" rows="5" name="firm_adr_comment">%s</textarea></p>
     </td>
	 ',$row['firm_adr_index'],$row['firm_adr_country'],
	$row['firm_adr_state'],$row['firm_adr_region'],$row['firm_adr_city'],$row['firm_adr_street'],$row['firm_adr_house'],$row['firm_adr_office'],$row['firm_adr_comment']);
  
  printf('<td style="vertical-align: top;">
  <p><label for="firm_dir">ФИО директора:</label><br/><input type="text" name="firm_dir" size="50" value="%s"></p>
  <p><label for="firm_dir_rp">ФИО директора в род. падеже (в лице "Иванова Ивана Ивановича"):</label><br/><input type="text" name="firm_dir_rp" size="50" value="%s"></p>  
  <p><label for="firm_dir_opt">Директор действует на основании:</label><br/><input type="text" name="firm_dir_opt" size="50" value="%s"></p>
  <p><label for="firm_glbuch">ФИО гл.бухгалтера:</label><br/><input type="text" name="firm_glbuch" size="50" value="%s"></p>
  <p><label for="firm_email">E-mail:</label><input type="text" name="firm_email" size="20" value="%s"></p>
  <p><label for="firm_telno">Телефон:</label><input type="text" name="firm_telno" size="20" value="%s">
  <label for="firm_faxno">Факс:</label><input type="text" name="firm_faxno" size="20" value="%s"></p>
  <p><label for="firm_contacts">Другие контакты:</label></br><textarea cols="60" rows="5" name="firm_contacts">%s</textarea></p>
  <p><label for="firm_comment">Комментарий:</label></br><textarea cols="60" rows="5" name="firm_comment">%s</textarea></p>
  ',$row['firm_dir'],$row['firm_dir_rp'],$row['firm_dir_opt'],$row['firm_glbuch'],$row['firm_email'],$row['firm_telno'],$row['firm_faxno'],$row['firm_contacts'],$row['firm_comment']);
	

  printf('<p><input type="submit" value="Редактировать запись"></p>
  
  
        </td>
  </tr> 
  
  
    


	</table>
	</fieldset>
	</form>');
	
	


}
else {echo 'Вы не авторизованы!';}


/*

					printf("<form action='action.php?act=edit&id=".$_GET['id']."&hash=".$row['password']."' method='post' name='forma'>
						<fieldset>
						<p style='color:red';><label for='username'>Имя пользователя*:</label><p/><p><input type='text' name='username' size='50' value='%s'></p>
						<p style='color:red';><label for='password0'>Текущий пароль:</label><p/><p><input type='text' name='password0' size='30' value='%s'></p>
						<p style='color:red';><label for='password1'>Новый пароль:</label><p/><p><input type='text' name='password1' size='30' value='%s'></p>
						<p style='color:red';><label for='password2'>Повторите пароль:</label><p/><p><input type='text' name='password2' size='30' value='%s'></p>",$row['username'],'', $row['password1'], $row['password2']);
						
						$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<td><p>Предприятие: <br /><SELECT name="user_firm" >';
								while ($row2 = mysql_fetch_array($result)) { 
										if($row["user_firm"] == $row2["firm_id"]) {
												print '<option value="'.$row2[firm_id].'" selected >'.$row2[firm_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[firm_id].'">'.$row2[firm_name].'</option>'; 
												}
								}
								mysql_free_result($result);
						print ('</p></select></td>');
						printf("<p><label for='user_post'>Должность:</label><p/><p><input type='text' name='user_post' size='50' value='%s'></p>
						<p><label for='user_email'>e-mail:</label><p/><p><input type='text' name='user_email' size='30' value='%s'></p>
						<p><label for='user_role'>Роль:</label><p/><p><input type='text' name='user_role' size='30' value='%s'></p>
						<p><label for='user_telno'>Телефон:</label><p/><p><input type='text' name='user_telno' size='30' value='%s'></p>
						<p><label for='user_mobtelno'>Моб.телефон:</label><p/><p><input type='text' name='user_mobtelno' size='30' value='%s'></p>
						<p><label for='user_contacts'>Дополнительне контакты:</label><p/><p><textarea cols='60' rows='5' name='user_contacts' value='%s'></textarea></p>
						<p><label for='user_comment'>Комментарий:</label><p/><p><textarea cols='60' rows='5' name='user_comment' value='%s'></textarea></p>
						</fieldset>
						<br/>
						<fieldset>
						<input id='submit' type='submit' value='Редактировать запись'>
						<br/>
						</fieldset>
						</form>", $row['user_firm'], $row['user_post'], $row['user_email'], $row['user_role'], $row['user_telno'], $row['user_mobtelno'], $row['user_contacts'], $row['user_comment']);
			*/			
				mysql_query($query, $link);
				mysql_close($link);
			}

?>