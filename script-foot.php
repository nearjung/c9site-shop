<script>
    $('.tooltip')
  .popup({
    on: 'click'
  })
;
</script>

<script>
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
</script>

<script>
			//$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				//$(".group1").colorbox({rel:'group1'});
				//$(".group2").colorbox({rel:'group2', transition:"fade"});
				//$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				//$(".group4").colorbox({rel:'group4', slideshow:true});
				//$(".ajax").colorbox();
				//$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				//$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				//$(".iframe").colorbox({iframe:true, width:"70%", height:"70%"});
				//$(".inline").colorbox({inline:true, width:"50%"});
				//$(".callbacks").colorbox({
					//onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					//onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					//onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					//onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					//onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				//$('.non-retina').colorbox({rel:'group5', transition:'none'})
				//$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				//$("#click").click(function(){ 
					//$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					//return false;
				});
			});
		</script>

<script type="text/javascript">
$(function(){
	$("ul#navi_containTab > li").click(function(event){
			var menuIndex=$(this).index();
			$("ul#detail_containTab > li:visible").hide();			
			$("ul#detail_containTab > li").eq(menuIndex).show();
	});
});
</script>

<script>
$('.tab').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
});
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>