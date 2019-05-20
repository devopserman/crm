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
	$sql_sort = 'ORDER BY firm_datetime_edit DESC';
	echo '<a href="index.php?cat=frm&op=main&sort=new">По алфавиту</a> | <b>По новизне</b>';
	
	}
	
if ($sort<>'desc') 
	{
		$sql_sort = 'ORDER BY firm_name ASC';
		echo '<b>По алфавиту</b> | <a href="index.php?cat=frm&op=main&sort=desc">По новизне</a>';
		}
	echo '</p>';
	
	


$qr_result = mysql_query("
	SELECT * FROM firms 
	WHERE firm_active = '1'  ".$sql_sort) or die(mysql_error());
	
	
	$i=1;
	
	while($data = mysql_fetch_array($qr_result)){ 
			
		
		
			if (($data['firm_comment'])!='') 
			{
				$firm_comment = '<span style="padding:1px; background-color:#eee;">'.$data['firm_comment'].'</span>';
			}else
			{
				$user_comment='';
			}
			
			if ($data['my_firm']=='1')
			{
			$myfirm = '<img src="images/star_icon.png" width="12px"/>';	
			}else{$myfirm='';}
			
			
			if ($data['firm_inn']=='')
				{$firm_inn = '';}
			else
				{$firm_inn = '<p class="sub_content">ИНН: '.$data['firm_inn'].'</p>';}
			
			if ($data['black_list']=='0')
				{$black_list = '';}
			else
				{$black_list = '<img src="images/black_list.jpg" width="16px" align="top"/>';}
			
			if ($data['firm_datetime_edit']=='')
				{$update = '';}
			else
				{$update = '<p class="mess_date" align="right" >Обновлено: '.GetDateFormat_dmY_Hi($data['firm_datetime_edit']).'</p>';}
			
			# Юзер и его личные контакты.
			echo '<div class="select">';
		
			
				echo'<table border="0" style="border-collapse: collapse; width: 100%;">
					<tbody>
						<tr>
							<td  style="width: 32px; vertical-align: top;"><div class="iconfolder"><img src="images/firm.png"/></div></td>
							<td style="width: auto;">
							
							
							<table border="0" style="border-collapse: collapse; width: 100%;">
							<tbody>
							<tr>
								<td style="width: 50%;"><b><a style="font-size:13px; "  href="index.php?cat=frm&op=show&id=' .$data['firm_id']. '">'  .$data['firm_name'] . '</a> '.$myfirm.' '.$black_list.'</b></td>
								
								<td style="width: 50%;">'.$update.'</td>
							</tr>
							<tr>
								<td style="width: 50%;">'.$firm_inn.'</td>
								
								<td style="width: 50%;">'.$firm_comment.'</td>
							</tr>
							</tbody>
							</table>
					      ';
			
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
