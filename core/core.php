<?php

# VAR
$important_style = 'style="border:1px solid #FF6666;"';

# Вычисляем возраст человека
function calculate_age($birthday) {
  $birthday_timestamp = strtotime($birthday);
  $age = date('Y') - date('Y', $birthday_timestamp);
  if (date('md', $birthday_timestamp) > date('md')) {
    $age--;
  }
  return $age;
}

# Получаем название фирмы по ID
function GetFirmName($id) {
	if ($id >0)
	{
		$res = mysql_result(mysql_query("SELECT firm_name FROM firms WHERE firm_id=".$id." LIMIT 1"),0);
	}
	else
	{
			$res = "";
	}
	return $res;
}

# Получаем HASH юзера по ID
function GetUserHash($id) {
	if ($id >0)
	{
		$res = mysql_result(mysql_query("SELECT password FROM users WHERE uid=".$id." LIMIT 1"),0);
	}
	else
	{
			$res = "";
	}
	return $res;
}

# Получаем имя пользователя по ID
function GetUserName($id) {
	if ($id >0)
	{
		$res = mysql_result(mysql_query("SELECT username FROM users WHERE uid=".$id." LIMIT 1"),0);
	}
	else
	{
			$res = "";
	}
	return $res;
}

# Получаем роль пользователя по ID
function GetUserRole($id) {
	if ($id >0)
	{
		$res = mysql_result(mysql_query("SELECT user_role FROM users WHERE uid=".$id." LIMIT 1"),0);
	}
	else
	{
			$res = "";
	}
	return $res;
}

# Преобразуем дату Y-m-d -> d.m.Y
function GetDateFormat_dmY($date){
	if ($date>0)    
	{
		$dateformat = @date_format(date_create_from_format('Y-m-d',$date), 'd.m.Y');
	}
	else 
	{	
		$dateformat = '';
	}
	return $dateformat;
}

# Преобразуем дату Y-m-d H:i:s -> d.m.Y H:i
function GetDateFormat_dmY_Hi($date){
	if ($date>0)    
	{
		$dateformat = @date_format(date_create_from_format('Y-m-d H:i:s',$date), 'd.m.Y H:i');
	}
	else 
	{	
		$dateformat = '';
	}
	return $dateformat;
}
?>