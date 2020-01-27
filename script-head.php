<?php
session_start();
include_once("include/setting.php");
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
$securimage = new Securimage();

// ถ้าล็อกอินแล้ว

if($_SESSION['user_no'] != "")
{
	// Get account information
	$account_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccNo = :userid");
	$account_sql->BindParam(":userid",$_SESSION['user_no']);
	$account_sql->execute();
	$account = $account_sql->fetch(PDO::FETCH_ASSOC);
	$username = $account['cAccId'];
	$point = $account['cPoint'];
}

// ถ้าเลือกตัวละครแล้ว
if($_SESSION['charid'] != "")
{
	// Get Character Information
	$character_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNo = :no");
	$character_sql->BindParam(":no",$_SESSION['charid']);
	$character_sql->execute();
	$character = $character_sql->fetch(PDO::FETCH_ASSOC);

	$charname = $character['cPcNm'];

	$charinfo_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcInfo WHERE cPcNo = :no");
	$charinfo_sql->BindParam(":no",$_SESSION['charid']);
	$charinfo_sql->execute();
	$charinfo = $charinfo_sql->fetch(PDO::FETCH_ASSOC);

	$gold = $charinfo['cMoney'];
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>C9 the Ultimate Action ขีดสุดความยิ่งใหญ่แห่งเกมออนไลน์</title>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.colorbox.js"></script>

    <script src="dist/semantic.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/armory.css">
    
    <link rel="stylesheet" href="css/animate.css">
	<!--<link type="text/css" rel="stylesheet" href="css/reset.min.css">-->
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tab.css">
    <link rel="stylesheet" href="colorbox.css">
    
	<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
	<link rel="icon" href="favicon.png" type="image/x-icon"> 
	
	<script src="js/jquery.parallax.min.js"></script>
    
    <meta name="viewport" content="width=1000, initial-scale=1">
	<meta property="og:title" content="C9Wap">
	<meta property="og:type" content="article">
	<meta property="og:url" content="http://www.c9wap.com">
	<meta property="og:image" content="http://i.imgur.com/VT9UVit.jpg">
	<meta property="og:site_name" content="C9 the Ultimate Action ขีดสุดความยิ่งใหญ่แห่งเกมออนไลน์">
	<meta name="description" content="::C9:: (Continent of the Ninth) เกม Next Gen ระดับ S CLASS เปิดตัวเวปไซต์พร้อม VDO แอคชั่นสุดมันส์" >
        <meta name="keywords" content="C9, เกมออนไลน์, Continent of the Ninth, c9, MMORPG,ซีไนน์, เกมส์, ออนไลน์, เกมออนไลน์, เกมส์ออนไลน์, Game, Games, Online Game, MMO, Free-play, เล่นฟรี">  

	<meta property="article:author" content="www.c9wap.com">
	<meta property="article:publisher" content="www.c9wap.com">

	
</head>
<body>