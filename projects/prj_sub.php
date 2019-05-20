<?php

	#ЕСЛИ авторизован
if(USER_LOGGED) {	
	
echo '
					<p><input type="search"  name="q" placeholder="Поиск" method="get"> ';
					
						echo'<input type="submit" action="index.php?cat=prj&op=search&q='.$q.'" value="Найти"></p>';
echo    '<ul class="sub_menu">
			<li><p><a href="index.php?cat=prj&op=new">Новый проект</a></p></li>
			<li><p><a href="index.php?cat=prj&op=main&lid='.$UserID.'">Мои проекты <img src="images/star_icon.png" width="12px"/></a></p></li>
			<li><p><a href="index.php?cat=prj&op=main">Проекты в работе</a></p></li>
				<ul>';				
						mysql_query ("SET NAMES 'utf-8'");
						$qr_result = mysql_query("
							SELECT id, name, value FROM project_status WHERE active = '1' ORDER BY sort ASC") or die(mysql_error());
					
							while($data = mysql_fetch_array($qr_result)){

								$background_color = mysql_result(mysql_query("SELECT background_color FROM project_status WHERE id=".$data['id']." LIMIT 1"),0);
								$color = mysql_result(mysql_query("SELECT color FROM project_status WHERE id=".$data['id']." LIMIT 1"),0);
								
								$count = mysql_fetch_assoc(mysql_query('SELECT count(*) AS total FROM projects WHERE pr_status='.$data['id']));
								if ($count['total']>0) 
								# цветное выделение количества проектов
								#{ $mark_status = '<span style="background-color:'.$background_color.'; color:'.$color.'; padding:4px; ">'.$count['total'].'</span>';}
								# обычное выделение количества проектов
								{ $mark_status = '<span>['.$count['total'].']</span>';}
								else {$mark_status = '';}
								echo'<li><a href="index.php?cat=prj&op=main&select='.$data['name'].'">'.$data['value'].'</a> '.$mark_status.'</li>';
							}
					echo'</ul>	
			<li><p><a href="index.php?cat=prj&op=main&select=archive">Архивные</a></p></li>
		 </ul> 
';
							
}
?>
