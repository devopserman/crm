<?php
# '.$module_name.'
$module_name = "products";

#ЕСЛИ авторизован
if(USER_LOGGED) {
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
		$query = "SELECT * FROM products WHERE product_id=".$_GET['id'];
		$result = mysql_query($query) or die(mysql_error());
		$row2 = mysql_fetch_array($result);
	
	echo "<form method='post' action='action.php?act=del&id=".$_GET['id']."' width='400px'> 
	<p style='color:red';>Вы действительно хотите удалить <u><b>".$row2['product_name']."</b></u>?</p>";
  
	
	mysql_free_result($result);
	  
  echo '<p><input type="submit" value="Удалить"></form><p>';

}
}
?>