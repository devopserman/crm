<?php
# '.$module_name.'
$module_name = "products";
		
#���� �����������
if(USER_LOGGED) {echo'

<div class="block_submenu">�������� ����� �����</div>

<form method="post" action="action.php?act=add" width=auto"> 
<table>
  <tr>
  <td style="vertical-align: top;">
  <p style="color:red";>������������*:</br><input type="text" size="50" name="product_name"></p>';
  $query = "SELECT * FROM products_group GROUP BY product_group_name ORDER BY product_group_name";
	$result = mysql_query($query) or die(mysql_error());
 
	echo '<p>�������� ������: <br /><select name="product_group" ><option value=""></option>';
	while ($row = mysql_fetch_array($result)) { echo '<option value="'.$row[group_id].'">'.$row[product_group_name].'</option>'; }
	mysql_free_result($result);
	echo' </p></select> <a href="/groups/groups.php">������</a>';

	echo '<p><label for="product_comment">���������:</label><p/><p><textarea cols="60" rows="5" name="product_comment" value="%s">'.$row["product_comment"].'</textarea></p>';
  
  echo '
   
    <p><input type="submit" value="�������� ������"></p>
   
        </td>
  </tr> 
 
	</table></form>';


}
else {echo '�� �� ������������!';}
?>
