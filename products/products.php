<?php
session_start();
# ������ �������
$module_name = "products";

include "../auth.php";  
include "../header.php";
			#���� �����������	
			if(USER_LOGGED) {
				// �������� �������� op �� URL  
				$op = $_GET['op'];  
				$id = $_GET['id'];
				$page = $_GET['p'];
				echo '
					<div class="block_submenu">
					<p><a href="'.$module_name.'.php?op=add">�������� �����</a>';
						if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
							/*echo ' / <a href="?op=edit&id='.$id.'">������������� ������</a>';*/
							echo ' / <a href="?op=del&id='.$id.'">������� ������</a></p>';
							} 
						else {}
						echo '</div><div class="block1">';
	// �������� ������ ��� ��������  
	switch ($op)  
	{  
        case 'main' : include "main.php"; break;  
        case 'del' : include "del.php"; break;  
        case 'edit' : include "edit.php"; break;  
        case 'add' : include "add.php"; break;  
        //case 'show' : include "show.php"; break;  
		//��� ��������� �������� ����� ����������� �������� ��������������. ����� �� ���� ����� ���� ������� ������
		case 'show' : include "edit.php"; break;  
		
        default :  include "main.php";  
	}  

				}else{include '../logpls.php';}

				echo '</div>';
	
include ("../footer.php");?>