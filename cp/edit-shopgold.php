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
	
	$Qtotal = mysql_query("select * from tb_shopgold_item");
	$total = mysql_num_rows($Qtotal);
	
	$Query = mysql_query("SELECT * FROM tb_shopgold_item ORDER BY id DESC LIMIT $start,$limit");
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
	
	$sql="select * from tb_shopgold_item where id='".cl($id_edit)."' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$news_id=$r[id];
	$news_name=$r[item_name];	
	$news_type=$r[id_type];
	$news_detail=$r[item_description];
	$news_img=$r[item_count];
	

?>

    <div class="box" style="margin-top:-10px;">

      <form class="form-horizontal" method="post" action="" >
  
  <legend>จัดการไอเท็ม</legend>
  
  <p class="text-right"><a href="edit-shopgold.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-plus"></span> เพิ่มไอเท็ม</a></p>
  
  <p><strong style="color:orange">&raquo; แก้ไขไอเท็ม</strong></p>

    
    <label for="name">ชื่อไอเท็ม :</label><br />
	<input type="text" class="form-control" name="name" id="name" placeholder="" value="<?php echo $news_name?>" /><br />
    <label for="itemid">รหัสไอเท็ม :</label><br />
	<input type="text" class="form-control" name="itemid" id="itemid" placeholder="" value="<?php echo $r[item_id];?>" /><br />
    <label for="itemcount">จำนวนไอเท็ม :</label><br />
	<input type="text" class="form-control" name="itemcount" id="itemcount" placeholder="" value="<?php echo $r[item_count];?>" /><br />
    <label for="itemprice">ราคา :</label><br />
	<input type="text" class="form-control" name="itemprice" id="itemprice" placeholder="" value="<?php echo $r[item_price] ;?>" /><br />
    <label for="type">หมวดไอเท็ม:</label><br />
	<select class="form-control w400" name="type" id="type" >
    <?php
	$sql="select * from tb_shop_type where id='$news_type' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_id=$r['id'];
	$type_name="".$r['catalog_head']." ".$r['catalog_sub']."";
	echo"
    <option value='$type_id'>$type_name</option>";
    ?>
    <?php
	$Qtype = mysql_query("select * from tb_shop_type");
	$totaltype = mysql_num_rows($Qtype);
	
	while($r=mysql_fetch_array($Qtype)){
		$type_id=$r['id'];
	$type_name= "[".$r['catalog_head']."] ".$r['catalog_sub']."";
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


    <label for="info">รายละเอียดไอเท็ม :</label><br />
	 <textarea id="info" name="info" cols="45" rows="4" class="form-control"><?php echo $news_detail; ?></textarea>
     
     <br />
    
  <input type="submit" name="submit" class="btn btn-default" value="ตกลง" />
</form>
      <?php
	  if($_POST['submit'])
	  {
		  if($id_edit == "")
		  {
			  if(trim($_POST['name']) == "")
			  {
				  popup("กรุณากรอกชื่อไอเท็มด้วยค่ะ");
			  }
			  else if(trim($_POST['itemid']) == "")
			  {
				  popup("กรุณากรอกรหัสไอเท็มค่ะ");
			  }
			  else if(trim($_POST['itemcount']) == "")
			  {
				  popup("กรุณากรอกจำนวนไอเท็มค่ะ");
			  }
			  else if(trim($_POST['itemprice']) == "")
			  {
				  popup("กรุณากรอกราคาไอเท็มค่ะ");
			  }
			  else if(trim($_POST['info']) == "")
			  {
				  popup("กรุณากรอกรายละเอียดไอเท็มค่ะ");
			  }
			  else
			  {
				  $update_sql = mysql_query("INSERT INTO tb_shopgold_item(id_type,item_id,item_name,item_description,item_count,item_price) VALUES('".cl($_POST['type'])."','".cl($_POST['itemid'])."','".cl($_POST['name'])."','".cl($_POST['info'])."','".cl($_POST['itemcount'])."','".cl($_POST['itemprice'])."')");
				  if(!$update_sql)
				  {
					  popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
				  }
				  else
				  {
					  popup("เพิ่มไอเท็มสำเร็จ");
					  go("edit-shopgold.php");
				  }
			  }
		  }
		  else
		  {
			  if(trim($_POST['name']) == "")
			  {
				  popup("กรุณากรอกชื่อไอเท็มด้วยค่ะ");
			  }
			  else if(trim($_POST['itemid']) == "")
			  {
				  popup("กรุณากรอกรหัสไอเท็มค่ะ");
			  }
			  else if(trim($_POST['itemcount']) == "")
			  {
				  popup("กรุณากรอกจำนวนไอเท็มค่ะ");
			  }
			  else if(trim($_POST['itemprice']) == "")
			  {
				  popup("กรุณากรอกราคาไอเท็มค่ะ");
			  }
			  else if(trim($_POST['info']) == "")
			  {
				  popup("กรุณากรอกรายละเอียดไอเท็มค่ะ");
			  }
			  else
			  {
				  $update_sql = mysql_query("UPDATE tb_shopgold_item SET
				  id_type = '".cl($_POST['type'])."',
				  item_id = '".cl($_POST['itemid'])."',
				  item_name = '".cl($_POST['name'])."', 
				  item_description = '".cl($_POST['info'])."', 
				  item_count = '".cl($_POST['itemcount'])."', 
				  item_price = '".cl($_POST['itemprice'])."'
				  WHERE id = '".cl($id_edit)."' ");
				  if(!$update_sql)
				  {
					  popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
				  }
				  else
				  {
					  popup("บันทึกข้อมูลสำเร็จ");
					  go("edit-shopgold.php?id_edit=".$id_edit."");
				  }
			  }
		  }
	  }
	  
	  $id_del = $_GET['id_del'];
	  if($id_del != "")
	  {
		  $delete_sql = mysql_query("DELETE FROM tb_shopgold_item WHERE id = '".cl($id_del)."'");
		  if(!$delete_sql)
		  {
			  popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
		  }
		  else
		  {
			  popup("ทำการลบข้อมูลสำเร็จ");
			  go("edit-shopgold.php");
		  }
	  }
	  ?>
      <hr />
      <p><strong>มีไอเท็มทั้งหมด : <?php echo $total?> ชิ้น</strong></p>
<table align="center" cellpadding="10" cellspacing="0" width="600px" class="table table-bordered table-hover">
<tr style="color:black; font-weight:bold; text-align:center;" class="info">
	<td width="7%">ลำดับที่</td>
    <td width="35%">ชื่อไอเท็ม</td>
    <!--<td width="35%">ข่าว</td>-->
    <td width="15%">หมวดหมู่</td>
    <td width="7%">แก้ไข</td>
    <td width="7%">ลบ</td>
 </tr>

<?php
while($r=mysql_fetch_array($Query)){
$news_id = $r['id'];
$news_name= $r['item_name'];
$news_detail=$r['item_description'];
$news_type=$r['id_type'];
$news_img=$r['item_count'];

$sql="select * from tb_shop_type where id='".cl($news_type)."' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_name="[".$r['catalog_head']."] ".$r['catalog_sub']."";
	
	

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
    <td align='center'><a href=\"edit-shopgold.php?id_edit=$news_id\"><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button></a></td>
    <td align='center'><a href=\"edit-shopgold.php?id_del=$news_id\" onclick=\"return confirm('คุณต้องการลบจริงหรือไม่')\"><button class='btn btn-default'><span class='glyphicon glyphicon-remove'></span></button></a></td>
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