<?php
#users		
		
#���� �����������
if(USER_LOGGED) {
	
	$firm = $_GET['firm'];
	
	
	echo'

<div class="block_submenu">�������� ������ ������������</div>
<form method="post" action="action.php?act=add" width="400px"> 

  <p style="color:red";>��� ������������*:</br><input type="text" size="30" name="username"></p>
  <p>������: </br><input type="text" size="30" name="password"></p>
  <p>e-mail: </br><input type="text" size="30" name="user_email"></p>
  <p>����:</br><input type="text" size="30" name="user_role"></p>';
  
	$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
	$result = mysql_query($query) or die(mysql_error());

	$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
	$result = mysql_query($query) or die(mysql_error());
	
	
	
 # �����������
	print '<td><p>�����������: <br /><SELECT name="user_firm" ><option value=""></option>';
	while ($row = mysql_fetch_array($result)) { 	
								if ($firm == $row['firm_id']){
												print '<option value="'.$firm.'" selected >'.$row[firm_name].'</option>';
														
										}
										else{
												print '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; 
												}
												}
	
	
	
	
	mysql_free_result($result);
	print'</p></select></td>';


	
 
  
  echo '<p>���������:</br><input type="text" size="30" name="user_post"></p>
  <p>�������:</br><input type="text" size="12" name="user_telno"></p>
  <p>���. ���.:</br><input type="text" size="12" name="user_mobtelno"></p>
  <p>������ ��������:</br><textarea cols="60" rows="5" name="user_contacts"></textarea></p>
  <p>�����������:</br><textarea cols="60" rows="5" name="user_comment"></textarea></p>
       
  
  
    

  <p><input type="submit" value="�������� ������"> 
</form><p>';


}
else {echo '�� �� ������������!';}
?>
