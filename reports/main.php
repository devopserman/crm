<?php
session_start();
# Модуль проектов

include "auth.php";  

			#ЕСЛИ авторизован	
			if((USER_LOGGED) and ($UserRole>=100)) {
			
				$select = $_GET['select'];
				
					if ($select == 'all') {
						$subsel = '  ';
					} else
					{
						$subsel = ' WHERE result =1 ';
					}
			
							$qr_result = mysql_query("SELECT * FROM reports ".$subsel." ORDER BY datetime DESC") or die(mysql_error());
							
							

							echo '<h2>Сообщения о проблемах</h2>';
							while($data = mysql_fetch_array($qr_result)){ 
								
										$id = $data['id'];								
								#дата время		
										$datetime = date_format(date_create_from_format('Y-m-d H:i:s',$data['datetime']), 'd.m.Y H:i');							
								#автор
										$author=GetUserName($data['author']);
								#страница		
										$page = $data['page'];	
								#сообщение
										$mess = $data['message'];
								#результат		
										$res = $data['result'];
										if ($res==1)
											{
												$c1 = '#FFCCCC';
												$c2 = '#FF9999';
											}
											else
											{
												$c1 = '#CCFFCC';
												$c2 = '#99FF99';
											}
							
										echo '
											
												<div class="select">
												
													<table border="0" style="border-collapse: collapse; width: 100%;" cellpadding="7">
														<tbody>
															<tr>
																<td style="width: 20%;" bgcolor="'.$c2.'"><b>('.$id.') <a href="index.php?cat=usr&op=show&id='.$data['author'].'">' .$author.'</b></td>
																<td style="width: 80%;" bgcolor="'.$c1.'"><a href="'.$page.'">'.$page.'</a></td>
															</tr>
															<tr>
																<td style="width: 20%;" bgcolor="'.$c2.'" valign="bottom">'.$datetime.'</br>
																';
																														
																
																echo'</td>
																<td style="width: 80%;" bgcolor="'.$c1.'">'.$mess.'
																<div align="right">';
																	
																if ($res==1){echo '<p ><a style="color:#0066CC	; padding:4px; background-color:#ddd; border: 1px solid #999;" href="index.php?cat=rep&op=confirm&id='.$id.'">Закрыть</a></p>';}															
																if ($res==0){echo '<p ><a style="color:#0066CC	; padding:4px; background-color:#ddd; border: 1px solid #999;" href="index.php?cat=rep&op=noconfirm&id='.$id.'">К рассмотрению</a></p>';}	
																
																echo'</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											
										';
							}
			}	
?>