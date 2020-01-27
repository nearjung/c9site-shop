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
	
	$Qtotal = mysql_query("select * from tb_slide");
	$total = mysql_num_rows($Qtotal);
	
	$Query = mysql_query("SELECT * FROM tb_slide ORDER BY slide_id DESC LIMIT $start,$limit");
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

    <div class="box" style="margin-top:-10px;">

      <form class="form-horizontal" method="post" action="add-slide.php"enctype="multipart/form-data">
  
  <legend>จัดการสไลด์รูปภาพ</legend>
  
  <p><strong style="color:orange">&raquo; เพิ่มสไลด์</strong></p>
  <label for="name">ชื่อสไลด์ :</label><br />
	<input name="name"  type="text" class="form-control w400" id="name" /><br />
    
    <!--<label for="detail">รายละเอียด (ย่อ) :</label><br />
	<textarea name="detail" rows="3" class="form-control w400" id="detail"  type="text"  /></textarea><br />-->

    <label for="exampleInputFile">File Upload</label>
    <input type="file" name="fileupload">
    <p class="help-block">ระบบจะปรับความกว้างเป็น 720*280px อัตโนมัติ (ปรับขนาดมาพอดีจะสวยกว่าเยอะนะแจ๊ะ)</p>
    
    <label for="link">Link : </label> ไม่มีไม่ต้องใส่<br />
	<input name="link"  type="text" class="form-control w400" id="link" /><br />



  <button type="submit" class="btn btn-default">ตกลง</button>
  
</form>
      
      <hr />
      <p><strong>ภาพสไลด์ทั้งหมด : <?php=$total?> ภาพ</strong></p>
<table align="center" cellpadding="10" cellspacing="0" width="600px" class="table table-bordered table-hover">
<tr style="color:black; font-weight:bold; text-align:center;" class="info">
	<td width="7%">ลำดับที่</td>
    <td width="45%">ภาพสไลด์</td>
    <td width="35%">ชื่อสไลด์</td>
    <td width="7%">แก้ไข</td>
    <td width="7%">ลบ</td>
 </tr>

<?php
while($r=mysql_fetch_array($Query)){
$slide_id = $r['slide_id'];
$slide_img = $r['slide_img'];
$slide_name =$r['slide_name'];
$slide_detail=$r['slide_detail'];

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
    <td><img src='../images/slide/$slide_img' border='0'  class='img-thumbnail'></td>
	<td>$slide_name</td>
    <td align='center'><a href=\"edit-slide.php?id_edit=$slide_id\"><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button></a></td>
    <td align='center'><a href=\"del-slide.php?id_del=$slide_id\" onclick=\"return confirm('คุณต้องการลบจริงหรือไม่')\"><button class='btn btn-default'><span class='glyphicon glyphicon-remove'></span></button></a></td>
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