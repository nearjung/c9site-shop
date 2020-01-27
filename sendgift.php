<?php include"script-head.php";
include_once("cp/connect.php"); ?>

<?php  include"topbar.php"; ?>

<?php
if($_SESSION['account'] == "")
{
	$api->go("member-gold.php");
}
else
{
	$id = $_GET['itemid'];
	// Get Item Information
	$item_sql = mysql_query("SELECT * FROM tb_shopcash_item WHERE id = '".$api->cl($id)."'");
	$item = mysql_fetch_assoc($item_sql);

	$character_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNo = :no");
	$character_sql->BindParam(":no",$_SESSION['charid']);
	$character_sql->execute();
	$character = $character_sql->fetch(PDO::FETCH_ASSOC);

	$charname = $character['cPcNm'];
	if($charname == "")
	{
		$api->popup("กรุณาเลือกตัวละครก่อนค่ะ");
		$api->go("member-cash.php");
	}
}
?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">ส่งของขวัญ</div>
            
            <div class="inner">
                
                
<div class="ui middle aligned center aligned grid" style="width:400px;margin:auto;">
  <div class="column">
    <h2 class="ui red image header">
      <?php
	  
// Get Item Information
$item_sql = mysql_query("SELECT * FROM tb_shopcash_item WHERE id = '".$api->cl($id)."'");
$item = mysql_fetch_assoc($item_sql);
$itemid = $id;
$itemname = $item['item_name'];
?>
        <?php echo "เพื่อนของตัวละคร ".$charname."<br>คุณกำลังส่งไอเท็ม  ".$itemname." เป็นของขวัญให้เพื่อนของคุณ"; ?>
      
    </h2>
    <form class="ui large form" method="post" action="buygift.php">
      <div class="ui stacked segment">
        <div class="field">
		<input name="itemid" type="hidden" value="<?php echo $id; ?>" />
                <select name="charname" class="register_box" id="charname">
				<option value="0">=== กรุณาเลือกชื่อเพื่อนค่ะ ===</option>
                <?php
				// Char List
				$char_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBuddy WHERE cPcNo = :no ORDER BY cBuddyPcNo DESC");
				$char_sql->BindParam(":no",$_SESSION['charid']);
				$char_sql->execute();
				if($api->friend_count($_SESSION['charid']) == 0)
				{
					echo '<option value="0">ไม่พบเพื่อนค่ะ</option>';
				}
				else
				{
					while($char = $char_sql->fetch(PDO::FETCH_ASSOC))
					{
						// Character Name
						$friend_sql = $sql->prepare("SELECT * FROM C9World.Game.TblPcBase WHERE cPcNo = :p1");
						$friend_sql->BindParam(":p1",$char['cBuddyPcNo']);
						$friend_sql->execute();
						$friend = $friend_sql->fetch(PDO::FETCH_ASSOC);
						echo '<option value="'.$friend['cPcNo'].'">'.$friend['cPcNm'].'</option>';
					}
				}
				?>
        </div>
		<input type="submit" name="submit" id="submit" class="ui fluid large red submit button" value="ส่งของขวัญ" />
      </div>

      <div class="ui error message"></div>

    </form>

  </div>
  <br><br>จำนวนแคชคงเหลือ : <?php echo $point; ?>
</div>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>