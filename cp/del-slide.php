<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$id_del=$_GET[id_del];

include ('connect.php');

$sql="delete from tb_slide where slide_id='".cl($id_del)."' ";
$result=mysql_db_query($dbname,$sql);
		if($result) {

			echo "<script>
			window.location='cp-slide.php';
			</script>";
			
		} else {
			echo "<center><h5>คลิก ตกลง แล้วกรุณารอสักครู่ ... <br /><font color=red>ระบบจะทำการเปลี่ยนหน้าอัตโนมัติ</font></h5></center>";
			echo "<center><a href='cp-slide.php' ><h5>[ ไม่ต้องการรอ .. คลิก!! ]</h5></a></center>";
			echo "<script>
			alert('ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่อีกครั้ง!');
			window.location='cp-slide.php';
			</script>";
		}
?>