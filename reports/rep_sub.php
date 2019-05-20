<?php

	#ЕСЛИ авторизован
	$userrole  = GetUserRole($UserID);
	
if((USER_LOGGED) AND ($userrole > 1)) {	

					
echo    '<ul class="sub_menu">
			<li><p><a href="index.php?cat=rep&op=main&select=">На рассмотрении</a></p></li>
			<li><p><a href="index.php?cat=rep&op=main&select=all">Все</li>
		 </ul>	 
';
							
}
?>
