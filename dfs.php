<!DOCTYPE html >


<?php
include "main_page.php";

?>


<?php
include 'connect.php';
if(isset($_POST['com_submit']))
{
	$user=$_SESSION['name'];
	$comment=$_POST['comm'];
	$sql="INSERT INTO dfs_comment VALUES('','$user','$comment')";
	if(mysql_query($sql))
	{
		header('location:dfs.php');
	}
}


?>


<html>
	<head>
		<title>
			ডেপথ ফার্স্ট সার্চ (ডিএফএস)
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
	</head>	
	<body>

		<div id="body_des_dfs">
			<br>
			<h1 style="margin-left:20px;color:#003300;"><?php  $xml=simplexml_load_file("show_tag.xml");  echo $xml->algo[1]->name;  ?></h1>
			<p><?php $xml=simplexml_load_file("show_tag.xml");  echo $xml->algo[1]->tag->val.": ".$xml->algo[1]->tag->tag_name[0].", ".$xml->algo[1]->tag->tag_name[1];   ?></p>
			<br>

			<p>আগের পর্বগুলো পড়ে থাকলে হয়তো ডেপথ ফার্স্ট সার্চ বা ডিএফএস এতদিনে নিজেই শিখে ফেলেছো। তারপরেও এই টিউটোরিয়ালটি পড়া দরকার কিছু কনসেপ্ট জানতে।</p>
			<p><a href="bfs.php">বিএফএস</a> এ আমরা গ্রাফটাকে লেভেল বাই লেভেল সার্চ করেছিলাম,নিচের ছবির মতো করে:</p>
			<div align="center">
				<img src="dfs1.png">
			</div>
			<p>এবার আমরা কোনো নোড পেলে সাথে সাথে সে নোড থেকে আরো গভীরে চলে যেতে থাকবো,যখন আর গভীরে যাওয়া যাবেনা তখন আবার আগের নোডে ফিরে এসে অন্য আরেক দিকে যেত চেষ্টা করবো,এক নোড কখনো ২বার ভিজিট করবোনা। আমরা নোডের ৩টি রং(কালার) দিবো:</p>
			<div>
				<pre style="margin-left:20px; background:#CCCC66;margin-right:20px;">সাদা নোড= যে নোড এখনো খুজে পাইনি/ভিজিট করিনি।
গ্রে বা ধুসর নোড= যে নোড ভিজিট করেছি কিন্তু নোডটি থেকে যেসব চাইল্ড নোডে যাওয়া যায় সেগুলো এখনো
ভিজিট করে শেষ করিনি,অর্থাত নোডটিকে নিয়ে কাজ চলছে।
কালো নোড= যে নোডের কাজ সম্পূর্ণ শেষ।</pre>
			</div>

			<p>এবার আমরা ধাপগুলো দেখতে পারি:</p>
			<div align="center" style="margin-left:100px;margin-right:100px;">
				<img src="dfs2.png">
			</div>
			<br>
			<div align="center" style="margin-left:100px;margin-right:100px;" >
				<img src="dfs3.png">
			</div>
			<br>
			<div align="center" style="margin-left:100px;margin-right:100px;">
				<img src="dfs4.png">
			</div>

			<p>আশা করি ডিএফএস কিভাবে কাজ করে এটা পরিস্কার,খুব সহজ জিনিস এটা। এবার আমরা একটা খুব গুরুত্বপূর্ণ টার্ম শিখবো,সেটা হলো ব্যাকএজ(backedge)। লক্ষ করো ৫-১ কে ব্যাকএজ বলা হয়েছে। এর কারণ হলো তখনও ১ এর কাজ চলছে,৫ থেকে ১ এ যাওয়া মানে এমন একটা নোড ফিরে যাওয়া যাকে নিয়ে কাজ এখনো শেষ হয়নি,তারমানে অবশ্যই গ্রাফে একটি সাইকেল আছে। এ ধরনের এজকে ব্যাকএজ বলে,dfs এ যদি কোনো সময় একটি গ্রে নোড থেকে আরেকটি গ্রে নোডে যেতে চেষ্টা করে তাহলে সে এজটি ব্যাকএজ এবং গ্রাফে অবশ্যই সাইকেল আছে। dfs এর সোর্স নোড এবং নোড ভিজিট করার অর্ডার এর উপর নির্ভর করে সাইকেলে যে কোনো এজকে ব্যাকএজ হিসাবে পাওয়া যেতে পারে,যেমন ১ থেকে আগে ২ এ না গিয়ে ৫ এ গেলে পরে ২-১ কে ব্যাকএজ হিসাবে পাওয়া যেতো।</p>
			<p>আর যখন আমরা স্বাভাবিক ভাবে গ্রে থেকে সাদা নোডে যাচ্ছি তখন সে এজগুলোকে বলা হয় ট্রি এজ। শুধুমাত্র ট্রি এজ গুলো রেখে বাকি এজগুলো মুছে দিলে যে গ্রাফটা থাকে তাকে বলা হয় ডিএফএস ট্রি।</p>
			<p>আনডিরেক্টেড গ্রাফের ক্ষেত্রে আগে ভিজিট করা কোনো নোডে ফিরে গেলেই সেটা ব্যকএজ,কালার চেক না করলেও হয়। তবে ডিরেক্টেড গ্রাফের ক্ষেত্রে অবশ্যই করতে হবে। পরের ছবিটা দেখো:</p>

			<div align="center" style="margin-left:100px;margin-right:100px;">
				<img src="dfs5.png">
			</div>
			<p>২-৩এর এজটাকে ব্যাকএজ বলা যাচ্ছেনা,কারণ ৩ এর কাজ আগেই শেষ হয়ে গেছে।</p>
			<p>প্রতিটা নোড আর এজ নিয়ে একবার করে করছি, dfs এর কমপ্লেক্সিটি O(V+E)।</p>
			<div style="margin-left:20px;margin-right:20px;">
				<textarea readonly  rows="14" cols="100" type="text">1. DFS(G,v)   ( v is the vertex where the search starts )
2. Stack S := {};   ( start with an empty stack )
3. for each vertex u, set visited[u] := false;
4. push S, v;
5. while (S is not empty) do
6. u := pop S;
7. if (not visited[u]) then
8. visited[u] := true;
9. for each unvisited neighbour w of u
10. push S, w;
11. end if
12. end while
13. END DFS()
				</textarea>

			</div>
			<p>এটাই ডিএফএস এর সুডোকোড </p>

			<div style="margin-left:20px; margin-right:20px">
			<form action="dfs.php" method="POST">
				<table cellspacing="5" cellpadding="5">
					<tr>
						<td><a href="#"><p style="margin-left:0px; margin-right:0px;" ><?php echo $_SESSION['name']; ?></p></a> </td>
						<td><textarea name="comm" rows="7" cols="50" placeholder="Add comment here..."></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input name="com_submit" value="Post" type="submit" style="margin-left:330px"></td>
					</tr>
				</table>
			</form>
			</div>
			<p>
			<?php

			$getquery=mysql_query("SELECT * FROM dfs_comment ORDER BY id ASC");
			while($row=mysql_fetch_array($getquery))
			{
				$username=$row['name'];
				$comm=$row['comment'];
				echo "<p style=\"color:#3300CC;\">".$username.":</p><p>".$comm."<br/></p>"."<hr width=850px/>"."<br/>";

			}


			?>
			</p>



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