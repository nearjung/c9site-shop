<?php include"script-head.php";?>

<?php  include"topbar.php"; ?>

<?php
if($_SESSION['account'] != "")
{
	$api->go("member-gold.php");
}
?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">ลงชื่อเข้าใช้</div>
            
            <div class="inner">
                
                
<div class="ui middle aligned center aligned grid" style="width:400px;margin:auto;">
  <div class="column">
    <h2 class="ui red image header">
      
        Log-in to your account
      
    </h2>
    <form class="ui large form" method="post" action="">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="user" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
		<input type="submit" name="submit" id="submit" class="ui fluid large red submit button" value="Login" />
      </div>

      <div class="ui error message"></div>

    </form>
	
	<?php
		if($_POST['submit'])
		{
			$api->login($_POST['user'],$_POST['password']);
		}
	?>

    <div class="ui message">
      ยังไม่มีชื่อผู้ใช้? <a href="register.php"> สมัครสมาชิก</a>
    </div>
  </div>
</div>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>