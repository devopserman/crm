<?php
# '.$module_name.'
$module_name = "groups";
		
#ЕСЛИ авторизован
if(USER_LOGGED) {echo'

<div class="block_submenu">Добавить новую товарную группу</div>

<form method="post" action="action.php?act=add" width=auto"> 
<table>
  <tr>
  <td style="vertical-align: top;">
  <p style="color:red";>Наименование*:</br><input type="text" size="50" name="product_group_name"></p>';
    
  echo '
   
    <p><input type="submit" value="Добавить запись"></p>
   
        </td>
  </tr> 
 
	</table></form>';


}
else {echo 'Вы не авторизованы!';}
?>
