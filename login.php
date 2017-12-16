
<?php
session_start();
//require 'connect.inc.php';

include "connect.php";



if(isset($_COOKIE['name'])){
	$_SESSION['name']=$_COOKIE['name'];
	header('location:home_logout.php');
}

if(isset($_POST['submit']))
{
	$username=$_POST['fname'];
	//$_SESSION['name']=$username;
	$pass=$_POST['password'];

	$sql="SELECT * FROM user WHERE username='$username' AND password='$pass'";
	$result=mysql_query($sql);
	$val=0;
	while($row = mysql_fetch_array($result))
	{
		if(($row['password']==$pass) && ($row['username']==$username))
		{
			$_SESSION['name']=$row['username'];
			$ses=$_SESSION['name'];
			if(isset($_POST['rem']))
			{
				setcookie("name",$ses,time() + (15),"/");
				$_SESSION['password']=$pass;
			}
			$val=1;
			header('location:home_logout.php');
			die();
		}
	}

	header('location:login.php?q=1');

}

?>


<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>Log-in</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript">
		function vall()
		{
			if(fff.fname.value=="" || fff.password.value=="" )
			{
				alert("Fill-up all the section");
				fff.password.focus();
				return false;
			}
			return true;
		}
		</script>

	</head>

<body>

	<div id="header">
			<div id="head">
				<br>
				<h1 id="head_val" >এলগরিদম শিখি </h1> 
				<p id="head_qut">Learn and Code On!!!</p>
			</div>
			<div id="head_img">
				<img src="imgg.jpg" width="622" height="155">
			</div>
		</div>
<br>
<br>
<br>
<br>
<form name="fff" method="POST" style="text-align: center; color:#DDD; margin-left:500px">
	<table style="text-align:center; color:#DDD; font-size:25px" cellpadding="5" cellspacing="5"> 
		<tr>
			<td>User-name</td>
			<td><input style="border-radius: 5px;" name="fname" type="text" placeholder="User-name" pattern="[A-Z]*[a-z]*" title="Only Alphabet and space allowed"  ></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input style="border-radius: 5px;"  name="password" type="password" placeholder="Enter password" ></td>
		</tr>
		<tr>
			<td></td>
			<td style="font-size:20px"><input style="border-radius: 5px; margin-right:0px" name="rem" type="checkbox">   Remember-me</td>
		</tr>
		<tr>
			<td></td>
			<td><input style="border-radius: 5px; margin-right:100px" name="submit" type="submit" value="Log-in" onclick="return vall();"> </td>
		</tr>
	</table>
</form>

<p style="margin-left:600px;color:#DDD">New user? <a href="register.php" style="text-decoration:none;color:#66ff66;">register</a> here</p>


</body>
</html>