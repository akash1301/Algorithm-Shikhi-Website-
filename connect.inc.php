<?php

$host='localhost';
$user='root';
$pass='';

$db='data_base';

if(!mysql_connect($host,$user,$pass) || !mysql_select_db($db))
{
	die(mysql_error());
}

?>