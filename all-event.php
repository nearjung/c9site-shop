<?php
include ('cp/connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '20';
	
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
	
	$page=$_GET['page'];

?>

<?php include"script-head.php";?>

<?php include"topbar.php"; ?>

<?php include"menunews.php"; ?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">Event</div>
            
            <div class="inner">
                
                <?php
while($r=mysql_fetch_array($Qevent)){
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

     <a href='news.php?id=$news_id'><div class='listnews'>
                        <span class='ui type $style mini label'>$type_name</span>";
     echo mb_substr(strip_tags($news_name), 0, 35, 'UTF-8') . ' ';
    echo"
                        <span class='ui black date mini label'>$time</span>
                        </div></a>
    
    ";

}


?>
                
                <div class="pagenav">
<?php

 
echo"<center>";

$page = ceil($total/$limit);

echo "ทั้งหมด $page หน้า :";

for($i=1;$i<=$page;$i++){
	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
	echo " <a href='?id=0&start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
	} else {
	echo " <a href='?id=0&start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
	}
}
echo"</center>";
echo "<br />";

?>
</div>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>