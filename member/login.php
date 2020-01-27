<?php
session_start();
include_once("../include/setting.php");
if($_SESSION['user_no'] != "")
{
	$api->go("index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include"script-head.php";?>
</head>

<body class="bodymember">
	<div class="boxlogin">
    	<div class="h-login">Login<font color="#ff0000">User</font></div>
        
        <div style="width:250px; text-align:center; margin:auto;">
        <form action="" method="post" class=" form-horizontal">
          <div class="form-group">
        	<input type="text" id="user" name="user" placeholder="username" class="form-control"/>
            </div>
            <div class="form-group">
            <input type="password" id="pass" name="pass" placeholder="password" class="form-control" />
            </div>
            <div class="form-group">
            <input type="submit" name="submit"  value="Login" class="btn btn-danger" style="width:280px;" />
            </div>
        </form>
		<?php
			if($_POST['submit'])
			{
				echo "ok";
				$api->member_login($_POST['user'],$_POST['pass']);
			}
		?>
        </div>
        
    </div>
</body>
</html>