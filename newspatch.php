<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>C9 the Ultimate Action ขีดสุดความยิ่งใหญ่แห่งเกมออนไลน์</title>
    <meta property="og:title" content="C9Wap">
	<meta property="og:type" content="article">
	<meta property="og:url" content="http://www.c9wap.com">
	<meta property="og:image" content="http://i.imgur.com/VT9UVit.jpg">
	<meta property="og:site_name" content="C9 the Ultimate Action ขีดสุดความยิ่งใหญ่แห่งเกมออนไลน์">
	<meta name="description" content="::C9:: (Continent of the Ninth) เกม Next Gen ระดับ S CLASS เปิดตัวเวปไซต์พร้อม VDO แอคชั่นสุดมันส์" >
        <meta name="keywords" content="C9, เกมออนไลน์, Continent of the Ninth, c9, MMORPG,ซีไนน์, เกมส์, ออนไลน์, เกมออนไลน์, เกมส์ออนไลน์, Game, Games, Online Game, MMO, Free-play, เล่นฟรี">  

	<meta property="article:author" content="www.c9wap.com">
	<meta property="article:publisher" content="www.c9wap.com">
    
    <link rel="stylesheet" href="patch/style.css">
	
</head>
<body style="overflow:hidden; height: 360px; width:750px;">

    <div class="slide">
        <iframe src="patch/slide/index.html" width="398" height="162" frameborder="0"></iframe>
    </div>
    
    <div class="boxnews">
        
        <?php
include ('cp/connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '4';
	
	$count=0;
	
	$Qtotal = mysql_query("select * from tb_news");
	$total = mysql_num_rows($Qtotal);
	
	$Qall = mysql_query("SELECT * FROM tb_news WHERE news_type='1' OR news_type='2' OR news_type='3' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalall = mysql_num_rows($Qall);
	
	$Qnews = mysql_query("SELECT * FROM tb_news WHERE news_type='1' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalnews = mysql_num_rows($Qnews);
	
	
	$Qevent = mysql_query("SELECT * FROM tb_news WHERE news_type='2' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalevent = mysql_num_rows($Qevent);
	
	$Qupdate = mysql_query("SELECT * FROM tb_news WHERE news_type='3' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalupdate = mysql_num_rows($Qupdate);
	
	//$page=$_GET['page'];

?>
<?php
while($r=mysql_fetch_array($Qall)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];

$sql="select * from tb_type where type_id='$news_type' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_id=$r['type_id'];
	$type_name=$r['type_name'];
	

$count++;

$bgColor1="white";
$bgColor2="#f0ffdb";

$bgColor = (($count%2) == 0) ? $bgColor2 : $bgColor1; 

	if(!isset($page)){
		$page = 1;
		}
		
$numid=$count+(($page-1)*10);

$time=date('d-m-Y', strtotime($news_date));

$time=date('d.m.Y', strtotime($news_date));

    
    if($type_id=="1"){
			$style="blue";
		}else if($type_id=="2"){
			$style="green";
		}else if($type_id=="3"){
			$style="orange";
		}
    
    echo"

     <a href='http://www.c9wap.com/news.php?id=$news_id' target='_blank'><div class='listnews'>
                        <span class='ui type $style mini label' style='color:$style !important;'>$type_name</span>";
     echo mb_substr(strip_tags($news_name), 0, 35, 'UTF-8') . ' ';
    echo"
                        <span class='ui black date mini label' style='margin-top:-20px;'>$time</span>
                        </div></a>
    
    ";

}


?>
        
    </div>
    
    <div class="topmenu">
            
            <a href="http://www.c9wap.com/index.php" target="_blank"><div class="bt-top"><img src="patch/bt-01-home.png"></div></a>
            
            <a href="http://www.c9wap.com/register.php" target="_blank"><div class="bt-top"><img src="patch/bt-02-regis.png"></div></a>
            
            
            <a href="http://www.c9wap.com/member-login.php" target="_blank"><div class="bt-top"><img src="patch/bt-05-topup.png"></div></a>
            
            
        </div>
<script>
window.onscroll = function () {
window.scrollTo(0,0);
}
</script>    

</body>

</html>