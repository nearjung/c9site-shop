<?
include ('../cp/connect.php');
	
	$Query = mysql_query("SELECT * FROM tb_slide ORDER BY slide_id DESC ");
	$totalp = mysql_num_rows($Query);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<style type="text/css">
<!--
body,td,th {
	font-family: tahoma;
	font-size: 12px;
}
body {
	background-repeat: no-repeat;
}
-->
</style><head>
    <title>Nivo Slider Demo</title>
    <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="scripts/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	
	
    <script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
    effect: 'boxRain',                 // Specify sets like: 'fold,fade,sliceDown'
});
    });
    </script>	
	
	
</head>
<body>

<table width="720" height="280" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
     <td>

      <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
        
        <?
while($r=mysql_fetch_array($Query)){
$slide_id = $r['slide_id'];
$slide_name= $r['slide_name'];
$slide_detail=$r['slide_detail'];
$slide_img=$r['slide_img'];
$slide_link=$r['slide_link'];

$count++;
    
    
    if($slide_link!=''){
echo"<a href='$slide_link' target='_blank'><img src='../images/slide/$slide_img' alt='' /></a> ";

	}else{
echo"<img src='../images/slide/$slide_img' alt='' /> ";
	}

}

mysql_close();

?>
 

</div>
      </div></td>
  </tr>
</table>	
	
</body>
</html>