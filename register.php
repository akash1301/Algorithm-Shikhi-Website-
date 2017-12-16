
<?php
session_start();
include 'connect.php';

if(isset($_POST['submit']))
{
	$user=$_POST['name'];
	$mail=$_POST['mail'];
	$pass=$_POST['pass'];
	$confirm=$_POST['cpass'];
	
	//if(!empty($user) && !empty($mail) && !empty($pass) && !empty($cpass))
	//{
		if($pass==$confirm)
		{
			$sql="INSERT INTO user VALUES('','$user','$mail','$pass')";
			if(mysql_query($sql))
			{
				$_SESSION['name']=$user;
				header('location:home_logout.php');
			}
			else
			{
				header('location:register.php');
			}
		}
	//}

}

?>


<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>Register</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript">
		function val()
		{
			if(frm.name.value=="" || frm.pass.value=="" || frm.cpass.value=="" || frm.mail.value=="")
			{
				alert("Fill-up all the section");
				return false;
			}
			else if(frm.pass.value != frm.cpass.value)
			{
				alert("Password doesn't match");
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
<form name="frm" method="POST" style="text-align: center; color:#DDD; margin-left:500px">
	<table style="text-align:center; color:#DDD; font-size:25px" cellpadding="5" cellspacing="5"> 
		<tr>
			<td>User-name</td>
			<td><input style="border-radius: 5px;" height="50px" name="name" type="text" placeholder="User-name" pattern="[A-Z]*[a-z]*" title="Only Alphabet and space allowed"  ></td>
		</tr>
		<tr>
			<td>Email-Address</td>
			<td><input style="border-radius: 5px;" name="mail" type="email" placeholder="Enter email" ></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input style="border-radius: 5px;" name="pass" type="password" placeholder="Enter password" ></td>
		</tr>
		<tr>
			<td>Confirm-Password</td>
			<td><input style="border-radius: 5px;" name="cpass" type="password" placeholder="Re-enter password" ></td>
		</tr>
		<tr>
			<td></td>
			<td><input name="submit" type="submit" value="Register" style="margin-right:90px; border-radius: 5px;" onclick="return val();" ></td>
		</tr>
	</table>
</form>

</body>
</html>