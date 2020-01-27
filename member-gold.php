<?php include"script-head.php";
 $catalog = $_GET['catalog'];
 ?>
<?php include_once("cp/connect.php"); ?>
<?php include"topbar.php"; ?>

<?php include"menumem.php"; ?>

<div class="main">
    
    <div class="contentweb" style="margin-top:170px;">
        <div class="bgmain">
            
            <div class="title">ร้านค้าโกลด์</div>
            
            <div class="inner">
                
                <!--<table class="ui inverted table">
                    <tr>
                        <td width="30">#</td>
                        <td><h4 class="ui orange header">All</h4></td>
                        <td>ทั้งหมด | เครื่องประดับ</td>
                    </tr>
                    <tr>
                        <td><img src="images/01_01.png"></td>
                        <td><h4 class="ui orange header">Fighter</h4></td>
                        <td>ทั้งหมด | แฟชั่น | สวมใส่ | อาวุธ</td>
                    </tr>
                    <tr>
                        <td><img src="images/02_01.png"></td>
                        <td><h4 class="ui orange header">Hunter</h4></td>
                        <td>ทั้งหมด | แฟชั่น | สวมใส่ | อาวุธ</td>
                    </tr>
                    <tr>
                        <td><img src="images/03_01.png"></td>
                        <td><h4 class="ui orange header">Shaman</h4></td>
                        <td>ทั้งหมด | แฟชั่น | สวมใส่ | อาวุธ</td>
                    </tr>
                    <tr>
                        <td><img src="images/04_01.png"></td>
                        <td><h4 class="ui orange header">Witchblade</h4></td>
                        <td>ทั้งหมด | แฟชั่น | สวมใส่ | อาวุธ</td>
                    </tr>
                    <tr>
                        <td><i class="star icon"></i></td>
                        <td><h4 class="ui orange header">Other Item</h4></td>
                        <td>ทั้งหมด | POTION | STONE | POINTED | SCROLL | SKILL BOOK</td>
                    </tr>
                </table>-->
                
                <table class="ui inverted table">
                    <thead>
                    <tr style="font-weight:bold; color: orange;">
                        <th style="color: orange;">All</th>
                        <th style="color: orange;"><img src="images/01_01.png"> Fighter</th>
                        <th style="color: orange;"><img src="images/02_01.png"> Hunter</th>
                        <th style="color: orange;"><img src="images/03_01.png"> Shaman</th>
                        <th style="color: orange;"><img src="images/04_01.png"> Witchblade</th>
                        <th style="color: orange;">Other item</th>
                    </tr>
                    </thead>
                    
                    <tr>
                        <td class="top aligned">
                            <div class="ui middle aligned selection list inverted">
                                
                              
                                
                              <a class="item" href="member-gold.php?catalog=2">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">เครื่องประดับ</div>
                                </div>
                              </a>
                                
                            </div>
                        </td>
                        
                        <td class="top aligned">
                            <div class="ui middle aligned selection list inverted">
                                
                              
                                
                              <a class="item" href="member-gold.php?catalog=3">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">แฟชั่น</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=4">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">สวมใส่</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=5">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">อาวุธ</div>
                                </div>
                              </a>
                                
                            </div>
                        </td>
                        
                        <td class="top aligned">
                            <div class="ui middle aligned selection list inverted">
                                
                              
                                
                              <a class="item" href="member-gold.php?catalog=7">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">แฟชั่น</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=8">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">สวมใส่</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=9">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">อาวุธ</div>
                                </div>
                              </a>
                                
                            </div>
                        </td>
                        <td class="top aligned">
                            <div class="ui middle aligned selection list inverted">
                                
                              
                                
                              <a class="item" href="member-gold.php?catalog=11">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">แฟชั่น</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=12">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">สวมใส่</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=13">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">อาวุธ</div>
                                </div>
                              </a>
                                
                            </div>
                        </td>
                        <td class="top aligned">
                            <div class="ui middle aligned selection list inverted">
                                
                              
                                
                              <a class="item" href="member-gold.php?catalog=15">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">แฟชั่น</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=16">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">สวมใส่</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=17">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">อาวุธ</div>
                                </div>
                              </a>
                                
                            </div>
                        </td>
                        
                        <td class="top aligned">
                            <div class="ui middle aligned selection list inverted">
                                
                              
                                
                              <a class="item" href="member-gold.php?catalog=19">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">Potion</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=20">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">Stone</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=21">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">Pointed</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=22">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">Scroll</div>
                                </div>
                              </a>
                                
                                <a class="item" href="member-gold.php?catalog=23">
                                <i class="caret right icon"></i>
                                <div class="content">
                                  <div class="header">Skill Book</div>
                                </div>
                              </a>
                                
                            </div>
                        </td>
                        
                    </tr>
                </table>
                
                
                <div class="ui inverted segment" style="text-align:center; ">                
<div class="ui inverted form">
  <div class="inline field">
	<form name="searchitem" action="member-gold.php?catalog=search" method="post">
    <label class="ui orange label">ไอเทมที่พบ <?php if($catalog == 1){ 
		$objQuery = mysql_query("SELECT * FROM tb_shopgold_item");
		$Num_Rows = mysql_num_rows($objQuery);
		echo $Num_Rows; } else if($catalog == "search"){ 
		$objQuery = mysql_query("SELECT * FROM tb_shopgold_item WHERE(item_name LIKE '%".$api->cl($_POST['itemname'])."%' )");
		$Num_Rows = mysql_num_rows($objQuery);
		echo $Num_Rows; }  else { 
		$objQuery = mysql_query("SELECT * FROM tb_shopgold_item WHERE id_type = '".$api->cl($catalog)."'");
		$Num_Rows = mysql_num_rows($objQuery);
		echo $Num_Rows;  }
		?> ชิ้น</label>
    <input type="text" name="itemname" placeholder="Search" style="width:250px;">
    <input type="submit" value="ค้นหา" class="ui orange button">
	</form>
  </div>
</div>
</div>
 <?php
 $page = $_GET['page'];

 if($catalog == "")
 {
	 $api->go("member-gold.php?catalog=1");
 }
 else
 {
	 if($catalog == 1)
	 {		
		$objQuery = mysql_query("SELECT * FROM tb_shopgold_item");
		$Num_Rows = mysql_num_rows($objQuery);

		$Per_Page = 10;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}



		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows = 0;
		$query = mysql_query("SELECT * FROM tb_shopgold_item ORDER BY id DESC LIMIT $Page_Start , $Per_Page");
		while($item = mysql_fetch_array($query))
		{
			echo "<td>"; 
			$intRows++;
	?>
                <div class="boxitem">
                    <div class="ribbon rblue"><span>Gold</span></div>
                    <div class="bgitem">
                        <img src="images/item/<?php echo $item['item_id']; ?>.png" width="70">
                    </div>
                    <?php echo $item['item_name']; ?>
                    <br><br>
                    <label class="ui mini label"><?php echo number_format($item['item_price']); ?> Gold</label>
                    <br><br>
                    <a class="ui mini orange button" href="buygold.php?itemid=<?php echo $item['id']; ?>">Buy</a> 
                    <a class="ui mini button tooltip" 
                       data-html="
                                     จำนวน : <?php echo number_format($item['item_count']); ?> ชิ้น <br>
                                     คุณสมบัติ : <?php echo $item['item_description']; ?>
                                     " 
                       data-variation="tiny inverted">Detail</a> 
                </div>
<?php
			echo"</td>";
			if(($intRows)%5==0)
			{
				echo"</tr>";
			}
		}
	 }
	 else if($catalog == "search")
	 {
		$item_name = $_POST['itemname'];
		$objQuery = mysql_query("SELECT * FROM tb_shopgold_item WHERE(item_name LIKE '%".$api->cl($item_name)."%' )");
		$Num_Rows = mysql_num_rows($objQuery);

		$Per_Page = 10;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}



		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows = 0;
		$query = mysql_query("SELECT * FROM tb_shopgold_item WHERE(item_name LIKE '%".$api->cl($item_name)."%' ) ORDER BY id DESC LIMIT $Page_Start , $Per_Page");
		while($item = mysql_fetch_array($query))
		{
			echo "<td>"; 
			$intRows++;
	?>
                <div class="boxitem">
                    <div class="ribbon rblue"><span>Gold</span></div>
                    <div class="bgitem">
                        <img src="images/item/<?php echo $item['item_id']; ?>.png" width="70">
                    </div>
                    <?php echo $item['item_name']; ?>
                    <br><br>
                    <label class="ui mini label"><?php echo number_format($item['item_price']); ?> Gold</label>
                    <br><br>
                    <a class="ui mini orange button" href="buygold.php?itemid=<?php echo $item['id']; ?>">Buy</a> 
                    <a class="ui mini button tooltip" 
                       data-html="
                                     จำนวน : <?php echo number_format($item['item_count']); ?> ชิ้น <br>
                                     คุณสมบัติ : <?php echo $item['item_description']; ?>
                                     " 
                       data-variation="tiny inverted">Detail</a> 
                </div>
<?php
			echo"</td>";
			if(($intRows)%5==0)
			{
				echo"</tr>";
			}
		}
	 }
	 else
	 {	
		$objQuery = mysql_query("SELECT * FROM tb_shopgold_item WHERE id_type = '".$api->cl($catalog)."'");
		$Num_Rows = mysql_num_rows($objQuery);

		$Per_Page = 10;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}



		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows = 0;
		$query = mysql_query("SELECT * FROM tb_shopgold_item WHERE id_type = '".$api->cl($catalog)."' ORDER BY id DESC LIMIT $Page_Start , $Per_Page");
		while($item = mysql_fetch_array($query))
		{
			echo "<td>"; 
			$intRows++;
	?>
                <div class="boxitem">
                    <div class="ribbon rblue"><span>Gold</span></div>
                    <div class="bgitem">
                        <img src="images/item/<?php echo $item['item_id']; ?>.png" width="70">
                    </div>
                    <?php echo $item['item_name']; ?>
                    <br><br>
                    <label class="ui mini label"><?php echo number_format($item['item_price']); ?> Gold</label>
                    <br><br>
                    <a class="ui mini orange button" href="buygold.php?itemid=<?php echo $item['id']; ?>">Buy</a> 
                    <a class="ui mini button tooltip" 
                       data-html="
                                     จำนวน : <?php echo number_format($item['item_count']); ?> ชิ้น <br>
                                     คุณสมบัติ : <?php echo $item['item_description']; ?>
                                     " 
                       data-variation="tiny inverted">Detail</a> 
                </div>
<?php
			echo"</td>";
			if(($intRows)%5==0)
			{
				echo"</tr>";
			}
		}
	 }
 }
		echo"</tr></table>";
?>        
          
		ทั้งหมด <?php echo $Num_Rows;?> รายการ : <?php echo $Num_Pages;?> หน้า :
		<?php
		if($Prev_Page)
		{
			echo " <a href='$_SERVER[SCRIPT_NAME]?catalog=$catalog&Page=$Prev_Page'><< ย้อนกลับ</a> ";
		}

		for($i=1; $i<=$Num_Pages; $i++){
			if($i != $Page)
			{
				echo "[ <a href='$_SERVER[SCRIPT_NAME]?catalog=$catalog&Page=$i'>$i</a> ]";
			}
			else
			{
				echo "<b> $i </b>";
			}
		}
		if($Page!=$Num_Pages)
		{
			echo " <a href ='$_SERVER[SCRIPT_NAME]?catalog=$catalog&Page=$Next_Page'>ถัดไป >></a> ";
		}
		?>
      
                
                
                
                
                
                
            </div>
            
        </div>
    </div>
    
</div>

<?php include"footer.php";?>


<?php include"script-foot.php";?>