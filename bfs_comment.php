<?php
session_start();
include "connect.php";
if(isset($_POST['submit']))
{
	$user=$_SESSION['name'];
	$comment=$_POST['comm'];
	$sql="INSERT INTO binary_comment VALUES('','$user','$comment')";
/*	if(mysql_query($sql))
	{
		header('location:binary_search.php');
	}*/
}

?>