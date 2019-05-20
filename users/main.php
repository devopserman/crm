<?php
	#ЕСЛИ авторизован
if(USER_LOGGED) {
				$op = $_GET['op'];  
				$id = $_GET['id'];
				$q  = $_POST['q'];
				$sort = $_GET['sort'];
				$select = $_GET['select'];
				


	echo '<p align="right">Сортировка: ';
if ($sort=='desc')
	{
	$sql_sort = 'ORDER BY uid DESC';
	echo '<a href="index.php?cat=usr&op=main&sort=new">По алфавиту</a> | <b>По новизне</b>';
	
	}
	
if ($sort<>'desc') 
	{
		$sql_sort = 'ORDER BY username ASC';
		echo '<b>По алфавиту</b> | <a href="index.php?cat=usr&op=main&sort=desc">По новизне</a>';
		}
	echo '</p>';
	
	if ($select=='my')
	{
		$sel = ' AND user_role>=1';
	}
	else
	{
		$sel = '';
	}


$qr_result = mysql_query("
	SELECT * FROM users 
	WHERE user_active = '1'  ".$sel." ".$sql_sort) or die(mysql_error());
	
	while($data = mysql_fetch_array($qr_result)){ 
			if (($data['user_comment'])!='') 
			{
				$user_comment = '<span style="padding:1px; background-color:#eee;">'.$data['user_comment'].'</span>';
			}else
			{
				$user_comment='';
			}
			
			if ($data['user_role']>=1)
			{
			$myuser = '<img src="images/star_icon.png" width="12px"/>';	
			}else{$myuser='';}
			
			
			# Юзер и его личные контакты.
			echo '<div class="select">';
		
			
				echo'<table border="0" style="border-collapse: collapse; width: 100%;">
					<tbody>
						<tr>
							<td  style="width: 32px; vertical-align: top;"><div class="iconfolder"><img src="images/user-avatar.png"/></div></td>
							<td style="width: auto;"><b><a style="font-size:13px; "  href="index.php?cat=usr&op=show&id=' .$data['uid']. '">'  .$data['username'] . '</a> '.$myuser.'</b>
							</br>
							
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
							<td style="width: 25%;"></td>
							<td style="width: 25%;">'.$data['user_mobtelno'].'</td>
							<td style="width: 25%;">'.$data['user_email'].'</td>
							<td style="width: 25%;">'.$user_comment.'</td>
							</tr>
							</tbody>
							</table>
					      ';
			
				$qr_result2 = mysql_query("SELECT * FROM user_to_firm WHERE active=1 AND user_id=".$data['uid']) or die(mysql_error());
			
			
			$i2=1;
			
			while($data2 = mysql_fetch_array($qr_result2)){ 
			
			$user_firm2 = GetFirmName($data2['firm_id']);
		
			if (($data2['comment'])!='') 
			{
				$user_comment2 = '<span style="padding:1px; background-color:#eee;">'.$data2['comment'].'</span>';
			}else
			{
				$user_comment2='';
			}
					
			# фирмы юзера и контакты в фирме
			echo '
			
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
							<td style="width: 25%;"><p class="sub_content">'.$user_firm2.' </p></td>
							<td style="width: 25%;">'.$data2['tel'].'</td>
							<td style="width: 25%;">'.$data2['email'].'</td>
							<td style="width: 25%;">'.$user_comment2.'</td>
							</tr>
							</tbody>
							</table>
			
			';
			
			}
			
				echo'</td>
						</tr>
					</tbody>
				</table>
		
		
		
';
		
	echo'	</div>';
		
			
	}

mysql_query($query, $link);
mysql_close($link);
}
?>
