<?php
#users
if (isset($_GET['id']) && is_numeric($_GET['id'])){
				$sql = mysql_query("SELECT * FROM users WHERE uid =".$_GET['id']."  LIMIT 1");
				$row = mysql_fetch_array($sql);
				
				echo "<div class='block_submenu'><p class='caption'>".$row['username']. "</p>
				<h4><a href='/firms/firms.php?op=show&id=".$row2["firm_id"]."'>".$row2['firm_name']."</a></h4>
					</div>";
					
						# Если карточка другого пользователя, то форма без изменения пароля.	
						printf("<form action='action.php?act=edit&id=".$_GET['id']."' method='post' name='forma'>
						<fieldset>
						<table>
							<tbody>
						<tr><td><p style='color:red';><label for='username'>Имя пользователя*:</label><p/></td><td><p><input type='text' name='username' size='50' value='%s'></p>",$row['username']);
						
									#Если это карточка самого пользователя, то такая форма
										if ($UserID == $_GET['id']){
											echo("<p><a href='users.php?op=edit_pass&id=".$UserID."'>Изменить пароль</a></p>");	}
										else{}	
						
						
						echo '</td></tr>	<tr><td>';
						
						echo '</select></td></tr>	';
						echo'
						<tr><td><label for="user_dob">Дата рождения:</label></td><td><input type="text" name="user_dob" size="30" value="'.$row['user_dob'].'"></td></tr>	
						<tr><td><label for="user_mobtelno">Моб.телефон:</label></td><td><input type="text" name="user_mobtelno" size="30" value="'.$row['user_mobtelno'].'"></td></tr>	
						<tr><td><label for="user_email">e-mail:</label></td><td><input type="text" name="user_email" size="30" value="'.$row['user_email'].'"></td></tr>	
						<tr><td><label for="user_comment">Комментарий:</label></td><td><textarea cols="60" rows="5" name="user_comment" value="'.$row[user_comment].'"></textarea></td></tr>	
							</tbody>
						</table>
						</fieldset>
						<br/>
						<fieldset>
						<input id="submit" type="submit" value="Редактировать запись">
						<br/>
						</fieldset>
						</form>';
						
				mysql_query($query, $link);
				mysql_close($link);
			}

?>