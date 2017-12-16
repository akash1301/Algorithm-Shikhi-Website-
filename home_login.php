<!DOCTYPE html >


<?php
session_start();

if(isset($_COOKIE['name'])) {
	$_SESSION['name']=$_COOKIE['name'];
	header('location:home_logout.php');
}



?>


<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>
			Algorithm Blog
		</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head	
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

		<div>
				<ul id="nav">
					<li><a href="#">প্রথম পাতা</a></li>
					<li><a href="#">নাম্বার থিওরি</a></li>
					<li><a href="#">গ্রাফ থিওরি</a></li>
					<li><a href="#">অন্যান্য</a></li>
					<li><a href="login.php">লগইন </a></li>
					<li><a href="register.php">রেজিস্টার  </a></li>  
				</ul>
		</div>



		<div id="body_des">
			<br>
			<h1 style="margin-left:60px">এলগরিদম সমূহ </h1>

			<ul>
				<li>নাম্বার থিওরি</li>
				<ul>
					<li>প্রাইম জেনারেটর (Sieve of Eratosthenes)</li>
					<li>মডুলার অ্যারিথমেটিক</li>
				</ul>
				<br>
				<li>গ্রাফ থিওরি</li>
				<ul>
					<li>ব্রেথড ফার্স্ট সার্চ (বিএফএস)</li>
					<li>ডেপথ ফার্স্ট সার্চ (ডিএফএস)</li>
				</ul>
				<br>
				<li>অন্যান্য </li>
				<ul>
					<li>বাইনারি সার্চ</li>
				</ul>

			</ul>

			<br>

			<p align="center"><font color="gray">তোমাকে তোমার কাজ দিয়ে নয়,বিচার করা হবে কাজের পেছনের নিয়ত দিয়ে- আল হাদিস।</font></p>
			<br>
		</div>


	</body>
	
</html>