<?php
define("MSSQL_HOST","127.0.0.1");
define("MSSQL_USER","sa");
define("MSSQL_PASS","123456");
define("MSSQL_DB","C9Web");

//ห้ามแก้ไข
include_once("function.php");
$sql = new PDO("sqlsrv:server=".MSSQL_HOST."; Database=".MSSQL_DB."",MSSQL_USER,MSSQL_PASS);
$api = new API(true);
$ip = $_SERVER['REMOTE_ADDR'];
// IP ของ TMPAY.NET ที่อนุญาติให้รับส่งข้อมูลบัตรเงินสด (ไม่ควรแก้ไข)
$_CONFIG['tmpay']['access_ip'] = '203.146.127.112';
// รหัสร้านค้า ของบัญชี TMPAY.NET
$_CONFIG['tmpay']['merchant_id'] = 'test';
// URL ที่ได้ติดตั้งไฟล์ tmpay.php
$_CONFIG['tmpay']['resp_url'] = 'http://c9wap.com/include/topup.php'; 

// แก้ไขราคาบัตร // จำนวนแคชที่จะได้รับ
$true_0		=	0; // ล้มเหลว
$true_50	=	500; // บัตร 50
$true_90	=	900; // บัตร 90
$true_150	=	1500; // บัตร 150
$true_300	=	3000; // บัตร 300
$true_500	=	5000; // บัตร 500
$true_1000	=	10000; // บัตร 1,000


// แก้ไขรายละเอียดเซิฟเวอร์
$sv_name	= ""; // ชื่อเซิฟเวอร์
$sv_ip		= ""; // ไอพีเซิฟเวอร์
$sv_port	= ""; // พอทเซิฟเวอร์


// แก้ไขกิจกรรม (หากเปิดใส่ 1 ปิด ใส่ 0)
$event_online	=	"1"; // กิจกรรมออนไลน์รับพ้อย
$event_recive	=	"1"; // กิจกรรมเลเวลครบรับไอเท็ม
$event_create	=	"1"; // กิจกรรมสร้างตัวละครบนเว็บ


// กิจกรรมออนไลน์รับพ้อย
$event_online_minute	=	"20"; // จำนวนนาทีที่นับ
$event_online_cash		=	"100"; // จำนวนแคชที่จะได้รับ

// กิจกรรมเลเวลครบรับไอเท็ม
$event_recive_level		=	"10"; // เลเวลตัวละคร
$event_recive_itemname	=	"หินชุบวิญญาณ"; // ชื่อไอเท็ม
$event_recive_itemid	=	"6313"; // รหัสไอเท็มที่ต้องการ
$event_recive_count		=	"1"; // จำนวนไอเท็มที่ต้องการ
$event_recive_time		=	"2"; // จำนวนครั้งที่สามารถรับได้

// กิจกรรมสร้างตัวละครบนเว็บไซต์
$event_create_level		=	"1"; // เลเวลที่ได้รับจากการสร้าง
?>