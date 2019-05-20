<?php
#firms
		
#ЕСЛИ авторизован
if(USER_LOGGED) {echo'

<div class="block_submenu">Добавить новое предприятие</div>

<form method="post" action="action.php?act=add" width=auto"> 
<table>
  <tr>
  <td style="vertical-align: top;">
  <p style="color:red";>Краткое наименование*:</br><input type="text" size="50" name="firm_name"></p>';
  $query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
	$result = mysql_query($query) or die(mysql_error());
 
	echo '<p>Родительская компания: <br /><select name="firm_parrent" ><option value=""></option>';
	while ($row = mysql_fetch_array($result)) { echo '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; }
	mysql_free_result($result);
	echo'</p></select>';


  
  echo '
  <p>Полное наименование: </br><input type="text" size="50" name="firm_full_name"></p>
  <p>Сокращенное наименование: </br><input type="text" size="50" name="firm_short_name"></p>
  <p>Сфера деятельности предприятия:</br><input type="text" size="50" name="firm_sphera"></p>
  <p>ИНН:<input type="text" size="30" name="firm_inn"></p>
  <p>КПП:<input type="text" size="30" name="firm_kpp"></p>
  <p>Остальные реквизиты:</br><textarea cols="60" rows="5" name="firm_another_request"></textarea></p>
  </td>
  <td style="vertical-align: top;">
  <p>Почтовый индекс:<input type="text" size="20" name="firm_adr_index"></p>
  <p>Страна:<input type="text" size="30" name="firm_adr_country"></p>
  <p>Область:<input type="text" size="30" name="firm_adr_state"></p>
  <p>Район:<input type="text" size="30" name="firm_adr_region"></p>
  <p>Город/населенный пункт:<input type="text" size="30" name="firm_adr_city"></p>
  <p>Улица:<input type="text" size="30" name="firm_adr_street"></p>
  <p>Номер дома:<input type="text" size="20" name="firm_adr_house">Офис:<input type="text" size="10" name="firm_adr_office"></p>
  <p>Дополнение к адресу:</br><textarea cols="60" rows="5" name="firm_adr_comment"></textarea></p>
   </td>
  <td style="vertical-align: top;">
  <p>ФИО директора:</br><input type="text" size="50" name="firm_dir"></p>
  <p>ФИО директора в род. падеже (в лице "Иванова Ивана Ивановича"):</br><input type="text" size="50" name="firm_dir_rp"></p>
  <p>Директор действует на основании:</br><input type="text" size="50" name="firm_dir_opt"></p>
  <p>ФИО гл.бухгалтера:</br><input type="text" size="50" name="firm_glbuch"></p>
  <p>E-mail:</br><input type="text" size="50" name="firm_email"></p>
  <p>Телефон:<input type="text" size="20" name="firm_telno">Факс:<input type="text" size="20" name="firm_faxno"></p>
  <p>Другие контакты:</br><textarea cols="60" rows="5" name="firm_contacts"></textarea></p>
  <p>Комментарий:</br><textarea cols="60" rows="5" name="firm_comment"></textarea></p>
  
    <p><input type="submit" value="Добавить запись"></p>
  
  
        </td>
  </tr> 
  
  
    


	</table></form>
	
	';


}
else {echo 'Вы не авторизованы!';}
?>
