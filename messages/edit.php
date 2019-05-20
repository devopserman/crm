<?php
# messages

if (isset($_GET['id']) && is_numeric($_GET['id'])){
				$sql = mysql_query("SELECT * FROM messages WHERE mess_id=".$_GET['id']."  LIMIT 1");
				$row = mysql_fetch_array($sql);
				echo "<div class='block1'>Редактировать сообщение</div>";
					
						printf("<div class='block1'><form action='action.php?act=edit&id=".$_GET['id']."' method='post' name='forma' border='0'><fieldset>");
						$query = "SELECT * FROM firms WHERE firm_active='1' GROUP BY firm_name ORDER BY firm_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<td><p style="color:red";>Предприятие: <br /><SELECT name="mess_firm" ><option value=""></option>';
								while ($row2 = mysql_fetch_array($result)) { 
										if($row["mess_firm"] == $row2["firm_id"]) {
												print '<option value="'.$row2[firm_id].'" selected >'.$row2[firm_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[firm_id].'">'.$row2[firm_name].'</option>'; 
												}
								} 
						mysql_free_result($result);
						print ('</p></select></td>');
						
						$query = "SELECT * FROM projects WHERE pr_active='1' GROUP BY pr_name ORDER BY pr_name";
						$result = mysql_query($query) or die(mysql_error());
						print '<td><p>Проект: <br /><SELECT name="mess_project" ><option value=""></option>';
								while ($row2 = mysql_fetch_array($result)) { 
										if($row["mess_project"] == $row2["pr_id"]) {
												print '<option value="'.$row2[pr_id].'" selected >'.$row2[pr_name].'</option>'; 
										}
										else{
												print '<option value="'.$row2[pr_id].'">'.$row2[pr_name].'</option>'; 
												}
								} 
						mysql_free_result($result);
						print ('</p></select></td>');
						
						
						print("
						<p><label for='mess_text'>Сообщение:</label><p/><p><textarea cols='60' rows='5' name='mess_text' value='%s'>".$row['mess_text']."</textarea></p>
						</fieldset>
						<br/>
						<fieldset>
						<input id='submit' type='submit' value='Редактировать запись'>
						<br/>
						</fieldset>
						</form></div>");
						
				mysql_query($query, $link);
				mysql_close($link);
			}

?>