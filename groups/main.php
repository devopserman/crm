<?php 
#main product
 /*
  if(!defined("IN_ADMIN")) die;  */
$module_name = "groups";

$op = $_GET['op'];  
$id = $_GET['id'];
$page = $_GET['p'];

$per_page = $product_per_page;

if (isset($_GET['page'])) $page1=($_GET['page']-1); else $page1=0;
$start=abs($page1*$per_page);


	#ЕСЛИ авторизован
if(USER_LOGGED) {$sql = mysql_query("SELECT * FROM products_group WHERE product_group_active=1 LIMIT $start,$per_page") or die(mysql_error());
	
	echo '<table class="cool">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>#</th>';

	echo '<th width="200px">Группы</th>';
	echo '<th>Статус</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	$i=1;

	
	while($data = mysql_fetch_array($sql)){ 

	$num=$start+$i;
	$i++;
		echo '<tr>';
		//номер по порядку
		echo '<td>'. $num.'</td>';

		// Наименование товара
		echo '<td><a href="../'.$module_name.'/'.$module_name.'.php?op=show&id=' .$data['group_id']. '">'. $data['product_group_name'] . '</a></td>';
		echo '<td>Активна</td>';
		
		
		
		
echo '</tr>';

	}
	
    echo '</tbody>';
	echo '</table>';

	
	
	
	
	






mysql_query($query, $link);

mysql_close($link);
}

?>