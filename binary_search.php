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
	$sql="INSERT INTO binary_comment VALUES('','$user','$comment')";
	if(mysql_query($sql))
	{
		header('location:binary_search.php');
	}
}


?>



<html>
<head>
	<title>বাইনারি সার্চ</title>
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


		<div id="body_des_bfs">
			<br>
			<h1 style="margin-left:20px;color:#003300"><?php $xml=simplexml_load_file("show_tag.xml");  echo $xml->algo[4]->name; ?></h1>
			<p><?php $xml=simplexml_load_file("show_tag.xml");  echo $xml->algo[4]->tag->val.": ".$xml->algo[4]->tag->tag_name[0].", ".$xml->algo[4]->tag->tag_name[1]; ?></p>
			<br>

			<p>তুমি নিশ্চয়ই লক্ষ্য করেছো ডিকশনারিতে লাখ লাখ শব্দ থাকলেও প্রয়োজনীয় শব্দটা খুজে পেতে কখনো খুব বেশি সময় লাগে না। এটার কারণ হলো শব্দগুলো অক্ষর অনুযায়ী সাজানো থাকে। তাই তুমি যদি dynamite শব্দটা ডিকশনারিতে খোজার চেষ্টা করো এবং এলোমেলোভাবে কোনো একটা পাতা খুলে kite শব্দটা খুজে পাও তাহলে তুমি নিশ্চিত হয়ে যেতে পারো যে তুমি যে শব্দটা খোজার চেষ্টা করছো সেটা বাম দিকে কোথাও আছে। আবার যদি তুমি dear শব্দটা খুজে পাও তখন তুমি আর বাম দিকের পাতাগুলোয় খোজার চেষ্টা করবে না। এভাবে অল্প সময়ের মধ্যে ডিকশনারিতে যেকোনো শব্দ খুজে পাওয়া যায়।</p>
			<p>বাইনারি সার্চ হলো অনেকটা এরকম একটা পদ্ধতি যেটা ব্যবহার করে একটা অ্যারে থেকে কোনো একটা তথ্য খুজে বের করা যায়।</p>
			<p>ধরো তোমার কাছে একটা অ্যারেতে অনেকগুলো সংখ্যা আছে এরকম:</p>
			<p style="background:#CCCC66">100,2,10,50,20,500,100,150,200,1000,100</p>
			<p>সংখ্যাগুলো এলোমেলোভাবে সাজানো থাকায় এখান থেকে একটা নির্দিষ্ট সংখ্যা খুজে পাওয়া সহজ না। তুমি যদি অ্যারে থেকে ৫০০ সংখ্যাটা খুজতে চাও তাহলে সবগুলো ইনডেক্সই পরীক্ষা করে দেখতে হবে, এটাকে বলা হয় লিনিয়ার সার্চ। অ্যারের আকার যদি n হয় তাহলে লিনিয়ার সার্চের টাইম কমপ্লেক্সিটি হলো O(n)।</p>
			<p>কিন্তু যদি সংখ্যাগুলো নিচের মত সাজানো থাকে তাহলে খুজে পাওয়া অনেক সহজ হয়ে যায়:</p>
			<p style="background:#CCCC66">2, 10, 20, 50, 100, 100, 100, 150, 200, 500, 1000</p>
			<p>এখন যদি ১৫০ সংখ্যাটা খুজে বের করতে হয় তাহলে আমরা প্রথমে ঠিক মাঝের ইনডেক্সটা পরীক্ষা করবো। প্রথম ইনডেক্স ০ এবং শেষের ইনডেক্স ১০ হলে মাঝের ইনডেক্সটা হলো (০+১০)/২ বা ৫ তম ইনডেক্স।</p>
			<p style="background:#CCCC66">2, 10, 20, 50, 100, <b>100</b>, 100, 150, 200, 500, 1000</p>
			<p>মাঝের ইনডেক্সের সংখ্যাটা ১০০ যা ১৫০ এর থেকে ছোট, আমরা জেনে গেলাম যে সংখ্যাটা ডান পাশে কোথাও আছে, বামের অংশ আমাদের আর দরকার নাই।</p>
			<p style="background:#CCCC66">100, 150, <b>200</b>, 500, 1000</p>
			<p>এখন বাকি অংশটা নিয়ে আবারো একই কাজ করবো। এবার মাঝের ইনডেক্সের সংখ্যাটা হলো ২০০ যেটা ১৫০ এর থেকে বড়। তারমানে ডানের অংশটা আমরা ফেলে দিতে পারি।</p>
			<p style="background:#CCCC66"><b>100</b>, 150</p>
			<p>এবার মাঝের সংখ্যাটা হলো ১০০ যা ১৫০ এর থেকে ছোট। আবারো বামের অংশ ফেলে দিবো, থাকবে শুধু:</p>
			<p style="background:#CCCC66"><b>150</b></p>
			<p>এবার মাঝের ইনডেক্সের সংখ্যাটা হলো ১৫০। তারমানে কাঙ্খিত সংখ্যাটাকে খুজে পাওয়া গেছে।</p>
			<p>বাইনারি সার্চে প্রতিবার অ্যারের ঠিক অর্ধেক অংশ আমরা বাতিল করে দিচ্ছি এবং বাকি অর্ধেক অংশে খুজছি। একটা সংখ্যা n কে সর্বোচ্চ কয়বার ২ দিয়ে ভাগ করা যায় যতক্ষণ না সংখ্যাটা ১ হয়ে যাচ্ছে? উত্তর হলো log2(n)। তাই বাইনারি সার্চে সর্বোচ্চ log2(n) সংখ্যক ধাপের পর আমরা দরকারি সংখ্যাটা খুজে পাবো, কমপ্লেক্সিটি O(log2(n))।</p>
			<p>কিন্তু একটা সমস্যা হলো বাইনারি সার্চ করার আগে অবশ্যই সংখ্যাগুলোকে ছোট থেকে বড় বা বড় থেকে ছোট সাজিয়ে নিতে হবে, এই প্রক্রিয়াটাকে বলা হয় সর্টিং। তুমি যতই চেষ্টা কর না কেন একটা অ্যারে O(nlog2(n)) এর কম কমপ্লেক্সিটি সর্ট করতে পারবে না।* তাহলে কেও বলতে পারে যে সর্ট করতে যে সময় লাগছে তার থেকে অনেক কম সময়ে লিনিয়ার সার্চ করেই আমরা সংখ্যাটা খুজে পেতে পারি, বাইনারি সার্চ কেন করবো? তোমার যদি একটা অ্যারেতে মাত্র ১ বার সার্চ করা দরকার হয় তাহলে কষ্ট করে সর্ট করে বাইনারি সার্চ করার থেকে লিনিয়ার সার্চ করা অনেক ভালো। কিন্তু যদি এমন হয় একটা অ্যারেতে অনেকবার সার্চ করা দরকার হবে? যেমন একটা ডিকশনারিতে বিভিন্ন সময় বিভিন্ন শব্দ খোজা দরকার হয়, সেক্ষেত্রে সর্ট করে রাখাই বুদ্ধিমানের কাজ।</p>
			<p>নিচের পাইথন কোডে বাইনারি সার্চের ইমপ্লিমেন্টেশন দেখানো হয়েছে:</p>

			<div style="margin-left:20px; margin-right=20px;">
				<textarea readonly  rows="20" cols="100" type="text">def search(array, key):
    begin=0
    end=len(array)-1
    index=None
    while begin<=end:
        mid=(begin+end)/2
        if key == array[mid]:
            index=mid #The value is found, save the index.
            break
        elif key > array[mid]: begin=mid+1          #Search the right portion
        elif key < array[mid]: end=mid-1            #Search the left portion
    return index                                    #If the number is not found, index will contain None.


info=[100,2,10,50,20,500,100,150,200,1000,100]
info=sorted(info)
while True:
    key = int(raw_input())
    print search(info,key)</textarea>
			</div>

			<p>উপরের কোডে যদি আমরা ১০০ ইনপুট দেই তাহলে ৫ রিটার্ন করবে, কারণ অ্যারেটা সর্ট করার পর ৫ নম্বর ইনডেক্সে ১০০ আছে। কিন্তু সর্টেড অ্যারের দিকে তাকালে আমরা দেখছি যে ৪,৫,৬ এই সবগুলো ইনডেক্সেই ১০০ আছে। আমরা যদি চাই কোনো সংখ্যা একাধিকবার থাকলে সবথেকে বামের ইনডেক্সটা রিটার্ন করতে, তাহলে কোডটা কিভাবে পরিবর্তন করতে হবে? সেক্ষেত্রে বাইনারি সার্চ ফাংশনটা হবে এরকম:</p>
			<div style="margin-left:20px; margin-right=20px;">
				<textarea readonly  rows="13" cols="100" type="text">def search(array, key):
    begin=0
    end=len(array)-1
    index=None
    while begin<=end:
        mid=(begin+end)/2
        if key ex=mid         #One occurance of the value is found, save the index 
            end== array[mid]:
            ind=mid-1         #Continue searching the left portion after one occurrence is found
        elif key > array[mid]: begin=mid+1
        elif key < array[mid]: end=mid-1
    return index              #Index will contain None if the value is not found</textarea>
			</div>
			<p>শুধুমাত্র ১টা মাত্র লাইন পরিবর্তন করা হয়েছে, এবার কোনো সংখ্যা খুজে পাবার পর খোজা বন্ধ না করে বামের বাকি অংশটুকুতে খুজতে থাকবো।</p>
			<p>আজকের পর্ব এখানেই শেষ । </p>

			<div style="margin-left:20px; margin-right:20px">
			<form action="binary_search.php" method="POST">
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

			$getquery=mysql_query("SELECT * FROM binary_comment ORDER BY id ASC");
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



</html>