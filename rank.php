<?php include"script-head.php";?>

<?php include"topbar.php"; ?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">ทำเนียบ</div>
            
            <div class="inner">
                
                <table class="ui inverted table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อตัวละคร</th>
                            <th>อาชีพ</th>
                            <th>แต้ม</th>
                        </tr>
                    </thead>
                    <?php
		// PVP RANK
		$c = 1;
		$pvp_sql = $sql->prepare("SELECT TOP 50 * FROM C9World.Game.TblPcPvPInfo ORDER BY cScore DESC");
		$pvp_sql->execute();
		while($pvp = $pvp_sql->fetch(PDO::FETCH_ASSOC))
		{
			// Char Name
			$charpvp_sql = $sql->prepare("SELECT cPcNm,cPcClass FROM C9World.Game.TblPcBase WHERE cPcNo = :charid");
			$charpvp_sql->BindParam(":charid",$pvp['cPcNo']);
			$charpvp_sql->execute();
			$charpvp = $charpvp_sql->fetch(PDO::FETCH_ASSOC);
			echo '
                    <tr>
                        <td>'.$api->rank_icon($c++).'</td>
                        <td>'.$charpvp['cPcNm'].'</td>
                        <td>'.$api->job_name($charpvp['cPcClass']).'</td>
                        <td>'.$pvp['cScore'].'</td>
                    </tr>';
		}
		?>
                    
                </table>
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>