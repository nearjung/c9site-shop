<?php
session_start();
include_once("../include/setting.php");
if($_SESSION['user_no'] == "")
{
	$api->go("login.php");
}
else
{	// Account Info
	$acc_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccId = :ac");
	$acc_sql->BindParam(":ac",$_SESSION['account']);
	$acc_sql->execute();
	$acc = $acc_sql->fetch(PDO::FETCH_ASSOC);
	
	
	// Account Information
	$acc2_sql = $sql->prepare("SELECT * FROM C9Unity.dbo.TblAccountInformation WHERE account = :a");
	$acc2_sql->BindParam(":a",$_SESSION['account']);
	$acc2_sql->execute();
	$acc2 = $acc2_sql->fetch(PDO::FETCH_ASSOC);	
$character_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNo = :no");
$character_sql->BindParam(":no",$_SESSION['charid']);
$character_sql->execute();
$character = $character_sql->fetch(PDO::FETCH_ASSOC);

$charname = $character['cPcNm'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include"script-head.php";?>
</head>

<body class="bodymember">
	<div class="box500">
    	<div class="h-login"><font color="#888">Member</font><font color="#ff0000">System</font></div>
       <?php include"left-menu.php";?>
        <div class="box-detail-mem">
        <?php
		$page = $_GET['page'];
		if($page == "editpass")
		{
			echo '<form action="" method="post" name="changepass" id="changepass">
  <table width="100%" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td align="center"><label for="oldpass"></label>
      <input type="password" name="oldpass" id="oldpass" placeholder="รหัสผ่านเก่า" class="register_box"></td>
    </tr>
    <tr>
      <td align="center"><label for="newpass1"></label>
      <input type="password" name="newpass1" id="newpass1" placeholder="รหัสผ่านใหม่" class="register_box"></td>
    </tr>
    <tr>
      <td align="center"><label for="newpass2"></label>
      <input type="password" name="newpass2" id="newpass2" placeholder="ยืนยันรหัสผ่านใหม่" class="register_box"></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="chgpass" id="chgpass" value="แก้ไขรหัสผ่าน" class="register_box"></td>
    </tr>
  </table>
</form>
';
			if($_POST['chgpass'])
			{
				if(trim($_POST['oldpass']) == "")
				{
					$api->popup("กรุณากรอกรหัสผ่านเก่าค่ะ");
				}
				else if(trim($_POST['oldpass']) != $acc['cPassword'])
				{
					$api->popup("รหัสผ่านเก่าไม่ถูกต้อง");
				}
				else if(trim($_POST['newpass1']) == "")
				{
					$api->popup("กรุณากรอกรหัสผ่านใหม่ด้วยค่ะ");
				}
				else if(trim($_POST['newpass1']) != $_POST['newpass2'])
				{
					$api->popup("ยืนยันรหัสผ่านไม่ตรงกันค่ะ");
				}
				else
				{
					// UPDATE PASSWORD
					$pass_sql = $sql->prepare("UPDATE C9Unity.Auth.TblAccount SET cPassword = :pass WHERE cAccId = :user");
					$pass_sql->BindParam(":pass",$_POST['newpass2']);
					$pass_sql->BindParam(":user",$_SESSION['account']);
					$pass_sql->execute();
					echo "<center><font color='green'>เปลี่ยนรหัสผ่านเรียบร้อยแล้วค่ะ</font></center>";
				}
			}
		}
		else if($page == "exchange")
		{
			echo '<br>
			จำนวนเวลาที่เล่น : '.number_format($acc['cTotPlayTime']).' นาที <br>อัตราการแลกเปลี่ยนอยู่ที่ '.number_format($event_online_minute).' นาทีต่อ '.number_format($event_online_cash).' พ้อย
			<br><form action="" method="post" name="chgclass"><input name="time" type="hidden" value="dsad" />
  <center><input type="submit" name="getfreepoint" id="getfreepoint" value="แลกเปลี่ยนแคช" /><br>&nbsp;</center>
</form>';
			if($_POST['getfreepoint'])
			{
				if($acc['cTotPlayTime'] < $event_online_minute)
				{
					$api->popup("จำนวนเวลายังไม่ครบ");
				}
				else
				{
					// UPDATE Cash
					$point = $acc['cPoint']+$event_online_cash;
					$update_cash = $sql->prepare("UPDATE C9Unity.Auth.TblAccount SET cPoint = :p1 WHERE cAccId = :p2");
					$update_cash->BindParam(":p1",$point);
					$update_cash->BindParam(":p2",$_SESSION['account']);
					$update_cash->execute();
					
					// UPDATE ONLINE TIME
					$times = $acc['cTotPlayTime']-$event_online_minute;
					$update_time = $sql->prepare("UPDATE C9Unity.Auth.TblAccount SET cTotPlayTime = :p1 WHERE cAccId = :p2");
					$update_time->BindParam(":p1",$times);
					$update_time->BindParam(":p2",$_SESSION['account']);
					$update_time->execute();
					
					$api->popup("แลกเปลี่ยนสำเร็จ");
					$api->go("index.php?page=exchange");
				}
			}
		}
		else if($page == "recive")
		{
			if($_SESSION['charid'] == "")
			{
				$api->go("index.php?page=selectedchar");
				exit();
			}
			else
			{
				$character_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNo = :no");
				$character_sql->BindParam(":no",$_SESSION['charid']);
				$character_sql->execute();
				$character = $character_sql->fetch(PDO::FETCH_ASSOC);
				
				$charname = $character['cPcNm'];
				
				// PC INFO
				$char_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcInfo WHERE cPcNo = :noa");
				$char_sql->BindParam(":noa",$_SESSION['charid']);
				$char_sql->execute();
				$char = $char_sql->fetch(PDO::FETCH_ASSOC);
				
				// Level
				$lvl_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcStat WHERE cPcNo = :nob");
				$lvl_sql->BindParam(":nob",$_SESSION['charid']);
				$lvl_sql->execute();
				$lvl = $lvl_sql->fetch(PDO::FETCH_ASSOC);
				echo '<form action="" method="post" name="addsp" id="addsp">
				<table width="100%" align="center" class="default_txt">
  <tr>
    <td align="center">ตัวละครที่เลือก : '.$charname.' : ตัวละครเลเวล '.$lvl['cLev'].'<br>ของรางวัลคือ <strong>'.$event_recive_itemname.'</strong> จำนวน '.$event_recive_count.' ชิ้น<br>จะต้องมีเลเวล '.$event_recive_level.' ก่อนค่ะ<br>[ <a href="index.php?page=selectedchar" style="text-decoration:none; color:#F00;">เปลี่ยนตัวละคร</a> ]</td>
  </tr>
  <tr>
    <td align="center"><input class="register_box" type="submit" name="getenchant" value="รับไอเท็ม"</td>
  </tr>
  </table>
				</form>';
				if($_POST['getenchant'])
				{
					if($acc['cFreeItem'] == $event_recive_time)
					{
						$api->popup("บัญชีนี้รับไอเท็มครบ ".$event_recive_time." ครั้งแล้วค่ะ");
					}
					else if($lvl['cLev'] < $event_recive_level)
					{
						$api->popup("เลเวลยังไม่ถึงตามเงื่อนไขค่ะ");
					}
					else if($acc['cCertifyStep'] != 0)
					{
					    $api->popup("กรุณาออกเกมส์ก่อนค่ะ");
					}
					else
					{
						$recive_time = $acc['cFreeItem']+1;
						$update_enchant_sql = $sql->prepare("UPDATE C9Unity.Auth.TblAccount SET cFreeItem = :up WHERE cAccId = :account");
						$update_enchant_sql->BindParam(":up",$recive_time);
						$update_enchant_sql->BindParam(":account",$_SESSION['account']);
						$update_enchant_sql->execute();
						
						$mailtype = 1;
						$subject = "OK";
						$senditem = $sql->prepare("EXEC C9Web.Web.SendMailEx :chid,:mailtype,:from,:sub,:content,:itemid,:count");
						$senditem->BindParam(":chid",$_SESSION['charid']);
						$senditem->BindParam(":mailtype",$mailtype);
						$senditem->BindParam(":from",$charname);
						$senditem->BindParam(":sub",$subject);
						$senditem->BindParam(":content",$charname);
						$senditem->BindParam(":itemid",$event_recive_itemid);
						$senditem->BindParam(":count",$event_recive_count);
						$senditem->execute();
						
						$api->popup("ส่งไอเท็มเรียบร้อยค่ะ");
					}
				}
			}
		}
		else if($page == "selectedchar")
		{
          echo '<form name="selectedchar" method="post" action="">
          <table width="380" align="center">';
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
            echo '<tr>
              <td align="center"><label for="charname"></label>
                <select name="charname" class="register_box" id="charname">';
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
                echo '</select></td>
            </tr>
            <tr>
              <td align="center"><input name="char" type="submit" class="register_box" id="char" value="เลือกตัวละคร" /></td>
            </tr>
          </table> 
    </form>';
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
				  echo 'คุณได้เลือกตัวละครแล้ว';
			  }
		  }
		  }
		}
		else if($page == "create")
		{
			echo '<br />
<form action="" method="post" name="createchar">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4" align="center"><label for="register_box"></label>
      <input type="text" name="charname" class="register_box" id="charname" placeholder="กรอกชื่อตัวละคร" /></<br />
<p>เลือกอาชีพค่ะ</p>
<td>
    </tr>
    <tr>
      <td><input type="submit" name="shaman" id="shaman" class="butt_shaman" value=" " /></td>
      <td><input type="submit" name="fighter" id="fighter" value=" " class="butt_fighter" /></td>
      <td><input type="submit" name="witchblade" id="witchblade" class="butt_witchblade" value=" " /></td>
      <td><input type="submit" name="hunter" id="hunter" class="butt_hunter" value=" " /></td>
    </tr>
  </table>
</form>';
			if($_POST['shaman'])
			{
					// Chk name
					$namechk_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNm = :char");
					$namechk_sql->BindParam(":char",$_POST['charname']);
					$namechk_sql->execute();
					$namechk = $namechk_sql->fetch(PDO::FETCH_ASSOC);
					if(trim($_POST['charname']) == "")
					{
						$api->popup("กรุณากรอกชื่อตัวละครด้วยค่ะ");
					}
					else if($namechk['cPcNm'] == $_POST['charname'])
					{
						$api->popup("ชื่อตัวละครถูกใช้ไปแล้ว");
					}
					else if($acc['cCertifyStep'] != 0)
					{
					    $api->popup("กรุณาออกจากเกมส์ก่อนค่ะ");
					}
					else if(!preg_match('/^[a-zA-Z0-9ก-ฮเแ]+$/', $_POST['charname']))
					{
						$api->popup("ห้ามใส่อักขระพิเศษค่ะ");
					}
					else if($api->utf8_strlen($_POST['charname']) < 6)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else if($api->utf8_strlen($_POST['charname']) > 18)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else
					{
						// Slot
						$slot_sql = $sql->prepare("SELECT TOP 1 cPcSlotNo FROM C9World.Game.TblPcBase WHERE cAccNo = :acc ORDER BY cPcSlotNo DESC");
						$slot_sql->BindParam(":acc",$_SESSION['user_no']);
						$slot_sql->execute();
						$slot = $slot_sql->fetch(PDO::FETCH_ASSOC);
						// Name
						$num127 = 127;
						$num124 = 124;
						$class = 1;
						$num1 = 1;
						$s = 1+$slot['cPcSlotNo'];
						$empty = 255;
						$zum = 0;
						$mapid = 10;
						$TiredRate = 150;
						$char_level = $event_create_level;
						$char_money = 15000;
						$null = NULL;
						// CREATE
						$create = $sql->prepare("EXEC C9World.Game.UspCreatePc :p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25,:p26,:p27,:p28,:p29,:p30,:p31,:p32,:p33,:p34,:p35,:p36,:p37,:p38,:p39,:p40,:p41,:p42,:p43,:p44,:p45,:p46,:p47,:p48,:p49,:p50,:p51,:p52,:p53,:p54,:p55,:p56,:p57,:p58,:p59");
						$create->BindParam(":p1",$_POST['charname']);
						$create->BindParam(":p2",$_SESSION['user_no']);
						$create->BindParam(":p3",$num1);
						$create->BindParam(":p4",$s);
						$create->BindParam(":p5",$class);
						$create->BindParam(":p6",$class);
						$create->BindParam(":p7",$num127);
						$create->BindParam(":p8",$num124);
						$create->BindParam(":p9",$num127);
						$create->BindParam(":p10",$num127);
						$create->BindParam(":p11",$num127);
						$create->BindParam(":p12",$num127);
						$create->BindParam(":p13",$num127);
						$create->BindParam(":p14",$num127);
						$create->BindParam(":p15",$num127);
						$create->BindParam(":p16",$num127);
						$create->BindParam(":p17",$num127);
						$create->BindParam(":p18",$num127);
						$create->BindParam(":p19",$num127);
						$create->BindParam(":p20",$num127);
						$create->BindParam(":p21",$num127);
						$create->BindParam(":p22",$num127);
						$create->BindParam(":p23",$num127);
						$create->BindParam(":p24",$num127);
						$create->BindParam(":p25",$num127);
						$create->BindParam(":p26",$num127);
						$create->BindParam(":p27",$num127);
						$create->BindParam(":p28",$num127);
						$create->BindParam(":p29",$zum);
						$create->BindParam(":p30",$zum);
						$create->BindParam(":p31",$num127);
						$create->BindParam(":p32",$num127);
						$create->BindParam(":p33",$num127);
						$create->BindParam(":p34",$num127);
						$create->BindParam(":p35",$empty);
						$create->BindParam(":p36",$zum);
						$create->BindParam(":p37",$num127);
						$create->BindParam(":p38",$num127);
						$create->BindParam(":p39",$num127);
						$create->BindParam(":p40",$num1);
						$create->BindParam(":p41",$num1);
						$create->BindParam(":p42",$TiredRate);
						$create->BindParam(":p43",$null);
						$create->BindParam(":p44",$num1);
						$create->BindParam(":p45",$num1);
						$create->BindParam(":p46",$num1);
						$create->BindParam(":p47",$num1);
						$create->BindParam(":p48",$mapid);
						$create->BindParam(":p49",$mapid);
						$create->BindParam(":p50",$zum);
						$create->BindParam(":p51",$zum);
						$create->BindParam(":p52",$zum);
						$create->BindParam(":p53",$zum);
						$create->BindParam(":p54",$zum);
						$create->BindParam(":p55",$zum);
						$create->BindParam(":p56",$zum);
						$create->BindParam(":p57",$zum);
						$create->BindParam(":p58",$zum);
						$create->BindParam(":p59",$zum);
						$create->execute();
						
						$api->popup("สร้างตัวละครสำเร็จแล้วจ้า");
						$api->go("index.php");
					}
			}
			
			else if($_POST['fighter'])
			{
					// Chk name
					$namechk_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNm = :char");
					$namechk_sql->BindParam(":char",$_POST['charname']);
					$namechk_sql->execute();
					$namechk = $namechk_sql->fetch(PDO::FETCH_ASSOC);
					if(trim($_POST['charname']) == "")
					{
						$api->popup("กรุณากรอกชื่อตัวละครด้วยค่ะ");
					}
					else if($namechk['cPcNm'] == $_POST['charname'])
					{
						$api->popup("ชื่อตัวละครถูกใช้ไปแล้ว");
					}
					else if($acc['cCertifyStep'] != 0)
					{
					    $api->popup("กรุณาออกจากเกมส์ก่อนค่ะ");
					}
					else if(!preg_match('/^[a-zA-Z0-9ก-ฮเแ]+$/', $_POST['charname']))
					{
						$api->popup("ห้ามใส่อักขระพิเศษค่ะ");
					}
					else if($api->utf8_strlen($_POST['charname']) < 6)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else if($api->utf8_strlen($_POST['charname']) > 12)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else
					{
						// Slot
						$slot_sql = $sql->prepare("SELECT TOP 1 cPcSlotNo FROM C9World.Game.TblPcBase WHERE cAccNo = :acc ORDER BY cPcSlotNo DESC");
						$slot_sql->BindParam(":acc",$_SESSION['user_no']);
						$slot_sql->execute();
						$slot = $slot_sql->fetch(PDO::FETCH_ASSOC);
						// Name
						$num127 = 127;
						$num124 = 124;
						$class = 0;
						$num1 = 1;
						$s = 1+$slot['cPcSlotNo'];
						$empty = 255;
						$zum = 0;
						$mapid = 10;
						$TiredRate = 150;
						$char_level = $event_create_level;
						$char_money = 15000;
						$null = NULL;
						// CREATE
						$create = $sql->prepare("EXEC C9World.Game.UspCreatePc :p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25,:p26,:p27,:p28,:p29,:p30,:p31,:p32,:p33,:p34,:p35,:p36,:p37,:p38,:p39,:p40,:p41,:p42,:p43,:p44,:p45,:p46,:p47,:p48,:p49,:p50,:p51,:p52,:p53,:p54,:p55,:p56,:p57,:p58,:p59");
						$create->BindParam(":p1",$_POST['charname']);
						$create->BindParam(":p2",$_SESSION['user_no']);
						$create->BindParam(":p3",$num1);
						$create->BindParam(":p4",$s);
						$create->BindParam(":p5",$class);
						$create->BindParam(":p6",$class);
						$create->BindParam(":p7",$num127);
						$create->BindParam(":p8",$num124);
						$create->BindParam(":p9",$num127);
						$create->BindParam(":p10",$num127);
						$create->BindParam(":p11",$num127);
						$create->BindParam(":p12",$num127);
						$create->BindParam(":p13",$num127);
						$create->BindParam(":p14",$num127);
						$create->BindParam(":p15",$num127);
						$create->BindParam(":p16",$num127);
						$create->BindParam(":p17",$num127);
						$create->BindParam(":p18",$num127);
						$create->BindParam(":p19",$num127);
						$create->BindParam(":p20",$num127);
						$create->BindParam(":p21",$num127);
						$create->BindParam(":p22",$num127);
						$create->BindParam(":p23",$num127);
						$create->BindParam(":p24",$num127);
						$create->BindParam(":p25",$num127);
						$create->BindParam(":p26",$num127);
						$create->BindParam(":p27",$num127);
						$create->BindParam(":p28",$num127);
						$create->BindParam(":p29",$zum);
						$create->BindParam(":p30",$zum);
						$create->BindParam(":p31",$num127);
						$create->BindParam(":p32",$num127);
						$create->BindParam(":p33",$num127);
						$create->BindParam(":p34",$num127);
						$create->BindParam(":p35",$empty);
						$create->BindParam(":p36",$zum);
						$create->BindParam(":p37",$num127);
						$create->BindParam(":p38",$num127);
						$create->BindParam(":p39",$num127);
						$create->BindParam(":p40",$num1);
						$create->BindParam(":p41",$num1);
						$create->BindParam(":p42",$TiredRate);
						$create->BindParam(":p43",$null);
						$create->BindParam(":p44",$num1);
						$create->BindParam(":p45",$num1);
						$create->BindParam(":p46",$num1);
						$create->BindParam(":p47",$num1);
						$create->BindParam(":p48",$mapid);
						$create->BindParam(":p49",$mapid);
						$create->BindParam(":p50",$zum);
						$create->BindParam(":p51",$zum);
						$create->BindParam(":p52",$zum);
						$create->BindParam(":p53",$zum);
						$create->BindParam(":p54",$zum);
						$create->BindParam(":p55",$zum);
						$create->BindParam(":p56",$zum);
						$create->BindParam(":p57",$zum);
						$create->BindParam(":p58",$zum);
						$create->BindParam(":p59",$zum);
						$create->execute();
						
						$api->popup("สร้างตัวละครสำเร็จแล้วจ้า");
						$api->go("index.php");
					}
			}
			
			else if($_POST['witchblade'])
			{
					// Chk name
					$namechk_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNm = :char");
					$namechk_sql->BindParam(":char",$_POST['charname']);
					$namechk_sql->execute();
					$namechk = $namechk_sql->fetch(PDO::FETCH_ASSOC);
					if(trim($_POST['charname']) == "")
					{
						$api->popup("กรุณากรอกชื่อตัวละครด้วยค่ะ");
					}
					else if($namechk['cPcNm'] == $_POST['charname'])
					{
						$api->popup("ชื่อตัวละครถูกใช้ไปแล้ว");
					}
					else if($acc['cCertifyStep'] != 0)
					{
					    $api->popup("กรุณาออกจากเกมส์ก่อนค่ะ");
					}
					else if(!preg_match('/^[a-zA-Z0-9ก-ฮเแ]+$/', $_POST['charname']))
					{
						$api->popup("ห้ามใส่อักขระพิเศษค่ะ");
					}
					else if($api->utf8_strlen($_POST['charname']) < 6)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else if($api->utf8_strlen($_POST['charname']) > 12)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else
					{
						// Slot
						$slot_sql = $sql->prepare("SELECT TOP 1 cPcSlotNo FROM C9World.Game.TblPcBase WHERE cAccNo = :acc ORDER BY cPcSlotNo DESC");
						$slot_sql->BindParam(":acc",$_SESSION['user_no']);
						$slot_sql->execute();
						$slot = $slot_sql->fetch(PDO::FETCH_ASSOC);
						// Name
						$num127 = 127;
						$num124 = 124;
						$class = 4;
						$num1 = 1;
						$s = 1+$slot['cPcSlotNo'];
						$empty = 255;
						$zum = 0;
						$mapid = 10;
						$TiredRate = 150;
						$char_level = $event_create_level;
						$char_money = 15000;
						$null = NULL;
						// CREATE
						$create = $sql->prepare("EXEC C9World.Game.UspCreatePc :p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25,:p26,:p27,:p28,:p29,:p30,:p31,:p32,:p33,:p34,:p35,:p36,:p37,:p38,:p39,:p40,:p41,:p42,:p43,:p44,:p45,:p46,:p47,:p48,:p49,:p50,:p51,:p52,:p53,:p54,:p55,:p56,:p57,:p58,:p59");
						$create->BindParam(":p1",$_POST['charname']);
						$create->BindParam(":p2",$_SESSION['user_no']);
						$create->BindParam(":p3",$num1);
						$create->BindParam(":p4",$s);
						$create->BindParam(":p5",$class);
						$create->BindParam(":p6",$class);
						$create->BindParam(":p7",$num127);
						$create->BindParam(":p8",$num124);
						$create->BindParam(":p9",$num127);
						$create->BindParam(":p10",$num127);
						$create->BindParam(":p11",$num127);
						$create->BindParam(":p12",$num127);
						$create->BindParam(":p13",$num127);
						$create->BindParam(":p14",$num127);
						$create->BindParam(":p15",$num127);
						$create->BindParam(":p16",$num127);
						$create->BindParam(":p17",$num127);
						$create->BindParam(":p18",$num127);
						$create->BindParam(":p19",$num127);
						$create->BindParam(":p20",$num127);
						$create->BindParam(":p21",$num127);
						$create->BindParam(":p22",$num127);
						$create->BindParam(":p23",$num127);
						$create->BindParam(":p24",$num127);
						$create->BindParam(":p25",$num127);
						$create->BindParam(":p26",$num127);
						$create->BindParam(":p27",$num127);
						$create->BindParam(":p28",$num127);
						$create->BindParam(":p29",$zum);
						$create->BindParam(":p30",$zum);
						$create->BindParam(":p31",$num127);
						$create->BindParam(":p32",$num127);
						$create->BindParam(":p33",$num127);
						$create->BindParam(":p34",$num127);
						$create->BindParam(":p35",$empty);
						$create->BindParam(":p36",$zum);
						$create->BindParam(":p37",$num127);
						$create->BindParam(":p38",$num127);
						$create->BindParam(":p39",$num127);
						$create->BindParam(":p40",$num1);
						$create->BindParam(":p41",$num1);
						$create->BindParam(":p42",$TiredRate);
						$create->BindParam(":p43",$null);
						$create->BindParam(":p44",$num1);
						$create->BindParam(":p45",$num1);
						$create->BindParam(":p46",$num1);
						$create->BindParam(":p47",$num1);
						$create->BindParam(":p48",$mapid);
						$create->BindParam(":p49",$mapid);
						$create->BindParam(":p50",$zum);
						$create->BindParam(":p51",$zum);
						$create->BindParam(":p52",$zum);
						$create->BindParam(":p53",$zum);
						$create->BindParam(":p54",$zum);
						$create->BindParam(":p55",$zum);
						$create->BindParam(":p56",$zum);
						$create->BindParam(":p57",$zum);
						$create->BindParam(":p58",$zum);
						$create->BindParam(":p59",$zum);
						$create->execute();
						
						$api->popup("สร้างตัวละครสำเร็จแล้วจ้า");
						$api->go("index.php");
					}
			}
			
			else if($_POST['hunter'])
			{
					// Chk name
					$namechk_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNm = :char");
					$namechk_sql->BindParam(":char",$_POST['charname']);
					$namechk_sql->execute();
					$namechk = $namechk_sql->fetch(PDO::FETCH_ASSOC);
					if(trim($_POST['charname']) == "")
					{
						$api->popup("กรุณากรอกชื่อตัวละครด้วยค่ะ");
					}
					else if($namechk['cPcNm'] == $_POST['charname'])
					{
						$api->popup("ชื่อตัวละครถูกใช้ไปแล้ว");
					}
					else if($acc['cCertifyStep'] != 0)
					{
					    $api->popup("กรุณาออกจากเกมส์ก่อนค่ะ");
					}
					else if(!preg_match('/^[a-zA-Z0-9ก-ฮเแ]+$/', $_POST['charname']))
					{
						$api->popup("ห้ามใส่อักขระพิเศษค่ะ");
					}
					else if($api->utf8_strlen($_POST['charname']) < 6)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else if($api->utf8_strlen($_POST['charname']) > 12)
					{
						$api->popup("ชื่อตัวละครต้องมี 6-16 ตัวอักษร");
					}
					else
					{
						// Slot
						$slot_sql = $sql->prepare("SELECT TOP 1 cPcSlotNo FROM C9World.Game.TblPcBase WHERE cAccNo = :acc ORDER BY cPcSlotNo DESC");
						$slot_sql->BindParam(":acc",$_SESSION['user_no']);
						$slot_sql->execute();
						$slot = $slot_sql->fetch(PDO::FETCH_ASSOC);
						// Name
						$num127 = 127;
						$num124 = 124;
						$class = 3;
						$num1 = 1;
						$s = 1+$slot['cPcSlotNo'];
						$empty = 255;
						$zum = 0;
						$mapid = 10;
						$TiredRate = 150;
						$char_level = $event_create_level;
						$char_money = 15000;
						$null = NULL;
						// CREATE
						$create = $sql->prepare("EXEC C9World.Game.UspCreatePc :p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25,:p26,:p27,:p28,:p29,:p30,:p31,:p32,:p33,:p34,:p35,:p36,:p37,:p38,:p39,:p40,:p41,:p42,:p43,:p44,:p45,:p46,:p47,:p48,:p49,:p50,:p51,:p52,:p53,:p54,:p55,:p56,:p57,:p58,:p59");
						$create->BindParam(":p1",$_POST['charname']);
						$create->BindParam(":p2",$_SESSION['user_no']);
						$create->BindParam(":p3",$num1);
						$create->BindParam(":p4",$s);
						$create->BindParam(":p5",$class);
						$create->BindParam(":p6",$class);
						$create->BindParam(":p7",$num127);
						$create->BindParam(":p8",$num124);
						$create->BindParam(":p9",$num127);
						$create->BindParam(":p10",$num127);
						$create->BindParam(":p11",$num127);
						$create->BindParam(":p12",$num127);
						$create->BindParam(":p13",$num127);
						$create->BindParam(":p14",$num127);
						$create->BindParam(":p15",$num127);
						$create->BindParam(":p16",$num127);
						$create->BindParam(":p17",$num127);
						$create->BindParam(":p18",$num127);
						$create->BindParam(":p19",$num127);
						$create->BindParam(":p20",$num127);
						$create->BindParam(":p21",$num127);
						$create->BindParam(":p22",$num127);
						$create->BindParam(":p23",$num127);
						$create->BindParam(":p24",$num127);
						$create->BindParam(":p25",$num127);
						$create->BindParam(":p26",$num127);
						$create->BindParam(":p27",$num127);
						$create->BindParam(":p28",$num127);
						$create->BindParam(":p29",$zum);
						$create->BindParam(":p30",$zum);
						$create->BindParam(":p31",$num127);
						$create->BindParam(":p32",$num127);
						$create->BindParam(":p33",$num127);
						$create->BindParam(":p34",$num127);
						$create->BindParam(":p35",$empty);
						$create->BindParam(":p36",$zum);
						$create->BindParam(":p37",$num127);
						$create->BindParam(":p38",$num127);
						$create->BindParam(":p39",$num127);
						$create->BindParam(":p40",$num1);
						$create->BindParam(":p41",$num1);
						$create->BindParam(":p42",$TiredRate);
						$create->BindParam(":p43",$null);
						$create->BindParam(":p44",$num1);
						$create->BindParam(":p45",$num1);
						$create->BindParam(":p46",$num1);
						$create->BindParam(":p47",$num1);
						$create->BindParam(":p48",$mapid);
						$create->BindParam(":p49",$mapid);
						$create->BindParam(":p50",$zum);
						$create->BindParam(":p51",$zum);
						$create->BindParam(":p52",$zum);
						$create->BindParam(":p53",$zum);
						$create->BindParam(":p54",$zum);
						$create->BindParam(":p55",$zum);
						$create->BindParam(":p56",$zum);
						$create->BindParam(":p57",$zum);
						$create->BindParam(":p58",$zum);
						$create->BindParam(":p59",$zum);
						$create->execute();
						
						$api->popup("สร้างตัวละครสำเร็จแล้วจ้า");
						$api->go("index.php");
					}
			}
		}
		?>
      </div>
        
    </div><center><font color="#FFFFFF">System Website By.GameSv-API.com</font></center>
</body>
</html>