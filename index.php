<?php
session_start();

include ("auth.php");
include ("core/core.php");
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML>
    <HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<link href="/css/style.css" rel="stylesheet" type="text/css" />
		
			<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
			<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
			<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="/js/search.js"></script>
			<script src="/js/f5.js"></script>	
			
			<TITLE></TITLE>
    </HEAD>
<BODY>';
if(USER_LOGGED) {

echo '

	<table border="0" style="border-collapse: collapse; width: 960px;">
		<tbody>
			<tr>
			<td style="width: 100%;">
				<table border="0" style="border-collapse: collapse; width: 100%;">
					<tbody>
					<tr>
							<td style="width: 100%;">';
#header
							include ("header.php");
							echo '</td>
					</tr>
					</tbody>
				</table>
				<table border="0" style="border-collapse: collapse; width: 100%;">
					<tbody>
					<tr>
							<td style="width: 100%;">';
#menu							
							include ("menu.php");
							echo '</td>
					</tr>
					</tbody>
				</table>
				<table border="0" bgcolor="#fff" style="border-collapse: collapse; width: 100%;">
					<tbody>
					<tr>
							<td style="padding:7px; width: auto;vertical-align: top;"><div class="block_content">';
#content	
							include ("content.php");
							echo '</div></td>
							<td class="block_submenu" style="width: 250px;vertical-align: top;">';
#submenu						
							include ("submenu.php");
							echo '</td>
					</tr>
					</tbody>
				</table>
				<table border="0" style="border-collapse: collapse; width: 100%; height: 18px;">
					<tbody>
					<tr style="height: 18px;">
							<td style="width: 33.3333%; height: 18px;">';
#footer						
							include ("footer.php");
							echo '</td>
					</tr>
					</tbody>
				</table>
			</td>
			</tr>
		</tbody>
	</table>';


}
#autorizate please
else{
	echo'
	<table border="0" style="border-collapse: collapse; width: 764px;">
		<tbody>
			<tr>
			<td style="width: 100%;">
			';
	include 'logpls.php';}
		echo '</td>
			</tr>
		</tbody>
	</table>
	';
	
	
	echo'
			</BODY>';
?>