<?php
#messages

#���� �����������
if (isset($_GET['firm']) && is_numeric($_GET['firm'])){$firm = $_GET['firm'];} 
if (isset($_GET['id']) && is_numeric($_GET['id'])){$project = $_GET['id']; }

if(USER_LOGGED) {
	
	echo'		<table border="0" style="border-collapse: collapse; width: 100%; padding:4px;" bgcolor="#eee">
					<tbody>
					<tr>
					<td style="width: 100%;"><h3>��������� �������</h3></td>
					
					</tr>
					</tbody>
					</table>
			';		
	
	echo'

<!--<h2>�������� ���������</h2> -->
<form method="post" action="index.php?cat=prj&op=messadd&id='.$_GET['id'].'" width="400px">';
  echo '<p>������:</br><textarea cols="60" rows="5" name="mess_text"></textarea></p>
  <p><input type="submit" value="�������� ������"> 
</form></p>';


}
else {echo '�� �� ������������!';}
?>
