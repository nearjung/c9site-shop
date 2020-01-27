<?php
include ('cp/connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '5';
	
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

<div class="news">
        	<div id="i_containTab">
                <ul id="navi_containTab">
                    <li class="tab tabNavi1 active"><span class="glyphicon glyphicon-list-alt"></span> All</li>
                    <li class="tab tabNavi2"><span class="glyphicon glyphicon-file"></span> Notice</li>
                    <li class="tab tabNavi3"><span class="glyphicon glyphicon-gift"></span> Event</li>
                    <li class="tab tabNavi4"><span class="glyphicon glyphicon-map-marker"></span> Update</li>
                </ul>
                <ul id="detail_containTab">
                
                <li class="detailContent1 animated fadeIn">
<?php
while($r=mysql_fetch_array($Qall)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];

$result = mysql_query("select * from tb_type where type_id='".$api->cl($news_type)."'");
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

     <a href='news.php?id=$news_id'><div class='listnews'>
                        <span class='ui type $style mini label'>$type_name</span>";
     echo mb_substr(strip_tags($news_name), 0, 35, 'UTF-8') . ' ';
    echo"
                        <span class='ui black date mini label'>$time</span>
                        </div></a>
    
    ";

}


?>
<div class="clearfix"></div>
<span style="float:right;margin-left:10px;margin-right:10px;">
        <a href="all-news.php">อ่านเพิ่มเติม +</a>
    </span>
                    </li>
                
                <li class="detailContent2 animated fadeIn">
<?php
while($r=mysql_fetch_array($Qnews)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];

$result = mysql_query("select * from tb_type where type_id='".$api->cl($news_type)."'");
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

     <a href='news.php?id=$news_id'><div class='listnews'>
                        <span class='ui type $style mini label'>$type_name</span>";
     echo mb_substr(strip_tags($news_name), 0, 35, 'UTF-8') . ' ';
    echo"
                        <span class='ui black date mini label'>$time</span>
                        </div></a>
    
    ";

}


?>
<div class="clearfix"></div>
<span style="float:right;margin-left:10px;margin-right:10px;">
        <a href="all-notice.php">อ่านเพิ่มเติม +</a>
    </span>
                    </li>
                    
                    <li class="detailContent3 animated fadeIn">
                    	<?php
while($r=mysql_fetch_array($Qevent)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];


$result = mysql_query("select * from tb_type where type_id='".$api->cl($news_type)."'");
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

     <a href='news.php?id=$news_id'><div class='listnews'>
                        <span class='ui type $style mini label'>$type_name</span>";
     echo mb_substr(strip_tags($news_name), 0, 35, 'UTF-8') . ' ';
    echo"
                        <span class='ui black date mini label'>$time</span>
                        </div></a>
    
    ";

}


?>
<div class="clearfix"></div>
<span style="float:right;margin-left:10px;margin-right:10px;">
        <a href="all-event.php">อ่านเพิ่มเติม +</a>
    </span>

                    </li>
                    <li class="detailContent4 animated fadeIn">
<?php
while($r=mysql_fetch_array($Qupdate)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];


$result = mysql_query("select * from tb_type where type_id='".$api->cl($news_type)."'");
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

     <a href='news.php?id=$news_id'><div class='listnews'>
                        <span class='ui type $style mini label'>$type_name</span>";
     echo mb_substr(strip_tags($news_name), 0, 35, 'UTF-8') . ' ';
    echo"
                        <span class='ui black date mini label'>$time</span>
                        </div></a>
    
    ";

}


?>
<div class="clearfix"></div>
<span style="float:right;margin-left:10px;margin-right:10px;">
        <a href="all-update.php">อ่านเพิ่มเติม +</a>
    </span>
                    </li>
                    
                    
                </ul>
            </div>
        </div>