<?php
#firms
		
#���� �����������
if(USER_LOGGED) {echo'

<div class="block_submenu">�������� ����� �����������</div>

<form method="post" action="action.php?act=add" width=auto"> 
<table>
  <tr>
  <td style="vertical-align: top;">
  <p style="color:red";>������� ������������*:</br><input type="text" size="50" name="firm_name"></p>';
  $query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
	$result = mysql_query($query) or die(mysql_error());
 
	echo '<p>������������ ��������: <br /><select name="firm_parrent" ><option value=""></option>';
	while ($row = mysql_fetch_array($result)) { echo '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; }
	mysql_free_result($result);
	echo'</p></select>';


  
  echo '
  <p>������ ������������: </br><input type="text" size="50" name="firm_full_name"></p>
  <p>����������� ������������: </br><input type="text" size="50" name="firm_short_name"></p>
  <p>����� ������������ �����������:</br><input type="text" size="50" name="firm_sphera"></p>
  <p>���:<input type="text" size="30" name="firm_inn"></p>
  <p>���:<input type="text" size="30" name="firm_kpp"></p>
  <p>��������� ���������:</br><textarea cols="60" rows="5" name="firm_another_request"></textarea></p>
  </td>
  <td style="vertical-align: top;">
  <p>�������� ������:<input type="text" size="20" name="firm_adr_index"></p>
  <p>������:<input type="text" size="30" name="firm_adr_country"></p>
  <p>�������:<input type="text" size="30" name="firm_adr_state"></p>
  <p>�����:<input type="text" size="30" name="firm_adr_region"></p>
  <p>�����/���������� �����:<input type="text" size="30" name="firm_adr_city"></p>
  <p>�����:<input type="text" size="30" name="firm_adr_street"></p>
  <p>����� ����:<input type="text" size="20" name="firm_adr_house">����:<input type="text" size="10" name="firm_adr_office"></p>
  <p>���������� � ������:</br><textarea cols="60" rows="5" name="firm_adr_comment"></textarea></p>
   </td>
  <td style="vertical-align: top;">
  <p>��� ���������:</br><input type="text" size="50" name="firm_dir"></p>
  <p>��� ��������� � ���. ������ (� ���� "������� ����� ���������"):</br><input type="text" size="50" name="firm_dir_rp"></p>
  <p>�������� ��������� �� ���������:</br><input type="text" size="50" name="firm_dir_opt"></p>
  <p>��� ��.����������:</br><input type="text" size="50" name="firm_glbuch"></p>
  <p>E-mail:</br><input type="text" size="50" name="firm_email"></p>
  <p>�������:<input type="text" size="20" name="firm_telno">����:<input type="text" size="20" name="firm_faxno"></p>
  <p>������ ��������:</br><textarea cols="60" rows="5" name="firm_contacts"></textarea></p>
  <p>�����������:</br><textarea cols="60" rows="5" name="firm_comment"></textarea></p>
  
    <p><input type="submit" value="�������� ������"></p>
  
  
        </td>
  </tr> 
  
  
    


	</table></form>
	
	';


}
else {echo '�� �� ������������!';}
?>
