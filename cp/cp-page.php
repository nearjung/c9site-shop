<?php
session_start();

if(!isset($_SESSION['user'])) {
	header('Location: index.php');
	die();
}

include ('connect.php');

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
	$id_edit=$_GET['id_edit'];
	
	$sql="select * from tb_page where page_id='$id_edit' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
$page_id = $r['page_id'];
$page_name = $r['page_name'];
$page_detail = $r['page_detail'];


?>
    <div class="box" style="margin-top:-10px;">

      <form class="form-horizontal" method="post" action="edit-page.php"enctype="multipart/form-data">
  
  <legend>จัดการหน้า : <?php echo $page_name; ?></legend>
  
<div class="alert alert-info" role="alert"><b>กำลังแก้ไขหน้า : <?php echo $page_name; ?></b> | รูปภาพและข้อความ ขนาดความกว้างไม่เกิน <span class="label label-info">700 px</span> นะจ๊ะ</div>
  <textarea id="detail" name="detail" cols="45" rows="10" class="ckeditor"><?php echo $page_detail; ?></textarea><br />
  <input type="hidden" id="id_edit" name="id_edit" value="<?php echo $page_id; ?>"  />
  <button type="submit" class="btn btn-default">บันทึก</button>
  
</form>
      

    </div>
</div>
    <?php include"footer.php";?>
</div>
</body>
</html>