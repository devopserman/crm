<?php
session_start();
# Модуль проектов

include "../auth.php";  
include "../header.php";
			#ЕСЛИ авторизован	
			if(USER_LOGGED) {
				// Получаем параметр op из URL  
				$op = $_GET['op'];  
				$id = $_GET['id'];
				$page = $_GET['p'];
				$firms = $_GET['firm'];
				$lids = $_GET['lid'];
				
		
			
				echo '
					<div class="block_submenu"> <!-- <img align="left" src="/images/service/project_icon.png" width="32" /> -->
					<!--<p><b><a href="/index.php">Главная</a> / 
					<a href="/projects/projects.php">Проекты</a></b></p>-->
					<p><a href="projects.php?op=add">Новый проект</a>';
						if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
							echo ' / <a href="?op=edit&id='.$id.'">Редактировать запись</a>';
							echo ' / <a href="?op=del&id='.$id.'">Удалить запись</a></p>';
							} 
						else {}

			# получение значений для фильтра	
				$firm = $_POST['firm'];
				if (isset($firm) && ($firm>0)){$firm_sql = '&firm='.$firm;} else {$firm_sql = "";}
				
			#	$project = $_POST['project'];
			#	if (isset($project) && ($project>0)){$project_sql = '&project='.$project;} else {$project_sql = "";}
				
				$lid = $_POST['lid'];
				if (isset($lid) && ($lid>0)){$lid_sql = '&lid='.$lid;} else {$lid_sql = "";}

				
		if (($op<>'add')AND ($op<>'del')AND ($op<>'show')AND ($op<>'edit'))
		#не добавлять фильтр в других формах, кроме главной формы message
				{	
						printf("<div class='block_message'><form action='projects.php?op=main".$firm_sql."".$lid_sql."' method='post' name='forma' border='1'><fieldset>");
			#фильтр по фирме исполнителю			
			/*			$query = "SELECT * FROM projects WHERE pr_active='1' GROUP BY pr_name ORDER BY pr_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<SELECT name="project" ><option value=""></option>';
								while ($row2 = mysql_fetch_array($result)) { 
										if($project == $row2["pr_id"]) {
												print '<option value="'.$row2[pr_id].'" selected >'.$row2[pr_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[pr_id].'">'.$row2[pr_name].'</option>'; 
												}
								} 
						mysql_free_result($result);
						print ('</select>');
			*/
			# фильтр по фирме			
						
						$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<p>Заказчик: <SELECT name="firm" ><option value=""></option>';
								while ($row2 = mysql_fetch_array($result)) { 
										if($firms == $row2["firm_id"]) {
												print '<option value="'.$row2[firm_id].'" selected >'.$row2[firm_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[firm_id].'">'.$row2[firm_name].'</option>'; 
												}
								} 
						mysql_free_result($result);
						print ('</select>');
								
			#фильтр по автору			
						$query = "SELECT * FROM users WHERE user_active='1' GROUP BY username ORDER BY username";
						$result = mysql_query($query) or die(mysql_error());
						print 'Ответственный: <SELECT name="lid" ><option value=""></option>';
								while ($row2 = mysql_fetch_array($result)) { 
										if($lids == $row2["uid"]) {
												print '<option value="'.$row2[uid].'" selected >'.$row2[username].'</option>'; 
										}
										else{
												print '<option value="'.$row2[uid].'">'.$row2[username].'</option>'; 
												}
								} 
						mysql_free_result($result);
					
						
						print("
						</fieldset>
						
						<fieldset>
						<input id='submit' type='submit' value='Применить фильтр'>
						</p></select>
						</fieldset>
						</form></div>");
				}		
			echo '</div><div class="block1">';	
			

					
			
	// Выбираем нужное нам действие  
	switch ($op)  
	{  
        case 'main' : include "main.php"; break;  
        case 'del' : include "del.php"; break;  
        case 'edit' : include "edit.php"; break;  
        case 'add' : include "add.php"; break;  
        case 'show' : include "show.php"; break;  
        default :  include "main.php";  
	}  

				}else{include '../logpls.php';}

				
	
include ("../footer.php");?>