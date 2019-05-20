<?php 
#main product
 /*
  if(!defined("IN_ADMIN")) die;  */
$module_name = "products";

$op = $_GET['op'];  
$id = $_GET['id'];
$page = $_GET['p'];

$per_page = $product_per_page;

if (isset($_GET['page'])) $page1=($_GET['page']-1); else $page1=0;
$start=abs($page1*$per_page);


	#ЕСЛИ авторизован
if(USER_LOGGED) {$sql = mysql_query("SELECT * FROM products WHERE product_active=1 LIMIT $start,$per_page") or die(mysql_error());
	
	echo '<table class="cool">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>#</th>';
	echo '<th>Артикул</th>';
	echo '<th width="200px">Наименование</th>';
	echo '<th>Группа</th>';
	echo '<th>Кол-во</th>';
	echo '<th>Цена</th>';
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
		echo '<td width="100">'. $data['product_id'].'</td>';
		// Наименование товара
		echo '<td><a href="../'.$module_name.'/'.$module_name.'.php?op=show&id=' .$data['product_id']. '">'. $data['product_name'] . '</a></td>';

	/*	//подсчет кол-ва сотрудников в фирме
		$result = mysql_query("SELECT count(*) FROM products WHERE user_active=1 AND user_firm=".$data['firm_id']) or die(mysql_error());
		$row2=mysql_fetch_row($result);
		$total_users=$row2[0];
		echo '<td><a href="/users/users.php?op=main&firm='.$data['firm_id'].'">' .$total_users. '</a></td>';
		mysql_free_result($result);
	*/	
		//Группа
		if ($data['product_group']>0){
			$query_parrent = "SELECT * FROM products_group WHERE group_id=".$data['product_group']." GROUP BY product_group_name ORDER BY product_group_name LIMIT 1";
										$result_group = mysql_query($query_parrent) or die(mysql_error());
										$row_product_group = mysql_fetch_array($result_group);
		echo '<td><a href="../groups/groups.php?op=show&id=' .$row_product_group['group_id']. '">'. $row_product_group['product_group_name'] . '</a></td>';}else{echo '<td></td>';}
		
		echo '<td></td>';
		echo '<td></td>';
		
		
		
echo '</tr>';

	}
	
    echo '</tbody>';
	echo '</table>';

	
	
	
	
	
echo '<div>';

$res=mysql_query("SELECT count(1),p.*, g.product_group_name FROM products p  LEFT JOIN products_group g ON g.group_id = p.product_group ") or die(mysql_error());
$row=mysql_fetch_row($res);
$total_rows=$row[0];
$num_pages=ceil($total_rows/$per_page);

echo 'Показано <b>'.$per_page.'</b> записей из <b>'.$total_rows.'</b><br/>Страница: <b>'.($page+1).'</b><br /><p class="pages">';


for($j=1;$j<=$num_pages;$j++) {
	if ($j<>$page1+1) echo ' <a href="'.$_SERVER['PHP_SELF'].'?page='.$j.'">'.$j. "</a>\n";
	else echo $j;
}
echo '</p><br />';


echo '</div>';





mysql_query($query, $link);

mysql_close($link);
}

?>