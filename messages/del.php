<?php

#���� �����������
if(USER_LOGGED) {
	if (isset($_GET['id']) && is_numeric($_GET['id'])){
		#��� ������� � ����
		$query = "SELECT * FROM messages WHERE mess_id=".$_GET['id'];
		$result = mysql_query($query) or die(mysql_error());
		$row2 = mysql_fetch_array($result);
	
	echo "<div class='block1'><form method='post' action='action.php?act=del&id=".$_GET['id']."' width='400px'> 
	<p style='color:red';>�� ������������� ������ ������� ������?</p>";
  
	
	mysql_free_result($result);
	  
  echo '<p><input type="submit" value="�������"></form><p></div>';

}
}
?>