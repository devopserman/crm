<?php
session_start();
# '.$module_name.'
$module_name = "products";

include "../auth.php";  
#���� �����������	
if(USER_LOGGED) {
$act = $_GET['act'];  
switch ($act) 
{ 
			# ���������� ������ ������
	case 'add' :
			mysql_select_db($dbname, $link);
			$product_name = $_POST['product_name'];
			$product_group = $_POST['product_group'];
			$product_comment = $_POST['product_comment'];
			
			if ($product_name <> NULL) {
			$sql = 'REPLACE INTO products (product_name, product_group, product_comment) 
			VALUES("'.$product_name.'","'.$product_group.'","'.$product_comment.'")';
			
			

			
			 if(!mysql_query($sql))
 			{$m = 'err';} 
	 			else
	 			{$m = 'add';}
			
			}
			else { echo '<font color="red">���� �� ����������* ������ ���� ���������!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
			# �������������� ������ � ������	
	case 'edit'	:
			if (isset($_GET['id']) && is_numeric($_GET['id'])){
			
			$sql = mysql_query("SELECT * FROM products WHERE product_id =".$_GET['id']."  LIMIT 1");
			$id = $_GET['id'];
			$product_name = $_POST['product_name'];
			$product_group = $_POST['product_group'];
			$product_comment = $_POST['product_comment'];
			
			if ($product_name <> NULL) {
			$update_sql = "UPDATE products SET product_name='$product_name', product_group='$product_group', product_comment='$product_comment' WHERE product_id='$id'";
			
			mysql_query($update_sql) or die("������ �������" . mysql_error());
						$m = 'edit';
							}
							else {$m = 'err';
							echo '<font color="red">���� �� ����������* ������ ���� ���������!</font>';	
						}
			}
				mysql_query($query, $link);
				mysql_close($link);
		break;

			# �������� �����		
	case 'del'	:
				if (isset($_GET['id']) && is_numeric($_GET['id'])){
					$id=$_REQUEST['id'];
					$qr_result = "UPDATE products SET product_active='0' WHERE product_id='$id'";
					mysql_query($qr_result) or die("������ �������" . mysql_error());
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
        case 'add' : echo '<p>������ ���������!</p>'; break;  
		case 'edit' : echo '<p>������ ���������������!</p>'; break;  
		case 'del' : echo '<p>������ �������!</p>'; break;  
				case 'err' : echo '<p>�������� ������! ��������� ������ � ��������� ��������.</p>'; break;  
       
}  

echo '<p><a href="../'.$module_name.'/'.$module_name.'.php">��������� �����</a></p></div>';
}
include "../footer.php";
?>
