<?php
////
//суммарная информация из базы по фирме
$sql_sum = "SELECT * FROM firms
        WHERE  firm_id = ".$_GET['id'];

$result_sum = mysql_query($sql_sum);

if (!$result_sum) {
    echo "Could not successfully run query ($sql_sum) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result_sum) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

while ($row_sum = mysql_fetch_assoc($result_sum)) {
    //echo "<p class='caption'>".$row_sum["firm_name"]. "</p>";

	//////////////////////////////////
	# Кол-во 
		$pr_mess_count=mysql_query("SELECT count(*) FROM users WHERE user_active='1' AND user_firm=".$_GET['id']) or die(mysql_error());
		$row3=mysql_fetch_row($pr_mess_count);
		$total_user_firm=$row3[0];
	# Контакты фирмы
	echo "<p><a href='../users/users.php?op=main&firm=".$_GET['id']."'>Сотрудники фирмы</a> (".$total_user_firm.") <a href ='../users/users.php?op=add&firm=".$_GET['id']."'><img alt='Добавить сотрудника' src='/images/service/icon-plus.png' width='14'/></a></p>";
	
		# Кол-во 
		$pr_mess_count=mysql_query("SELECT count(*) FROM messages WHERE mess_active='1' AND mess_firm=".$_GET['id']) or die(mysql_error());
		$row3=mysql_fetch_row($pr_mess_count);
		$total_mess_firm=$row3[0];
	# Сообщений фирмы
	echo "<p><a href='../messages/messages.php?op=main&firm=".$_GET['id']."'>Сообщения фирмы</a> (".$total_mess_firm.") <a href ='../messages/messages.php?op=add&firm=".$_GET['id']."'><img alt='Добавить сообщение' src='/images/service/icon-plus.png' width='14'/></a> </p>";
	
		# Кол-во 
		$pr_mess_count=mysql_query("SELECT count(*) FROM projects WHERE pr_active='1' AND pr_firm=".$_GET['id']) or die(mysql_error());
		$row3=mysql_fetch_row($pr_mess_count);
		$total_pr_firm=$row3[0];	
	# Проекты фирмы
	echo "<p><a href='../projects/projects.php?op=main&firm=".$_GET['id']."'>Проекты фирмы</a>(".$total_pr_firm.") <a href ='../projects/projects.php?op=add&firm=".$_GET['id']."'><img alt='Добавить проект' src='/images/service/icon-plus.png' width='14'/></a></p>";

}
	echo "<hr>";
//////////////////////////////////	
//КЦ суммарная информация из базы по фирме
?>