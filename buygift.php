<?php
include_once("script-head.php");
include_once("cp/connect.php");
$id = $_POST['itemid'];
$charid = $_POST['charname'];


// Get Item Information
$item_sql = mysql_query("SELECT * FROM tb_shopcash_item WHERE id = '".$api->cl($id)."'");
$item = mysql_fetch_assoc($item_sql);

if($_SESSION['user_no'] == "")
{
	$api->go("member-login.php");
}
else if($charid == 0)
{
	$api->popup("กรุณาเลือกตัวละครก่อนค่ะ");
	$api->back();
}
else if($point < $item['item_price'])
{
	$api->popup("คุณมี Cash ไม่เพียงพอค่ะ");
	$api->back();
}
else
{
	// Update and Send
	$money_sql = $sql->prepare("EXEC C9Web.Web.UspUpdateCash :p1,:p2,:p3");
	$money_sql->BindParam(":p1",$_SESSION['user_no']);
	$money_sql->BindParam(":p2",$item['item_price']);
	$money_sql->BindParam(":p3",$point);
	$money_sql->execute();

	if(!$money_sql)
	{
		$api->popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
			$api->back();
	}
	else
	{
		$mail_type = 1;
		$char_send = "GM";
		$subject = "Item";
		$content = "Thank you.";
		$send = $sql->prepare("EXEC C9Web.Web.SendMailEx :p1,:p2,:p3,:p4,:p5,:p6,:p7");
		$send->BindParam(":p1",$charid);
		$send->BindParam(":p2",$mail_type);
		$send->BindParam(":p3",$char_send);
		$send->BindParam(":p4",$subject);
		$send->BindParam(":p5",$content);
		$send->BindParam(":p6",$item['item_id']);
		$send->BindParam(":p7",$item['item_count']);
		$send->execute();
		if(!$send)
		{
			$api->popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
			$api->back();
		}
		else
		{
			$api->popup("ทำการซื้อเรียบร้อยค่ะ");
			$api->back();
		}
	}
}
?>