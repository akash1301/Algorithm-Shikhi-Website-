<!DOCTYPE html >

<?php
include "main_page.php";

?>



<html>
	<head>
		<title>
			সার্চ 
		</title>

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

		<script>
			function showhint(str) {
    			if (str.length == 0) { 
        		document.getElementById("txtHint").innerHTML = "";
        		return;
    			} else {
        		var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
            			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                		document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            		}
        		};
        		xmlhttp.open("GET", "showsearch.php?q=" + str, true);
        		xmlhttp.send();
    			}	
			}
</script>

	</head>
	
	<body>

		<div id='body_des_bfs'>
		<br>
		<br>
		<div style="margin-left:40px;margin-right:40px;">
			<form>
				<input type="text" style="width:375px;height:50px;border-radius: 10px;font-size:30px;" placeholder="Search by tag" onkeyup="showhint(this.value)">
			</form>
			<span id="txtHint">

			</span>

		</div>
		<br>
		<br>
		<br>
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