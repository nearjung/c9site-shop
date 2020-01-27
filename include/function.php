<?php
class API
{
	public function rank_icon($rank)
	{
		if($rank == 1)
		{
			$icon = '<img src="../images/rank1.png">';
		}
		else if($rank == 2)
		{
			$icon = '<img src="../images/rank2.png">';
		}
		else if($rank == 3)
		{
			$icon = '<img src="../images/rank3.png">';
		}
		else
		{
			$icon = $rank;
		}
		return $icon;
	}
	
	public function account_count()
	{
		global $sql;
		$count_sql = $sql->prepare("SELECT count(*) FROM C9Unity.Auth.TblAccount");
		$count_sql->execute();
		$count = $count_sql->fetchColumn();
		return $count;
	}
	
	public function character_count($userid)
	{
		global $sql;
		$count_sql = $sql->prepare("SELECT count(*) FROM C9World.Game.TblPcBase WHERE cAccNo = :userno");
		$count_sql->BindParam(":userno",$userid);
		$count_sql->execute();
		$count = $count_sql->fetchColumn();
		return $count;
	}
	
	public function friend_count($charid)
	{
		global $sql;
		$count_sql = $sql->prepare("SELECT count(*) FROM C9World.Game.TblPcBuddy WHERE cPcNo = :char");
		$count_sql->BindParam(":char",$charid);
		$count_sql->execute();
		$count = $count_sql->fetchColumn();
		return $count;
	}
	
	public function item_count_all()
	{
		global $sql;
		$count_sql = $sql->prepare("SELECT count(*) FROM C9Web.Web.Tbl_ShopGold_Item");
		$count_sql->execute();
		$count = $count_sql->fetchColumn();
		return $count;
	}
	
	public function item_count($catalog)
	{
		global $sql;
		$count_sql = $sql->prepare("SELECT count(*) FROM C9Web.Web.Tbl_ShopGold_Item WHERE id_catalog = :id");
		$count_sql->BindParam(":userno",$catalog);
		$count_sql->execute();
		$count = $count_sql->fetchColumn();
		return $count;
	}
	
	public function popup($text)
	{
		echo "<script>alert('".$text."');</script>";
	}
	
	public function go($link)
	{
		echo "<script>location='".$link."';</script>";
	}
	
	public function back()
	{
		echo "<script>history.go(-1);</script>";
	}

	public function login($username,$password)
	{
		global $sql;
		$login_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccId = :acc AND cPassword = :pass");
		$login_sql->BindParam(":acc",$username);
		$login_sql->BindParam(":pass",$password);
		$login_sql->execute();
		$login = $login_sql->fetch(PDO::FETCH_ASSOC);
		if(!$login)
		{
			$this->popup("ชื่อบัญชีหรือรหัสผ่านผิดค่ะ");
		}
		else
		{
			$_SESSION['user_no'] = $login['cAccNo'];
			$_SESSION['account'] = $login['cAccId'];
			session_write_close();
			$this->go("./member-gold.php");
		}
	}

	public function member_login($username,$password)
	{
		global $sql;
		$login_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccId = :acc AND cPassword = :pass");
		$login_sql->BindParam(":acc",$username);
		$login_sql->BindParam(":pass",$password);
		$login_sql->execute();
		$login = $login_sql->fetch(PDO::FETCH_ASSOC);
		if(!$login)
		{
			$this->popup("ชื่อบัญชีหรือรหัสผ่านผิดค่ะ");
		}
		else
		{
			$_SESSION['user_no'] = $login['cAccNo'];
			$_SESSION['account'] = $login['cAccId'];
			session_write_close();
			$this->go("index.php");
		}
	}
	
	public function login_payment($username,$password)
	{
		global $sql;
		global $txt_35;
		$login_sql = $sql->prepare("SELECT * FROM C9Unity.Auth.TblAccount WHERE cAccId = :acc AND cPassword = :pass");
		$login_sql->BindParam(":acc",$username);
		$login_sql->BindParam(":pass",$password);
		$login_sql->execute();
		$login = $login_sql->fetch(PDO::FETCH_ASSOC);
		if(!$login)
		{
			$this->popup($txt_35);
		}
		else
		{
			$_SESSION['user_no'] = $login['cAccNo'];
			$_SESSION['account'] = $login['cAccId'];
			session_write_close();
			$this->go("payment.php");
		}
	}
	
	public function status_card($status)
	{
		if($status == 0)
		{
			$s = "<strong>กำลังตรวจสอบ</strong>";
		}
		else if($status == 1)
		{
			$s = "<strong><font color='green'>สำเร็จ</font></strong>";
		}
		else if($status == 3)
		{
			$s = "<strong><font color='red'>บัตรถูกใช้แล้ว</font></strong>";
		}
		else if($status == 4 )
		{
			$s = "<strong><font color='red'>รหัสบัตรไม่ถูกต้อง</font></strong>";
		}
		else if($status == 5 )
		{
			$s = "<strong><font color='red'>เป็นบัตรทรูมูฟ</font></strong>";
		}
		else if($status == 10 )
		{
			$s = "<strong><font color='red'>Paypal สำเร็จ</font></strong>";
		}
		return $s;
	}
	
	public function utf8_strlen($s) {
    
		$c = strlen($s); $l = 0;
    for ($i = 0; $i < $c; ++$i) if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
    return $l;
}
	
	public function name_filter($name)
	{
		$text = array(",","GM","จีเอม","จีเอ็ม","ควย","เหี้ย","สัส","พ่อ","แม่","หี","แตด","กระหรี่","เย็ด","หำ","หรรม","kuy","fuck","hee","pussy");
		$replace = array("hi");
		$str = str_replace($text,$replace,$name);
		return $str;
	}
	
	public function job_name($id)
	{
		$job = array("Fighter","Shaman",NULL,"Hunter","Witch Blade","Elite Fighter","Elite Shaman",NULL,"Elite Hunter","Elite Witchblade","Guardian","Blademaster","Warrior","Pragon Defender","Blade Emperor","Destroyer","IIlusionist","Elementalist","Taoist","Cipher","Elemental Empress","Arbiter",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"Scout","Crimson Phantom","Wind Sweeper","Firebrand","Warden","Slayer","Nightstalker","Amphitrite","Punisher","Ren Eretique",NULL,NULL,NULL,"Berserker",NULL,NULL,NULL,NULL,NULL,"Shadow",NULL,"Gunslinger",NULL,NULL,NULL,"Demonisher",NULL,"Reaperess",NULL,NULL,NULL,"Bladedancer",NULL,NULL,"Deathdealer","IIiphia Rose","Blood Thief","Crow","Gear Executor","Soulreaper","Mystic");
		
		return $job[$id];
	}
	
	public function cl($txt)
	{
		$str = str_replace("'","/",$txt);
		return $str;
	}

	public function news_color($type_id)
	{
		if($type_id=="1"){
			$style="blue";
		}else if($type_id=="2"){
			$style="green";
		}else if($type_id=="3"){
			$style="orange";
		}
		return $style;
	}
}


function refill_sendcard($user_no,$password)
{
	global $_CONFIG;
	global $sql;
	$curl = curl_init('https://203.146.127.112/tmpay.net/TPG/backend.php?merchant_id=' .$_CONFIG['tmpay']['merchant_id'] . '&password=' . $password . '&resp_url=' . $_CONFIG['tmpay']['resp_url']);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
	$curl_content = curl_exec($curl);
	if($curl_content === false)
	{
		$curl_content = curl_errno($curl) . ':' . curl_error($curl);
	}
	curl_close($curl);
	if(strpos($curl_content,'SUCCEED') !== FALSE)
	{
		$num_zero = 0;
		$insert = $sql->prepare("EXEC ".MSSQL_DB.".Web.UspRefillTrueMoney :pw,:user,:amount,:stat");
		$insert->BindParam(":pw",$password);
		$insert->BindParam(":user",$user_no);
		$insert->BindParam(":amount",$num_zero);
		$insert->BindParam(":stat",$num_zero);
		$insert->execute();
		return TRUE;
	}
	else return $curl_content;
}
?>