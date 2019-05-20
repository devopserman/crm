<?php
#messages

#ЕСЛИ авторизован
if (isset($_GET['firm']) && is_numeric($_GET['firm'])){$firm = $_GET['firm'];} 
if (isset($_GET['project']) && is_numeric($_GET['project'])){$project = $_GET['project']; }

if(USER_LOGGED) {echo'

<div class="block1"><div class="block1">Добавить сообщение</div>
<form method="post" action="action.php?act=add&firm='.$_GET['firm'].'&project='.$_GET['project'].'" width="400px">';
  
	$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
	$result = mysql_query($query) or die(mysql_error());
	
	
	
 # Предприятие
	print '<td><p style="color:red";>Предприятие: <br /><SELECT name="mess_firm" ><option value=""></option>';
	while ($row = mysql_fetch_array($result)) { //print '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; }
	
								if ($_GET['firm'] == $row['firm_id']){
												print '<option value="'.$row[$firm].'" selected >'.$row[firm_name].'</option>'; 
										}
										else{
												print '<option value="'.$row[firm_id].'">'.$row[firm_name].'</option>'; 
												}
												}
	
	
	
	mysql_free_result($result);
	print'</p></select></td>';
	
	
	
	
	
 # Проект
  	$query = "SELECT * FROM projects WHERE pr_active='1' GROUP BY pr_id ORDER BY pr_id";
	$result = mysql_query($query) or die(mysql_error());
 
	print '<td><p>Предприятие: <br /><SELECT name="mess_project" ><option value=""></option>';
	while ($row = mysql_fetch_array($result)) { //print '<option value="'.$row[pr_id].'">'.$row[pr_name].'</option>'; }
									if ($_GET['project'] == $row['pr_id']){
												print '<option value="'.$row[$project].'" selected >'.$row[pr_name].'</option>'; 
										}
										else{
												print '<option value="'.$row[pr_id].'">'.$row[pr_name].'</option>'; 
												}
												}
	mysql_free_result($result);
	print'</p></select></td>';
  
  
  echo '<p>Запись:</br><textarea cols="60" rows="5" name="mess_text"></textarea></p>
  <p><input type="submit" value="Добавить запись"> 
</form><p></div>';


}
else {echo 'Вы не авторизованы!';}
?>
