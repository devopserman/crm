<?php
#projects	
	include ("prj_show.php");


if (isset($_GET['id']) && is_numeric($_GET['id'])){
  
$sql = "SELECT * FROM projects WHERE pr_active='1' AND pr_id=".$_GET['id'];

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
	
	include ("prj_users.php");
	include ("prj_messadd.php");
	include ("prj_mess.php");
	
}

mysql_free_result($result);

}
mysql_query($query, $link);
mysql_close($link);


?>
