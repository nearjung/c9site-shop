<script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=no, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>
<div class="menumem">
        <ul>
            <li class="memprofile">
                <b>สวัสดี <?php echo $username; ?></b><br>
                Cash : <?php echo number_format($point); ?> | Gold : <?php if(!empty($charname)){ echo number_format($gold); } else { echo "0"; } ?><br>
                Char : <?php if(!empty($charname)){ echo $charname; } else { echo "กรุณาเลือกตัวละคร"; } ?> <button class="ui mini blue button" onclick="popup('chgchar.php','เปลี่ยนตัวละคร',400,300)">เปลี่ยน</button>
            </li>
            <li><a href="member-topup.php">เติมเงิน</a></li>
            <li><a href="member-gold.php">ร้านโกลด์</a></li>
            <li><a href="member-cash.php">ไอเทมมอล</a></li>
            <li><a href="logout.php">ออกจากระบบ</a></li>
        </ul>
    </div>