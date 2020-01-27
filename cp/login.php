<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
?>
<?php

$user=$_POST[user];
$pass=$_POST[pass];

include ('connect.php');

$sql="select * from tb_user where user_name='".cl($user)."' and user_pass ='".cl($pass)."'";
$result=mysql_db_query($dbname,$sql) or die(mysql_error());
$num = mysql_num_rows($result);
if($num==1){
		$_SESSION["user"] = $user;
		echo "<script>
		window.location='cp.php';
		</script>";
}else {
		echo "<script>
		alert('User หรือ Password ไม่ถูกต้อง กรุณาทำรายการใหม่อีกครั้ง!!');
		window.location='index.php';
		</script>";
	}
mysql_close();
?>
