<?php
#users
if (isset($_GET['id']) && is_numeric($_GET['id'])){
				$sql = mysql_query("SELECT * FROM users WHERE uid =".$_GET['id']."  LIMIT 1");
				$row = mysql_fetch_array($sql);
				echo "<div class='block_submenu'>������������� ������ ������������ <b><a href='users.php?&op=show&id=".$_GET['id']."'>".$row['username']. "</a></b></div>";
					#���� ��� �������� ������ ������������, �� ����� �����
					if ($UserID == $_GET['id']){
						printf("<form action='action.php?act=edit&id=".$_GET['id']."&hash=".$row['password']."' method='post' name='forma'>
						<fieldset>
						<p style='color:red';><label for='username'>��� ������������*:</label><p/><p><input type='text' name='username' size='50' value='%s'></p>
						<p style='color:red';><label for='password0'>������� ������:</label><p/><p><input type='text' name='password0' size='30' value='%s'></p>
						<p style='color:red';><label for='password1'>����� ������:</label><p/><p><input type='text' name='password1' size='30' value='%s'></p>
						<p style='color:red';><label for='password2'>��������� ������:</label><p/><p><input type='text' name='password2' size='30' value='%s'></p>",$row['username'],'', $row['password1'], $row['password2']);
						
						$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
						$result = mysql_query($query) or die(mysql_error());
						
								mysql_free_result($result);
						print ('</p></select></td>');
						printf("<!-- <p><label for='user_post'>���������:</label><p/><p><input type='text' name='user_post' size='50' value='%s'></p>
						<p><label for='user_email'>e-mail:</label><p/><p><input type='text' name='user_email' size='30' value='%s'></p>
						<p><label for='user_role'>����:</label><p/><p><input type='text' name='user_role' size='30' value='%s'></p>
						<p><label for='user_telno'>�������:</label><p/><p><input type='text' name='user_telno' size='30' value='%s'></p>
						<p><label for='user_mobtelno'>���.�������:</label><p/><p><input type='text' name='user_mobtelno' size='30' value='%s'></p>
						<p><label for='user_contacts'>������������� ��������:</label><p/><p><textarea cols='60' rows='5' name='user_contacts' value='%s'></textarea></p>
						<p><label for='user_comment'>�����������:</label><p/><p><textarea cols='60' rows='5' name='user_comment' value='%s'></textarea></p>-->
						</fieldset>
						<br/>
						<fieldset>
						<input id='submit' type='submit' value='������������� ������'>
						<br/>
						</fieldset>
						</form>", $row['user_firm'], $row['user_post'], $row['user_email'], $row['user_role'], $row['user_telno'], $row['user_mobtelno'], $row['user_contacts'], $row['user_comment']);
					}
					else {	
						# ���� �������� ������� ������������, �� ����� ��� ��������� ������.	
						printf("<form action='action.php?act=edit&id=".$_GET['id']."' method='post' name='forma'>
						<fieldset>
						<p style='color:red';><label for='username'>��� ������������*:</label><p/><p><input type='text' name='username' size='50' value='%s'></p>",$row['username']);
						$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
						$result = mysql_query($query) or die(mysql_error());
					
						mysql_free_result($result);
						print ('</p></select></td>');
						printf("
						<!--<p><label for='user_post'>���������:</label><p/><p><input type='text' name='user_post' size='50' value='%s'></p>
						<p><label for='user_email'>e-mail:</label><p/><p><input type='text' name='user_email' size='30' value='%s'></p>
						<p><label for='user_role'>����:</label><p/><p><input type='text' name='user_role' size='30' value='%s'></p>
						<p><label for='user_telno'>�������:</label><p/><p><input type='text' name='user_telno' size='30' value='%s'></p>
						<p><label for='user_mobtelno'>���.�������:</label><p/><p><input type='text' name='user_mobtelno' size='30' value='%s'></p>
						<p><label for='user_contacts'>������������� ��������:</label><p/><p><textarea cols='60' rows='5' name='user_contacts' value='%s'></textarea></p>
						<p><label for='user_comment'>�����������:</label><p/><p><textarea cols='60' rows='5' name='user_comment' value='%s'></textarea></p>-->
						</fieldset>
						<br/>
						<fieldset>
						<input id='submit' type='submit' value='������������� ������'>
						<br/>
						</fieldset>
						</form>", $row['user_post'], $row['user_email'], $row['user_role'], $row['user_telno'], $row['user_mobtelno'], $row['user_contacts'], $row['user_comment']);
					}	
				mysql_query($query, $link);
				mysql_close($link);
			}

?>