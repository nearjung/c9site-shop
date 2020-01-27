<?php include"script-head.php";?>

<?php include"topbar.php"; ?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">สมัครสมาชิก</div>
            
            <div class="inner">
                
                <div style="width:400px;margin:auto;">

<form class="ui inverted form" method="post" action="register.php?id=submit">
  <div class="field">
    <label>ชื่อผู้ใช้</label>
    <input type="text" name="user" placeholder="Username">
  </div>
  <div class="field">
    <label>รหัสผ่าน</label>
    <input type="password" name="pass" placeholder="Password">
  </div>
    <div class="field">
    <label>รหัสผ่าน(ยืนยัน)</label>
    <input type="password" name="repass" placeholder="RE-Password">
  </div>
    <div class="field">
    <label>อีเมล์</label>
    <input type="email" name="email" placeholder="Email">
  </div>
    <div class="field">
    <label>Captcha</label>
        <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
    <input type="text" name="captcha_code" size="10" maxlength="6" />
<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ เปลี่ยนภาพ ]</a>
  </div>
  <button class="ui red button" type="submit" name="register" id="register">สมัครสมาชิก</button>
    <button class="ui button" type="reset">ยกเลิก</button>
</form>
<?php
if($_GET['id'] == "submit")
{
		if(trim($_POST['user']) == "")
		{
			$api->popup("กรุณากรอกชื่อบัญชีด้วยค่ะ");
		}
		else if(trim($_POST['pass']) == "")
		{
			$api->popup("กรุณากรอกรหัสผ่านด้วยค่ะ");
		}
		else if(trim($_POST['pass']) != $_POST['repass'])
		{
			$api->popup("รหัสผ่านไม่ตรงกันค่ะ");
		}
		else if(trim($_POST['email']) == "")
		{
			$api->popup("กรุณากรอกอีเมลด้วยค่ะ");
		}
		else if($securimage->check($_POST['captcha_code']) == false)
		{
			$api->popup("รหัส Captcha ผิดค่ะ");
		}
		else
		{
			// Register
			$register_sql = $sql->prepare("EXEC Web.UspRegister :p1,:p2,:p3");
			$register_sql->BindParam(":p1",$_POST['user']);
			$register_sql->BindParam(":p2",$_POST['repass']);
			$register_sql->BindParam(":p3",$ip);
			$register_sql->execute();
			$api->popup("การสมัครเสร็จสิ้น. ยินดีต้อนรับคุณ ".$_POST['user']." เข้าสู่ ".$sv_name." ค่ะ");
		}
}
?>
                        </div>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>