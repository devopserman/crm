<?php
#
# Модуль сообщений
$per_page = $message_per_page;
if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
$start=abs($page*$per_page);

				$op = $_GET['op'];  
				$id = $_GET['id'];
				$page = $_GET['page'];
				
				$firm = $_GET['firm'];
				if (isset($firm) && ($firm>0)){$firm_sql = 'AND mess_firm='.$firm;} else {$firm_sql = "";}
				
				$project = $_GET['project'];
				if (isset($project) && ($project>0)){$project_sql = 'AND mess_project='.$project;} else {$project_sql = "";}
				
				$author = $_GET['author'];
				if (isset($author) && ($author>0)){$author_sql = 'AND mess_author='.$author;} else {$author_sql = "";}

	#ЕСЛИ авторизован
if(USER_LOGGED) {

$qr_result = mysql_query("
	SELECT * FROM messages 
	WHERE mess_active = '1'".$author_sql." ".$project_sql." ".$firm_sql.
		"  ORDER BY mess_datetime DESC LIMIT $start,$per_page") or die(mysql_error());

	
	$i=1;
	
	while($data = mysql_fetch_array($qr_result)){ 
	$i++;
	$num=$start+$i;
	
	#Имя предприятия исполнителя
	if (isset($data['mess_firm']) && ($data['mess_firm']>0))
		{$mess_firm=mysql_result(mysql_query("SELECT firm_name FROM firms WHERE firm_active='1' AND firm_id=".$data['mess_firm']." LIMIT 1"),0);}
		else {$mess_firm=null;}
	#Имя автора сообщения
	if (isset($data['mess_author']) && ($data['mess_author']>0))
		{$mess_author=mysql_result(mysql_query("SELECT username FROM users WHERE user_active='1' AND uid=".$data['mess_author']." LIMIT 1"),0);}
		else {$mess_author=null;}
	#Имя автора редакции
	if (isset($data['mess_author_edit']) && ($data['mess_author_edit']>0))
		{$mess_author_edit=mysql_result(mysql_query("SELECT username FROM users WHERE user_active='1' AND uid=".$data['mess_author_edit']." LIMIT 1"),0);}
		else {$mess_author_edit=null;}
	#Проект
	if (isset($data['mess_project']) && ($data['mess_project']>0))
		{$mess_project=mysql_result(mysql_query("SELECT pr_name FROM projects WHERE pr_active='1' AND pr_id=".$data['mess_project']." LIMIT 1"),0);}
		else {$mess_project="";}
	
	
	
	
	# Вывод сообщений
		echo '<div class="block1"><div class="block_message"><p><b><a href="?op=show&id='.$data['mess_id'].'">#'.$data['mess_id'].'</a></b> 
			'.$data['mess_datetime'].' <b><a href="/users/users.php?op=show&id='.$data['mess_author']. '">'. $mess_author .'</a></b> | 
			Предприятие: <b><a href="/firms/firms.php?op=show&id=' .$data['mess_firm']. '">'. $mess_firm . '</a></b> / 
			Проект: <b><a href="/projects/projects.php?op=show&id=' .$data['mess_project']. '">'.$mess_project.'</a></b></p>';
			
			echo '</div>';
		# mess_text
		echo '<p>'.nl2br($data['mess_text']).'</p>';
		
		echo '<p  align="right"><a href="?op=edit&id='.$data['mess_id'].'">Редактировать запись</a>';
			echo ' / <a href="?op=del&id='.$data['mess_id'].'">Удалить запись</a>';
		if ($data['mess_author_edit']>0) { 
		echo '<br /><i> Редактировал - <b>'.$mess_author_edit.'</b> '.$data['mess_datetime_edit'].'</i></p>';}
		echo '</p></div>';

		}

		
	# вывод страниц
	$res=mysql_query("SELECT count(*) FROM messages WHERE mess_active = 1 ".$author_sql." ".$project_sql." ".$firm_sql) or die(mysql_error());
	$row=mysql_fetch_row($res);
	$total_rows=$row[0];
	$num_pages=ceil($total_rows/$per_page);
	echo '<div class="block_footmenu">';
	echo 'Показано <b>'.$per_page.'</b> записей из <b>'.$total_rows.'</b><br/>Страница: <b>'.($page).'</b><br /><p class="pages">';


		for($j=1;$j<=$num_pages;$j++) {
			echo '<a  href="'.$_SERVER['PHP_SELF'].'?firm='.$firm.'&project='.$project.'&author='.$author.'&page='.$j.'">'.$j."</a>\n";
			}
		echo '</p><br />';


	echo '</div>';


mysql_query($query, $link);

mysql_close($link);
}
?>
