<?php

#ЕСЛИ авторизован
if(USER_LOGGED) {
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
		$query = "SELECT * FROM users WHERE uid=".$_GET['id'];
		$result = mysql_query($query) or die(mysql_error());
		$row2 = mysql_fetch_array($result);
	
	echo "<form method='post' action='action.php?act=del&id=".$_GET['id']."' width='400px'> 
	<p style='color:red';>Вы действительно хотите удалить пользователя <b>".$row2['username']."</b>?</p>";
  
	
	mysql_free_result($result);
	  
  echo '<p><input type="submit" value="Удалить"></form><p>';

}
}
?>