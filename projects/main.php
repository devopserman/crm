<?php
#
# Модуль проектов

				$op = $_GET['op'];  
				$id = $_GET['id'];
				$q  = $_POST['q'];
				$select = $_GET['select'];
				$getlid = $_GET['lid'];
				$getfirm = $_GET['firm'];
				

	#ЕСЛИ авторизован
	echo $subselect;
if(USER_LOGGED) {
	
		if (isset($getlid)) {
			$sql_lid = ' AND pr_lid='.$getlid.' ';
		}
		else{
			$sql_lid = ' ';
		}
	
	
		if (isset($getfirm)) {
			$sql_firm = ' AND pr_firm='.$getfirm.' ';
		}
		else{
			$sql_firm = ' ';
		}
	
	$select = $_GET['select'];
	switch ($select)  
			{ 
 				# на регистрации
				case 'my'				:  $subselect = ' AND pr_lid='.$UserID.' ';break;
				case 'onreg'			:  $subselect = ' AND pr_status=1 ';break;
				case 'training' 		:  $subselect = ' AND pr_status=2 ';break;
				case 'remind'			:  $subselect = ' AND pr_status=3 ';break;
				case 'go'				:  $subselect = ' AND pr_status=4 ';break;
				case 'escort'			:  $subselect = ' AND pr_status=5 ';break;
				case 'money'			:  $subselect = ' AND pr_status=6 ';break;
				case 'act'				:  $subselect = ' AND pr_status=7 ';break;
				case 'ok'				:  $subselect = ' AND pr_status=8 ';break;
				case 'cancel'			:  $subselect = ' AND pr_status=9 ';break;
				case 'archive'			:  $subselect = ' AND (pr_status=8 OR pr_status=9)  ';break;
				
				default					:  $subselect = ' AND (pr_status<>8) AND (pr_status<>9) ';break;

				
			}
	if (isset($select) OR (isset($getlid)) OR (isset($getfirm))) 
	{
		if(($select<>'') AND ($select <> 'archive')) {
			$selectname=mysql_result(mysql_query("SELECT value FROM project_status WHERE name='".$select."' LIMIT 1"),0);
			echo '<div class="note_yellow">Статус: <b><i>'.$selectname.'</i></b></div>';
		}
		if($select == 'archive') {
			echo '<div class="note_yellow">Статус: <b><i>Архивные</i></b></div>';
		}
		
		if ($getlid>0) {echo '<div class="note_tellow">Ответственный: <b><i>'.GetUserName($getlid).'</i></b></div>';}
		if ($getfirm>0) {echo '<div class="note_tellow">Предприятие: <b><i>'.GetFirmName($getfirm).'</i></b></div>';}
	}

$qr_result = mysql_query("
	SELECT * FROM projects 
	WHERE pr_active = '1' ".$subselect.''.$sql_lid.''.$sql_firm." ORDER BY pr_update DESC") or die(mysql_error());
	
	
	$i=1;
	
	while($data = mysql_fetch_array($qr_result)){ 
	$num=$start+$i;
	
	# Помечаем, если я ответственный за этот проект
	if ($UserID == $data['pr_lid'])	{
		$mark = '<img src="images/star_icon.png" width="12px" alt="Мой проект"/>';	} else 	{$mark='';}
	
	#Имя фирмы
	$pr_firm = GetFirmName($data['pr_firm']);
	
	#Ответственный
	if (($data['pr_lid'])>0)
		{$pr_lid=mysql_result(mysql_query("SELECT username FROM users WHERE uid=".$data['pr_lid']." LIMIT 1"),0);}
		else {$pr_lid="";}
	
		$dateupdate = date_format(date_create_from_format('Y-m-d H:i:s',$data['pr_update']), 'd.m.Y H:i');
		
		
		$status_name=mysql_result(mysql_query("SELECT value FROM project_status WHERE id=".$data['pr_status']." LIMIT 1"),0);
		$background_color = mysql_result(mysql_query("SELECT background_color FROM project_status WHERE id=".$data['pr_status']." LIMIT 1"),0);
		$color = mysql_result(mysql_query("SELECT color FROM project_status WHERE id=".$data['pr_status']." LIMIT 1"),0);

		$mark_status = '<span style="background-color:'.$background_color.'; color:'.$color.'; padding:4px; ">'.$status_name.'</span>';

			
		
	echo '
		<div style="background-color:#f00;">
			<div class="select">
		
				<table border="0" style="border-collapse: collapse; width: 100%; ">
					<tbody>
						<tr>
							<td  style="width: 32px; vertical-align:top; "><div class="iconfolder"><img src="images/projects_folder.png"/></div></td>
							<td style="width: auto;"><b><a href="index.php?cat=prj&op=show&id=' .$data['pr_id']. '">'.$data['pr_id'].'. '  .mb_strtoupper($data['pr_name'], "UTF-8"). '</a></b> '.$mark.'
									<table border="0" style="border-collapse: collapse; width: 100%;">
									<tbody>
									<tr>
									<td style="width: 50%;"><p><span  class="sub_content">'.$pr_firm.'</span> <span class="sub_content"><a href="index.php?cat=usr&op=show&id='.$data['pr_lid'].'">'.$pr_lid.'</a></span></p></td>
									<td align="right" style="width: 50%; halign:right; ">'.$mark_status.'</br></br><span class="mess_date" align="right" >Обновлено: '.$dateupdate.'</span></td>
									</tr>
									<tr>
									<td style="width: 50%;"></td>
									<td style="width: 50%;"></td>
									</tr>
									</tbody>
									</table>
							</td>
						</tr> 
					</tbody>
				</table>
			</div>
		</div>
	';	
	}
	
mysql_query($query, $link);

mysql_close($link);
}
?>
