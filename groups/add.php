<?php
# '.$module_name.'
$module_name = "groups";
		
#���� �����������
if(USER_LOGGED) {echo'

<div class="block_submenu">�������� ����� �������� ������</div>

<form method="post" action="action.php?act=add" width=auto"> 
<table>
  <tr>
  <td style="vertical-align: top;">
  <p style="color:red";>������������*:</br><input type="text" size="50" name="product_group_name"></p>';
    
  echo '
   
    <p><input type="submit" value="�������� ������"></p>
   
        </td>
  </tr> 
 
	</table></form>';


}
else {echo '�� �� ������������!';}
?>
