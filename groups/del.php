<?php
# '.$module_name.'
$module_name = "groups";

#���� �����������
if(USER_LOGGED) {
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
		$query = "SELECT * FROM products_group WHERE group_id=".$_GET['id'];
		$result = mysql_query($query) or die(mysql_error());
		$row2 = mysql_fetch_array($result);
	
	echo "<form method='post' action='action.php?act=del&id=".$_GET['id']."' width='400px'> 
	<p style='color:red';>�� ������������� ������ ������� <u><b>".$row2['product_group_name']."</b></u>?</p>";
  
	
	mysql_free_result($result);
	  
  echo '<p><input type="submit" value="�������"></form><p>';

}
}
?>