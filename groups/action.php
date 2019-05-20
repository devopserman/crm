<?php
session_start();
# '.$module_name.'
$module_name = "groups";

include "../auth.php";  
#ЕСЛИ авторизован	
if(USER_LOGGED) {
$act = $_GET['act'];  
switch ($act) 
{ 
			# Добавление нового товара
	case 'add' :
			mysql_select_db($dbname, $link);
			$product_group_name = $_POST['product_group_name'];
					
			if ($product_group_name <> NULL) {
			$sql = 'REPLACE INTO products_group (product_group_name) 
			VALUES("'.$product_group_name.'")';
			
			

			
			 if(!mysql_query($sql))
 			{$m = 'err';} 
	 			else
	 			{$m = 'add';}
			
			}
			else { echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
			# Редактирование данных о товаре	
	case 'edit'	:
			if (isset($_GET['id']) && is_numeric($_GET['id'])){
			
			$sql = mysql_query("SELECT * FROM products_group WHERE group_id =".$_GET['id']."  LIMIT 1");
			$id = $_GET['id'];
			$product_group_name = $_POST['product_group_name'];
			
			if ($product_group_name <> NULL) {
			$update_sql = "UPDATE products_group SET product_group_name='$product_group_name' WHERE group_id='$id'";
			
			mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
						$m = 'edit';
							}
							else {$m = 'err';
							echo '<font color="red">Поле со звездочкой* должно быть заполнено!</font>';	
						}
			}
				mysql_query($query, $link);
				mysql_close($link);
		break;

			# Удаление фирмы		
	case 'del'	:
				if (isset($_GET['id']) && is_numeric($_GET['id'])){
					$id=$_REQUEST['id'];
					$qr_result = "UPDATE products_group SET product_group_active='0' WHERE group_id='$id'";
					mysql_query($qr_result) or die("Ошибка вставки" . mysql_error());
					$m = 'del';	
				}
				mysql_query($query, $link);
				mysql_close($link);
		break;
			
			

}

include "../header.php";
echo '<div class="block1">';
switch ($m)  
{  
        case 'add' : echo '<p>Запись добавлена!</p>'; break;  
		case 'edit' : echo '<p>Запись отредактирована!</p>'; break;  
		case 'del' : echo '<p>Запись удалена!</p>'; break;  
				case 'err' : echo '<p>Возникла ошибка! Проверьте данные и повторите операцию.</p>'; break;  
       
}  

echo '<p><a href="../'.$module_name.'/'.$module_name.'.php">Вернуться назад</a></p></div>';
}
include "../footer.php";
?>
