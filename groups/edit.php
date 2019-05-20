<?php
#products
$module_name = "groups";

#ЕСЛИ авторизован
if(USER_LOGGED) {
	
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
				$sql = mysql_query("SELECT * FROM products_group WHERE group_id =".$_GET['id']."  LIMIT 1");
				$row = mysql_fetch_array($sql);
				

print '<form method="post" action="action.php?act=edit&id='.$_GET['id'].'" width="auto">';
echo "<div class='block_submenu'><p class='caption'>".$row['product_group_name']. "</p></div>";


//include 'sum.php';

$str=$row["product_group_name"];
	printf('



<fieldset>
<table>
  <tr>
  <td style="vertical-align: top;">
  
  
  
  <p style="color:red";><label for="group_name">Название группы*:</label></br><input type="text" name="group_name" size="100" value="'.$str.'"></p>
  ', $row['group_name']);
   
  printf('<p><input type="submit" value="Редактировать запись"></p>
  
  
        </td>
  </tr> 
  
  
    


	</table>
	</fieldset>
	</form>');
	
	


}
else {echo 'Вы не авторизованы!';}

				mysql_query($query, $link);
				mysql_close($link);
			}

?>