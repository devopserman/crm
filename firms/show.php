<?php
#projects	
	include ("frm_show.php");


if (isset($_GET['id']) && is_numeric($_GET['id'])){
  
$sql = "SELECT * FROM firms WHERE firm_active='1' AND firm_id=".$_GET['id'];

$result = mysql_query($sql)or die(mysql_error());

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}



while ($row = mysql_fetch_assoc($result)) {
	
	include ("frm_users.php");
	include ("frm_projects.php");
	
}

mysql_free_result($result);

}
mysql_query($query, $link);

mysql_close($link);


?>
