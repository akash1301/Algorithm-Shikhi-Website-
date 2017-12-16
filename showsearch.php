<?php
session_start();
$a[] = "bfs";
$a[] = "dfs";
$a[] = "graph";
$a[] = "number theory";
$a[] = "math";
$a[] = "sieve";
$a[] = "binary search";
$a[] = "modular arithmetic";
$a[] = "search";
$a[] = "prime";
$a[] = "big mod";


$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                if($name==="bfs"){
                    $v="<h2>ব্রেথড ফার্স্ট সার্চ (বিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: graph, <b>bfs</b> </p>";
                    $hint = "<a href=\"bfs.php\">".$v."</a>".$xx;
                }
                else if($name==="dfs")
                {
                    $v="<h2>ডেপথ ফার্স্ট সার্চ (ডিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: graph, <b>dfs</b> </p>";
                    $hint = "<a href=\"dfs.php\">".$v."</a>".$xx;
                }
                else if($name==="graph")
                {
                    $v="<h2>ব্রেথড ফার্স্ট সার্চ (বিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>graph</b>, bfs </p>";
                    $hint = "<a href=\"bfs.php\">".$v."</a>".$xx;
                }
                else if($name==="number theory")
                {
                    $v="<h2>প্রাইম জেনারেটর (Sieve of Eratosthenes)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>number theory</b>, math, sieve, prime </p>";
                    $hint = "<a href=\"prime.php\">".$v."</a>".$xx;
                }
                else if($name==="math")
                {
                    $v="<h2>প্রাইম জেনারেটর (Sieve of Eratosthenes)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: number theory, <b>math</b>, sieve, prime </p>";
                    $hint = "<a href=\"prime.php\">".$v."</a>".$xx;
                }
                else if($name==="sieve")
                {
                    $v="<h2>প্রাইম জেনারেটর (Sieve of Eratosthenes)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: number theory, math, <b>sieve</b>, prime </p>";
                    $hint = "<a href=\"prime.php\">".$v."</a>".$xx;
                }
                else if($name==="prime")
                {
                    $v="<h2>প্রাইম জেনারেটর (Sieve of Eratosthenes)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: number theory, math, sieve, <b>prime</b> </p>";
                    $hint = "<a href=\"prime.php\">".$v."</a>".$xx;
                }
/*                else if($name==="modular arithmetic")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>math</b>, number theory, big mod, <b>modular arithmetic</b> </p>";
                    $hint = "<a href=\"modular.php\">".$v."</a>".$xx;
                }*/
                else if($name==="big mod")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: math, number theory, <b>big mod</b> </p>";
                    $hint = "<a href=\"modular.php\">".$v."</a>".$xx;
                }
                else if($name==="search")
                {
                    $v="<h2>বাইনারি সার্চ</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: binary search, <b>search</b> </p>";
                    $hint = "<a href=\"binary_search.php\">".$v."</a>".$xx;
                }
                else if($name==="binary search")
                {
                    $v="<h2>বাইনারি সার্চ</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>binary search</b>, search </p>";
                    $hint = "<a href=\"binary_search.php\">".$v."</a>".$xx;
                }
                //}
                //$hint = "<a href=\"after_search.php?pp\"+".$yy.">".$v."</a>".$xx;
                if($name==="graph")
                {
                    $v="<h2>ডেপথ ফার্স্ট সার্চ (ডিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>graph</b>, dfs </p>";
                    $hint .= "<br><a href=\"dfs.php\">".$v."</a>".$xx;
                }
                else if($name==="number theory")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: math, <b>number theory</b>, big mod </p>";
                    $hint .= "<br><a href=\"modular.php\">".$v."</a>".$xx;
                }
                else if($name==="math")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>math</b>, number theory, big mod </p>";
                    $hint .= "<br><a href=\"modular.php\">".$v."</a>".$xx;
               }

            } 
            else {
                if($name==="bfs"){
                    $v="<h2>ব্রেথড ফার্স্ট সার্চ (বিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: graph, <b>bfs</b> </p>";
                    $hint .= "<br><a href=\"bfs.php\">".$v."</a>".$xx;
                }
                else if($name==="dfs")
                {
                    $v="<h2>ডেপথ ফার্স্ট সার্চ (ডিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: graph, <b>dfs</b> </p>";
                    $hint .= "<br><a href=\"dfs.php\">".$v."</a>".$xx;
                }
                else if($name==="graph")
                {
                     $v="<h2>ডেপথ ফার্স্ট সার্চ (ডিএফএস)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>graph</b>, dfs </p>";
                    $hint .= "<br><a href=\"dfs.php\">".$v."</a>".$xx;
                }
                else if($name==="number theory")
                {
                    $v="<h2 style=\"font-size:10px;\">মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: math, <b>number theory</b>, big mod </p>";
                    $hint .= "<br><a href=\"modular.php\">".$v."</a>".$xx;
                }
                else if($name==="math")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>math</b>, number theory, big mod </p>";
                    $hint .= "<br><a href=\"modular.php\">".$v."</a>".$xx;
                }
                else if($name==="sieve")
                {
                    $v="<h2>প্রাইম জেনারেটর (Sieve of Eratosthenes)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: number theory, math, <b>sieve</b>, prime </p>";
                    $hint .= "<br><a href=\"prime.php\">".$v."</a>".$xx;
                }
                else if($name==="prime")
                {
                    $v="<h2>প্রাইম জেনারেটর (Sieve of Eratosthenes)</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: number theory, math, sieve, <b>prime</b> </p>";
                    $hint .= "<br><a href=\"prime.php\">".$v."</a>".$xx;
                }
/*                else if($name==="modular arithmetic")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>math</b>, number theory, big mod, <b>modular arithmetic</b> </p>";
                    $hint .= "<br><a href=\"modular.php\">".$v."</a>".$xx;
                }*/
                else if($name==="big mod")
                {
                    $v="<h2>মডুলার অ্যারিথমেটিক</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: math, number theory, <b>big mod</b></p>";
                    $hint .= "<br><a href=\"modular.php\">".$v."</a>".$xx;
                }
                else if($name==="search")
                {
                    $v="<h2>বাইনারি সার্চ</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: binary search, <b>search</b> </p>";
                    $hint .= "<br><a href=\"binary_search.php\">".$v."</a>".$xx;
                }
                else if($name==="binary search")
                {
                    $v="<h2>বাইনারি সার্চ</h2>";
                    $xx="<p style=\"margin-left:0px;font-size:20px;\">Tag: <b>binary search</b>, search </p>";
                    $hint .= "<br><a href=\"binary_search.php\">".$v."</a>".$xx;
                }
                //$hint .= "<br><a href=\"after_search.php?pp\"+".$yy.">".$v."</a>".$xx;
            }
        }
    }
}


echo $hint === "" ? "<br><b>No Suggestion</b>" : $hint;
?>