<?php
$objConnect = mysql_connect("localhost","root","123456") or die (mysql_error());
$objDB = mysql_select_db("c9wap");
mysql_query("SET NAMES utf8" , $objConnect);
$dbname = "c9wap";


function cl($txt)
{
	$str = str_replace("'","/",$txt);
	return $str;
}

function popup($text)
{
	echo "<script>alert('".$text."');</script>";
}
function go($link)
{
	echo "<script>location='".$link."';</script>";
}

?>