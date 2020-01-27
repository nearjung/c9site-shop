<?php include"script-head.php";?>

<?php include"topbar.php"; ?>

<?php include"menumem.php"; ?>

<?php
if($_SESSION['user_no'] == "")
{
	$api->go("member-login.php");
}
?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">เติมเงิน</div>
            
            <div class="inner">
                
<div class="ui inverted segment" style="text-align:center;">                
<div class="ui inverted form">
  <div class="inline field"><form name="refillcenter" method="post" action="">
    <label class="ui red label">Serial code:	</label>
    <input type="text" name="truemoney_password" placeholder="กรอกรหัสบัตรทรูมันนี่ 14 หลัก" maxlength="14" style="width:300px;">
    <input type="submit" name="refill" value="เติมเงิน" class="ui red button">
	</form>
<?php
	if($_POST['refill'])
	{
		// Check Password True
		$chk_card = $sql->prepare("SELECT password FROM dbo.truemoney WHERE user_no = :id");
		$chk_card->BindParam(":id",$_SESSION['user_no']);
		$chk_card->execute();
		$chkc = $chk_card->fetch(PDO::FETCH_ASSOC);
		{
			if(!is_numeric($_POST['truemoney_password']))
			{
				$api->popup("รูปแบบรหัสเลขบัตรไม่ถูกต้อง");
			}
			else if($_POST['truemoney_password'] == "")
			{
				$api->popup("กรุณากรอกรหัสบัตรเติมเงินค่ะ");
			}
			else if(strlen($_POST['truemoney_password']) > 14)
			{
				$api->popup("กรุณากรอกรหัสบัตรทรูมันนี่ 14 หลักค่ะ");
			}
			else if(strlen($_POST['truemoney_password']) < 14)
			{
				$api->popup("กรุณากรอกรหัสบัตรทรูมันนี่ 14 หลักค่ะ");
			}
			else if($chkc['password'] == $_POST['truemoney_password'])
			{
				$api->popup("รหัสบัตรทรูมันนี้มีอยู่ในระบบแล้ว");
			}
			else
			{
				if(($tmpay_ret = refill_sendcard($_SESSION['user_no'],$_POST['truemoney_password'])) !== TRUE)
				{
					echo '
					<table border="0" align="center" cellpadding="5" cellspacing="2">
					  <tr>
						<td align="center">ขออภัย ขณะนี้ระบบ TMPAY.NET ขัดข้อง กรุณาติดต่อเจ้าหน้าที่ (' . $tmpay_ret . ')<br /></td>
					  </tr>
					</table>';
				}
				else
				{
					echo '
					<table border="0" align="center" cellpadding="5" cellspacing="2">
					  <tr>
						<td>ได้รับข้อมูลบัตรเงินสดเรียบร้อย กรุณารอการตรวจสอบจากระบบ<br />'.redirect("member.php?id=history").'</td>
					  </tr>
					</table>';
				}
			}
		}
	}
?>
  </div>
</div>
</div>
                
                <table class="ui celled inverted table" style="width:500px; margin:auto;">
                    <thead>
                        <tr>
                            <th>ราคาบัตรเงินสด</th>
                            <th>CASH</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>50 บาท</td>
                        <td>500 CASH</td>
                    </tr>
                    <tr>
                        <td>90 บาท</td>
                        <td>900 CASH</td>
                    </tr>
                    <tr>
                        <td>150 บาท</td>
                        <td>1500 CASH</td>
                    </tr>
                    <tr>
                        <td>300 บาท</td>
                        <td>3000 CASH</td>
                    </tr>
                    <tr>
                        <td>500 บาท</td>
                        <td>5000 CASH</td>
                    </tr>
                    <tr>
                        <td>1000 บาท</td>
                        <td>10000 CASH</td>
                    </tr>
                </table><br>
                <?php
				echo '<table class="ui celled inverted table" width="710" align="center">
				<thead>
  <tr>
    <td width="76" bgcolor="#333333"><font color="#CCCCCC">&nbsp;<b>ลำดับ</b></font></td>
    <td width="213" bgcolor="#333333"><font color="#CCCCCC"> &nbsp;<b>รหัสบัตร</b></font></td>
    <td width="108" bgcolor="#333333"><font color="#CCCCCC"> &nbsp;<b>สถานะ</b></font></td>
    <td width="106" bgcolor="#333333"><font color="#CCCCCC">&nbsp;<b>ราคา</b></font></td>
    <td width="183" bgcolor="#333333"><font color="#CCCCCC">&nbsp;<b>วันที่</b></font></td>
  </tr></thead>';
  // Topup List
  $c = 1;
  $true_sql = $sql->prepare("SELECT * FROM C9World.dbo.truemoney WHERE user_no = :ac ORDER BY card_id DESC");
  $true_sql->BindParam(":ac",$_SESSION['user_no']);
  $true_sql->execute();
  while($true = $true_sql->fetch(PDO::FETCH_ASSOC))
  {
	  echo '<thead>
  <tr>
    <td>'.$c++.'</td>
    <td>'.$true['password'].'</td>
    <td>'.$api->status_card($true['status']).'</td>
    <td>'.$true['amount'].'</td>
    <td>'.$true['added_time'].'</td>
  </tr>';
  }
  echo '</thead>
</table>
';
?>
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>