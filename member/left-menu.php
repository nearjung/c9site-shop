 <div style="width:120px; float:left; height:auto;margin-right:10px;">
        	<div style="margin-bottom:10px;">
            ยินดีต้อนรับ<br />
			<b>คุณ :</b> <?php echo $_SESSION['account']; ?><br />
			<b>Point :</b> <?php echo number_format($acc['cPoint']); ?><br />
            </div>
            
			<a href="index.php" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-home"></span> หน้าแรก</a>
            <a href="index.php?page=editpass" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-edit"></span> เปลี่ยนรหัส</a>
            <a href="../member-topup.php" target="_blank" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-credit-card"></span> เติมเงิน</a>
            <a href="#" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-fire"></span> ไอเทมโค๊ด</a>
            <?php
			if($event_online == 1)
			{
				echo '<a href="index.php?page=exchange" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-fire"></span> เวลาเป็นแคช</a>';
			}
			if($event_recive == 1)
			{
				echo '<a href="index.php?page=recive" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-fire"></span> รับไอเท็ม</a>';
			}
			if($event_create == 1)
			{
				echo '<a href="index.php?page=create" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-fire"></span> สร้างตัวละคร</a>';
			}
			?>
            <a href="../logout.php" class="btn btn-default btn-sm bt-mem"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ</a>
            
            
        </div>