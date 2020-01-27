<?php include"script-head.php";?>
<?php
include ('cp/connect.php');


	$id=$_GET['id'];
	
	$result = mysql_query("select * from tb_news where news_id='".$api->cl($id)."'");
	$r = mysql_fetch_assoc($result);
	$news_id=$r['news_id'];
	$news_name=$r['news_name'];	
	$news_img=$r['news_img'];
	$news_detail=$r['news_detail'];
	$news_date=$r['news_date'];
	$news_type=$r['news_type'];
	
$time=date('j F Y, g:i a', strtotime($news_date));

	$result=mysql_query("select * from tb_type where type_id='".$api->cl($news_type)."'");
	$qtype=mysql_fetch_assoc($result);
	
	$type_name=$qtype['type_name'];

?>


<?php include"topbar.php"; ?>

<?php include"menunews.php"; ?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title"><?=$news_name;?></div>
            
            <div class="inner">
                
        <?php
		echo str_replace("../upload/files","upload/files",$news_detail);
		?>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>