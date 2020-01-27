<?php
session_start();

if(!isset($_SESSION['user'])) {
	header('Location: index.php');
	die();
}

include ('connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '10';
	
	$count=0;
	
	$Qtotal = mysql_query("select * from tb_news");
	$total = mysql_num_rows($Qtotal);
	
	$Query = mysql_query("SELECT * FROM tb_news ORDER BY news_id DESC LIMIT $start,$limit");
	$totalp = mysql_num_rows($Query);
	
	$page=$_GET['page'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include"script-head.php";?>
</head>

<body onLoad="java script:history.go(1);" class="bodycp">
<div class="container">
<?php include "header.php"; ?>
<?php
	$id_edit=$_GET[id_edit];
	
	$sql="select * from tb_news where news_id='$id_edit' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$news_id=$r[news_id];
	$news_name=$r[news_name];	
	$news_type=$r[news_type];
	$news_detail=$r[news_detail];
	$news_img=$r[news_img];

?>

    <div class="box" style="margin-top:-10px;">

      <form class="form-horizontal" method="post" action="edit-news2.php"enctype="multipart/form-data">
  
  <legend>จัดการหมวดข่าว</legend>
  
  <p class="text-right"><a href="cp-news.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-plus"></span> เพิ่มข่าว</a></p>
  
  <p><strong style="color:orange">&raquo; แก้ไขข่าว</strong></p>

    
    <label for="name">ชื่อข่าว :</label><br />
	<input name="name"  type="text" class="form-control" id="name" placeholder="" value="<?php echo $news_name?>" /><br />
    <label for="name">หมวดข่าว :</label><br />
	<select class="form-control w400" name="type" id="type" >
    <?php
	$sql="select * from tb_type where type_id='$news_type' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_id=$r['type_id'];
	$type_name=$r['type_name'];
	echo"
    <option value='$type_id'>$type_name</option>";
    ?>
    <?php
	$Qtype = mysql_query("select * from tb_type");
	$totaltype = mysql_num_rows($Qtype);
	
	while($r=mysql_fetch_array($Qtype)){
		$type_id=$r['type_id'];
	$type_name=$r['type_name'];
	echo"
  <option value='$type_id'>$type_name</option>";
	}
  ?>
</select><br />
<!--
<?php
	if($news_img != " "){
	echo "<img src='../images/news/$news_img' border=0>";
	echo "<br><br><input type='checkbox' name='chkdel' id='chkdel' value='Y'> ลบภาพนี้<br>";
	} 
else {
	echo "<input type='file' name='fileupload' >";
	echo "<p class='help-block'>ระบบจะปรับความกว้างเป็น 600*310 px อัตโนมัติ (ปรับขนาดมาพอดีจะสวยกว่าเยอะนะแจ๊ะ)</p>";
	}
	?>
-->
    
<br />


    <label for="detail">รายละเอียดข่าว :</label><br />
	 <textarea id="detail" name="detail" cols="45" rows="10" class="ckeditor"><?php echo $news_detail?></textarea>
     
     <br />
    
    <input type="hidden" name="id_edit" value="<?php echo $id_edit?>">
    <input type="hidden" name="delimg" id="delimg" value="<?php echo $news_img?>">
    <input type="hidden" name="news_img" id="slide_img" value="<?php echo $news_img?>">
  <button type="submit" class="btn btn-default">ตกลง</button>
  
</form>
      
      <hr />
      <p><strong>มีข่าวทั้งหมด : <?php echo $total?> ข่าว</strong></p>
<table align="center" cellpadding="10" cellspacing="0" width="600px" class="table table-bordered table-hover">
<tr style="color:black; font-weight:bold; text-align:center;" class="info">
	<td width="7%">ลำดับที่</td>
    <td width="35%">ภาพข่าว</td>
    <!--<td width="35%">ข่าว</td>-->
    <td width="15%">หมวดข่าว</td>
    <td width="7%">แก้ไข</td>
    <td width="7%">ลบ</td>
 </tr>

<?php
while($r=mysql_fetch_array($Query)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];

$sql="select * from tb_type where type_id='$news_type' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_name=$r['type_name'];
	
	

$count++;

$bgColor1="white";
$bgColor2="#f0ffdb";

$bgColor = (($count%2) == 0) ? $bgColor2 : $bgColor1; 

	if(!isset($page)){
		$page = 1;
		}
		
$numid=$count+(($page-1)*10);

echo"
 <tr >
 	<td align='center' >$numid</td>
	<!--<td><img src='../images/news/$news_img' border=0 class='img-thumbnail'></td>-->
    <td>$news_name</td>
	<td>$type_name</td>
    <td align='center'><a href=\"edit-news.php?id_edit=$news_id\"><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button></a></td>
    <td align='center'><a href=\"del-news.php?id_del=$news_id\" onclick=\"return confirm('คุณต้องการลบจริงหรือไม่')\"><button class='btn btn-default'><span class='glyphicon glyphicon-remove'></span></button></a></td>
</tr>";

}

mysql_close();

?>
  </table>
<?php
 echo"<br />";
 
echo"<center>";

$page = ceil($total/$limit);

echo "ทั้งหมด $page หน้า :";

for($i=1;$i<=$page;$i++){
	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
	echo " <a href='?start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
	} else {
	echo " <a href='?start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
	}
}
echo"</center>";
echo "<br />";

?>

    </div>
</div>
    <?php include"footer.php";?>
</div>
</body>
</html>