<?php
session_start();

include ("auth.php");

if(USER_LOGGED) { 
    if(!check_user($UserID)) logout(); 
?>

<table border="0" bgcolor="#fff" style="border-collapse: collapse; width: 100%;">
	<tbody>
		<tr>
			<td style="width: 50%;"><p><a href="/index.php"><img height="48px" src="/images/crm_logo.png" valign="middle" /></a></p></td>
			
			<td style="width: 50%;">
			
			
				<table border="0" style="border-collapse: collapse; width: 100%;">
				<tbody>
				<tr>
				<td style="width: 100%;"><p align="right";>Здравствуйте, <b><a href="index.php?cat=usr&op=show&id=<?php echo $UserID.'">'.$UserName.'</a>! <a href="?logout"><img valign="bottom" width="20px" src="images/logout.png" /></a><!--Ваш уровень доступа: <b>'.$UserRole.'--></b>'; ?></p></td>
				</tr>
				<tr>
				<td style="width: 100%;">
				<table border="0" style="border-collapse: collapse; width: 100%;">
				<tbody>
				<tr>
				<td style="width:75%;" align="right"><?php 

				if ($UserRole>10) {
					
					$count = mysql_fetch_assoc(mysql_query('SELECT count(*) AS total FROM reports WHERE result=1'));
					
					echo '<a href="index.php?cat=rep"><span style="font-size:11px;">Сообщения ';
						if ($count['total'] >0) {
						echo '<span style="color: #fff; padding: 3px; background-color:#f00;">'.$count['total'].'</span></span>';}
						echo '</a>';
				}

				?></td>
				<td style=""><span align="right" width="100px;">
				<div align="right" class="outer"><a href=""><span style="font-size:11px;">Сообщить о проблеме</style></a>
				
					<div class="inner" background-color="#fff"><div class="note_grey">
						<form method="post" action="index.php?cat=rep&op=newreport" width="400px"> 
							<table border="0" style="border-collapse: collapse; width: 100%;" bgcolor="#fff">
								<tbody>
									<tr>
									<!--<td style="width: 20%;"><img src="images/ops.png" width="90px"></td>-->
									<td style="width: 100%;" valign="top">
										<table border="0" style="border-collapse: collapse; width: 100%;">
											<tbody>
												<tr>
													<td  style="width: 100%;" align="center"><b>Сообщить о проблеме на странице</b>
												</tr>
												<tr>
													<td style="width: 100%;" align="center">
														<textarea cols="45" rows="2" placeholder="Скопируйте сюда сообщение об ошибке" name="reppage" id="f5" ></textarea>
													</td> 
												</tr>
												<tr>
													<td style="width: 100%;" align="center"><textarea cols="45" rows="5" placeholder="Вставьте сюда сообщение об ошибке или описание проблемы" name="report_mess"></textarea></td>
												</tr>
												<tr>
													<td style="width: 100%;" align="right"><input type="submit" value="Отправить"></td>
												</tr>
											</tbody>
										</table>
									</td>
									</tr>
								</tbody>
							</table>	
						</form>
					</div>
				
				</div>

			</span></td>
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				</tbody>
				</table>
			
			
			
			

			
			</td>
		</tr>
	</tbody>
</table>


<div class="block_top">



<?php
}
else { ?>


<?php
}
?>
