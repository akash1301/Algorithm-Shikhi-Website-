<!DOCTYPE html >

<?php
//session_start();
include "main_page.php";

?>



<html>
<head>
	<title>Algorithm Blog</title>
	<script type="text/javascript" src="jquery00.js"></script>
	<script type="text/javascript" src="ticker00.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#slide').list_ticker({
			speed:6000,
			effect:'slide'
		});		
	})
	</script>
</head>

<body>



		<div id="body_des">
			<br>
			<h1 style="margin-left:60px">এলগরিদম সমূহ </h1>

			<ul>
				<li><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[0]->name;  ?></li>
				<ul>
					<li><a href="prime.php"><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[0]->sub_topic[0];  ?></a></li>
					<li><a href="modular.php"><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[0]->sub_topic[1];  ?></a></li>
				</ul>
				<br>
				<li><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[1]->name;  ?></li>
				<ul>
					<li><a href="bfs.php"><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[1]->sub_topic[0];  ?></a></li>
					<li><a href="dfs.php"><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[1]->sub_topic[1];  ?></a></li>
				</ul>
				<br>
				<li><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[2]->name;  ?></li>
				<ul>
					<li><a href="binary_search.php"><?php $xml=simplexml_load_file("show_tag.xml"); echo $xml->topic[2]->sub_topic[0];  ?></a></li>
				</ul>

			</ul>


			<br>
			
			<div id="main" align="center">
				<ul id="slide">
					<li>A real warrior never quits.</li>
					<li>তোমাকে তোমার কাজ দিয়ে নয়,বিচার করা হবে কাজের পেছনের নিয়ত দিয়ে- আল হাদিস। </li>
					<li>Your past does not define you,it is what you choose to be now.</li>
					<li>Journey of thousand miles begins with a single step.</li>
					<li>Dream on!!!</li>
				</ul>
			</div>
			<br>
		</div>


	</body>
	
</html>