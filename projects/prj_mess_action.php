<?php

	#ЕСЛИ авторизован
if(USER_LOGGED) {
	
				$cat = $_GET['cat'];  
				$op = $_GET['op'];  
				$id = $_GET['id'];
				
	
echo '<h2>Cообщения проекта</h2>';

	if (isset($id)){
		$sql = "SELECT * FROM messages WHERE mess_project=".$_GET['id'];

		$result = mysql_query($sql)or die(mysql_error());

		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}

		if (mysql_num_rows($result) == 0) {
			echo "Нет сообщений.";
			#exit;
		}
	

				while ($row = mysql_fetch_assoc($result)) {
					
					#Имя автора
					$mess_author = GetUserName($row['mess_author']);
					$content = 	$row['mess_text'];
				


			# вывод комментариев
			echo' <table border="0" style="border-collapse: collapse; width: 100%;">
						<tbody>
							<tr>
								<td style="width: 32px; vertical-align: top;"><div class="iconfolder"><img src="images/user-avatar.png"/></div></td>
								<td style="width: auto;"><b><a href="index.php?cat=usr&op=show&id=' .$row['mess_author']. '">'.$mess_author.'</a></b> '  .GetDateFormat($row['mess_datetime']). '
								<p>'.$content.'</p></td>
							</tr>
						</tbody>
					</table>
			';
				}
	}
}
?>
