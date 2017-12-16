

<?php
session_start();

if(!isset($_SESSION['name']) && !isset($_SESSION['password']) && !isset($_SESSION['name']))
	header('location:login.php');
if(!isset($_SESSION['name']))
	header('location:login.php');

if(!isset($_COOKIE['name']) && isset($_SESSION['password']) && isset($_SESSION['name']))
{
	unset($_SESSION['name']);
	unset($_SESSION['password']);
	header('location:login.php');
}

if(isset($_COOKIE['name']) && !isset($_SESSION['password']) && !isset($_SESSION['name']))
{
	unset($_SESSION['name']);
	unset($_SESSION['password']);
	header('location:login.php');
}

if(isset($_GET['action']) && $_GET['action']=='logout'){
	unset($_SESSION['name']);

	setcookie('name','',0,"/");
	//setcookie('password','',0,"/");
	header('location:login.php');
}

?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		
		<link href="style.css" rel="stylesheet" type="text/css"/>
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
		<div>
				<ul id="nav">
					<li><a href="home_logout.php">প্রথম পাতা</a></li>
					<li><a href="#">নাম্বার থিওরি</a>
						<ul >
							<li><a href="prime.php">প্রাইম জেনারেটর</a></li>
							<li><a href="modular.php">মডুলার অ্যারিথমেটিক</a></li>
						</ul>
					</li>
					<li><a href="#">গ্রাফ থিওরি</a>
						<ul>
							<li><a href="bfs.php">ব্রেথড ফার্স্ট সার্চ</a></li>
							<li><a href="dfs.php">ডেপথ ফার্স্ট সার্চ</a></li>
						</ul>
					</li>
					<li><a href="#">অন্যান্য</a>
						<ul>
							<li><a href="binary_search.php">বাইনারি সার্চ</a></li>
						</ul>
					</li>
					<li><a href="search.php">সার্চ </a></li>
					<li><a href="home_logout.php?action=logout">লগ আউট  </a></li>
					<li><a >হ্যালো,  <?php echo $_SESSION['name'];?></a> </li>
				</ul>
		</div>

	</body>

</html>