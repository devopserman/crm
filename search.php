 <?php #header('Content-Type: text/html; charset=utf-8');
#session_start();

include ("auth.php");

/* $search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
 $searchcat = $_GET['searchcat'];

   if($search == ''){
      exit("");
   }
  
   switch ($searchcat)  
			{
	   
	   
			case 'frm':    		
								$query = mysql_query("SELECT * FROM firms WHERE firm_name LIKE '%".$search."%' ORDER BY firm_name LIMIT 20");
								if(mysql_num_rows($query) > 0){
								   $sql = mysql_fetch_array($query);
								   do{
									 echo "<div style='display:block;'>".$sql['firm_name']."</div>";
									 $dd=$sql['firm_id'];
								   }while($sql = mysql_fetch_array($query));
								}else{echo "0 results";} 
								break;
			case 'prj':    		
								$query = mysql_query("SELECT * FROM projects WHERE pr_name LIKE '%".$search."%'");
								if(mysql_num_rows($query) > 0){
								   $sql = mysql_fetch_array($query);
								   do{
									 echo "<div style='display:block;'>".$sql['pr_name']."</div>";
								   }while($sql = mysql_fetch_array($query));
								}else{echo "0 results";} 
								break;
			case 'usr':    		
								$query = mysql_query("SELECT * FROM users WHERE username LIKE '%".$search."%'");
								if(mysql_num_rows($query) > 0){
								   $sql = mysql_fetch_array($query);
								   do{
									 echo "<div style='display:block;'>".$sql['username']."</div>";
								   }while($sql = mysql_fetch_array($query));
								}else{echo "0 results";} 
								break;
		   }
?>  */

if(!empty($_POST["referal"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));

	$db_referal = mysql_query("SELECT firm_name, firm_id FROM firms WHERE firm_name LIKE '%".$referal."%' ORDER BY firm_name LIMIT 20");
	while($row = mysql_fetch_array($db_referal)) {
		echo "<li data-firm-id=\"" . $row['firm_id'] ."\">".$row['firm_name']."</li>";
    }

}

?> 