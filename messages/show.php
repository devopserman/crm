<?php
# show message
#	
if (isset($_GET['id']) && is_numeric($_GET['id'])){
//   $sql = mysql_query("SELECT * FROM users WHERE uid =".$_GET['id']."  LIMIT 1");
  
$sql = "SELECT * FROM messages WHERE mess_active=1 AND mess_id=".$_GET['id'];

$qr_result = mysql_query($sql)or die(mysql_error());

if (!$qr_result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($qr_result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}


$data = mysql_fetch_array($qr_result);




	#Предприятие исполнителя
	if ($data['mess_firm']>0)
		{$mess_firm=mysql_result(mysql_query("SELECT firm_name FROM firms WHERE firm_active='1' AND firm_id=".$data['mess_firm']),0);}
		else {$mess_firm="";}
	#Имя автора проекта
	if ($data['pr_author']>0)
		{$user_author=mysql_result(mysql_query("SELECT username FROM users WHERE user_active='1' AND uid=".$data['pr_author']),0);}
		else {$user_author="";}
	#Проект
	if ($data['mess_project']>0)
		{$mess_project=mysql_result(mysql_query("SELECT pr_name FROM projects WHERE pr_active='1' AND pr_id=".$data['mess_project']),0);}
		else {$mess_project="";}	   
	
if ($data['mess_author']>0)
		{$user_author=mysql_result(mysql_query("SELECT username FROM users WHERE user_active='1' AND uid=".$data['mess_author']),0);}
		else {$user_author="";}
	
	echo '<div class="block_gray"><div class="block1"><div class="block_message"><h3>#'.$data['mess_id'].' 
	'.$data['mess_datetime'].'<a href="/users/users.php?op=show&id='.$data['mess_author']. '"> '. $user_author .'</a> | 
		Предприятие: <a href="/firms/firms.php?op=show&id=' .$data['mess_firm']. '">'. $mess_firm . '</a> / 
		Проект: <a href="/modules/projects/projects.php?op=show&id='.$data['mess_project']. '">'.$mess_project.'</a></h3>';
		echo '<p><a href="?op=edit&id='.$data['mess_id'].'">Редактировать запись</a>';
		echo ' / <a href="?op=del&id='.$data['mess_id'].'">Удалить запись</a></p>';
		echo '</div>';
		

	
	
	
	if ($data['mess_firm']>0)
		{$mess_firm=mysql_result(mysql_query("SELECT firm_name FROM firms WHERE firm_active='1' AND firm_id=".$data['mess_firm']),0);}
		else {$mess_firm="";}
	if ($data['mess_project']>0)
		{$mess_project=mysql_result(mysql_query("SELECT pr_name FROM projects WHERE pr_active='1' AND pr_id=".$data['mess_project']),0);}
		else {$mess_project="";}	
		


		echo '<p>'.nl2br($data['mess_text']).'</p></div></div>';


		}
	


mysql_free_result($qr_result);


mysql_query($query, $link);

mysql_close($link);


?>
