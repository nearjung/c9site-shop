<?php include"script-head.php";?>
<?php
include ('cp/connect.php');

	$result=mysql_query("select * from tb_page where page_id='".$api->cl("1")."'");
	$r=mysql_fetch_assoc($result);
	
$page_id = $r['page_id'];
$page_name = $r['page_name'];
$page_detail = $r['page_detail'];
?>



<?php include"topbar.php"; ?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">Download</div>
            
            <div class="inner">
                
                <?php
		echo str_replace("../upload/files","upload/files",$page_detail);
		?>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>