<?php
session_start();
#messages

include "../auth.php";  
#���� �����������	
if(USER_LOGGED) {
$act = $_GET['act'];  


switch ($act) 
{ 
			# ���������� ������ ���������
	case 'add' :
			mysql_select_db($dbname, $link);
			$mess_author = $UserID;
			
			
	
			if (isset($_GET['firm']) && is_numeric($_GET['firm'])){$mess_firm = $_GET['firm'];} else {$mess_firm = $_POST['mess_firm'];}
			if (isset($_GET['project']) && is_numeric($_GET['project'])){$mess_project = $_GET['project']; } else {$mess_project = $_POST['mess_project'];}





	
			$mess_text = htmlspecialchars($_POST['mess_text']);
			$mess_datetime = date('Y-m-d H:i:s');
			
			
			if ($mess_firm <> NULL) {
			$sql = 'INSERT INTO messages (mess_author, mess_firm, mess_project, mess_text, mess_datetime) 
			VALUES("'.$mess_author.'", "'.$mess_firm.'","'.$mess_project.'", "'.$mess_text.'", "'.$mess_datetime.'")';
			 if(!mysql_query($sql))
 			{$act = 'err';} 
	 			else
	 			{$act = 'add';}
			}
			else { echo '<font color="red">���� �� ����������* ������ ���� ���������!</font>';	}
			mysql_query($query, $link);
			mysql_close($link);
		break;
	
	
			# �������������� ������ � ������������	
	case 'edit'	:
			if (isset($_GET['id']) && is_numeric($_GET['id'])){
			$sql = mysql_query("SELECT * FROM messages WHERE mess_id=".$_GET['id']."  LIMIT 1");
			$id=$_GET['id'];
			
			$mess_author_edit = $UserID;
			$mess_firm = $_POST['mess_firm'];
			$mess_project = $_POST['mess_project'];
			$mess_text = htmlspecialchars($_POST['mess_text']);
			$mess_datetime_edit = date('Y-m-d H:i:s');
			
					if ($mess_firm <> NULL) {
						$update_sql = "UPDATE messages SET mess_author_edit='$mess_author_edit', mess_firm='$mess_firm', mess_project='$mess_project', mess_text='$mess_text', mess_datetime_edit='$mess_datetime_edit' WHERE mess_id=".$_GET['id'];
						mysql_query($update_sql) or die("������ �������" . mysql_error());
						$act= 'edit';
					}
			}
			
		break;

			# �������� ������������		
	case 'del'	:
				if (isset($_GET['id']) && is_numeric($_GET['id'])){
					$id=$_GET['id'];
					$qr_result = "UPDATE messages SET mess_active='0' WHERE mess_id='$id'";
					mysql_query($qr_result) or die("������ �������" . mysql_error());
					$act = 'del';	
				}
				mysql_query($query, $link);
				mysql_close($link);
		break;
			
			

}

include "../header.php";

echo '<div class="block1">';
switch ($act)  
{  
        case 'add' : echo '<p>������ ���������!</p>'; break;  
		case 'edit' : echo '<p>������ ���������������!</p>'; break;  
		case 'del' : echo '<p>������ �������!</p>'; break;  
				case 'err' : echo '<p>�������� ������! ��������� ������ � ��������� ��������.</p>'; break;  
       
}  
}
		echo '<p><a href="../messages/messages.php">��������� �����</a></p></div>';
include "../footer.php";
?>
