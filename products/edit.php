<?php
#products
$module_name = "products";

#���� �����������
if(USER_LOGGED) {
	
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
				$sql = mysql_query("SELECT * FROM products WHERE product_id =".$_GET['id']."  LIMIT 1");
				$row = mysql_fetch_array($sql);
				

print '<form method="post" action="action.php?act=edit&id='.$_GET['id'].'" width="auto">';
echo "<div class='block_submenu'><p class='caption'>".$row['product_name']. "</p></div>";


//include 'sum.php';


	printf('



<fieldset>
<table>
  <tr>
  <td style="vertical-align: top;">
  
  
  
  <p style="color:red";><label for="product_name">������������*:</label></br><input type="text" name="product_name" size="100" value="%s"></p>
  ', $row['product_name']);
  
  $query = "SELECT * FROM products_group GROUP BY product_group_name ORDER BY product_group_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<p>�������� ������: <br /><SELECT name="product_group" > <option value=""></option> ';
								while ($row2 = mysql_fetch_array($result)) { 
										if($row["product_group"] == $row2["group_id"]) {
												print '<option value="'.$row2[group_id].'" selected >'.$row2[product_group_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[group_id].'">'.$row2[product_group_name].'</option>'; 
												}
								}
								mysql_free_result($result);
						print ('</p></select>  <a href="/groups/groups.php">������</a>');

  printf('
    ',$row['product_group']);
 	printf('
  <p><label for="product_comment">�����������:</label></br><textarea cols="60" rows="5" name="product_comment" value="%s">'.$row["product_comment"].'</textarea></p>
  ', $row['product_comment']);
  printf('<p><input type="submit" value="������������� ������"></p>
  
  
        </td>
  </tr> 
  
  
    


	</table>
	</fieldset>
	</form>');
	
	


}
else {echo '�� �� ������������!';}

				mysql_query($query, $link);
				mysql_close($link);
			}

?>