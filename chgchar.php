<?php
session_start();
include_once("include/setting.php");
if($_SESSION['account'] != "")
{
	// Account Info
	$acc_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccId = :ac");
	$acc_sql->BindParam(":ac",$_SESSION['account']);
	$acc_sql->execute();
	$acc = $acc_sql->fetch(PDO::FETCH_ASSOC);
	
	
	// Account Information
	$acc2_sql = $sql->prepare("SELECT * FROM C9Unity.dbo.TblAccountInformation WHERE account = :a");
	$acc2_sql->BindParam(":a",$_SESSION['account']);
	$acc2_sql->execute();
	$acc2 = $acc2_sql->fetch(PDO::FETCH_ASSOC);	
}

$character_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNo = :no");
$character_sql->BindParam(":no",$_SESSION['charid']);
$character_sql->execute();
$character = $character_sql->fetch(PDO::FETCH_ASSOC);

$charname = $character['cPcNm'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function CloseMe()
         {
             window.opener.location.reload();
             window.close();
         }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="300" align="center" background="images/bg_charselected.png">
          <form name="selectedchar" method="post" action="">
          <table width="380" align="center">
          <?php
		  if($_SESSION['user_no'] == "")
		  {
			  echo 'กรุณาเข้าสู่ระบบก่อนค่ะ <a onclick="CloseMe()" href="javascript:void(0);">คลิ๊กที่นี่</a> เพื่อปิดหน้าต่าง';
		  }
		  else
		  {
		  if($_SESSION['charid'] != "")
		  {
			  echo'
          <tr>
          <td align="center">ตัวละครที่คุณเลือก : '.$charname.'</td>
          </tr>';
		  }
		  ?>
            <tr>
              <td align="center"><label for="charname"></label>
                <select name="charname" class="register_box" id="charname">
                <?php
				// Char List
				$char_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cAccNo = :acc ORDER BY cPcNm DESC");
				$char_sql->BindParam(":acc",$_SESSION['user_no']);
				$char_sql->execute();
				if($api->character_count($_SESSION['user_no']) == 0)
				{
					echo '<option value="0">กรุณาสร้างตัวละครค่ะ</option>';
				}
				else
				{
					while($char = $char_sql->fetch(PDO::FETCH_ASSOC))
					{
						echo '<option value="'.$char['cPcNo'].'">'.$char['cPcNm'].'</option>';
					}
				}
				?>
                </select></td>
            </tr>
            <tr>
              <td align="center"><input name="char" type="submit" class="register_box" id="char" value="เลือกตัวละคร" /></td>
            </tr>
          </table> 
    </form>
          <?php
		  if($_POST['char'])
		  {
			  if($_POST['charname'] == 0)
			  {
				  $api->popup("กรุณาเลือกตัวละครค่ะ");
			  }
			  else
			  {
				  $_SESSION['charid'] = $_POST['charname'];
				  session_write_close();
				  echo 'คุณได้เลือกตัวละครแล้ว <a onclick="CloseMe()" href="javascript:void(0);">คลิ๊กที่นี่</a> เพื่อปิดหน้าต่าง';
			  }
		  }
		  }
		  ?></td>
  </tr>
</table>
</body>
</html>