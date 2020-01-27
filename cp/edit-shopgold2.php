<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>กรุณารอสักครู่...</title>
<style type="text/css">
<!--
a:link {
	color: #0066FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0066FF;
}
a:hover {
	text-decoration: none;
	color: #33CCFF;
}
a:active {
	text-decoration: none;
}
-->
</style>
</head>
<body>

<?php

include ('connect.php');


	  if($_POST['submit'])
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
			  // UPDATE
			  $update_sql = mysql_query("UPDATE tb_shopgold_item SET id_type = '".cl($_POST['type'])."', item_id = '".cl($_POST['itemid'])."', item_name = '".cl($_POST['itemname'])."' , item_description = '".$cl($_POST['info'])."', item_count = '".cl($_POST['itemcount'])."', item_price = '".cl($_POST['itemprice'])."' WHERE id = '".cl($id_edit)."' ");
			  
		if($update_sql) {

			echo "<center><h5>คลิก ตกลง แล้วกรุณารอสักครู่ ... <br /><font color=red>ระบบจะทำการเปลี่ยนหน้าอัตโนมัติ</font></h5></center>";
			echo "<center><a href='edit-news.php?id_edit=$id_edit' ><h5>[ ไม่ต้องการรอ .. คลิก!! ]</h5></a></center>";
			echo "<script>
			alert('แก้ไขเรียบร้อย');
			window.location='edit-news.php?id_edit=$id_edit';
			</script>";
			
		} else {
			echo "<center><h5>คลิก ตกลง แล้วกรุณารอสักครู่ ... <br /><font color=red>ระบบจะทำการเปลี่ยนหน้าอัตโนมัติ</font></h5></center>";
			echo "<center><a href='edit-news.php?id_edit=$id_edit' ><h5>[ ไม่ต้องการรอ .. คลิก!! ]</h5></a></center>";
			echo "<script>
			alert('ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่อีกครั้ง!');
			window.location='edit-news.php?id_edit=$id_edit';
			</script>";
		}
		  }
	  }


mysql_close();
?>
</body>
</html>