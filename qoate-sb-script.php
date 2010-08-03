var $q = jQuery.noConflict();
var anim = "<?php echo $_GET["anim"] ?>";
var perc = <?php echo $_GET['perc']; ?>;
var pos = '<?php echo $_GET['vpos']; ?>';
var sac = '<?php echo $_GET['sac']; ?>';

$q(document).ready(function(){
var old_height = $q('#qoate_social_bookmark').css('height');
	$q(window).scroll(function(){
		// get the height of the document
		var h = $q(document).height();
		var y = $q(window).scrollTop();
			if(sac!='1') {
				if( (y*2) > (h*(perc/100))){
					showTheBox();
				} else {
					hideTheBox();
				}
			} else {
				var c = $q('#comments').offset();
				if(y>(c.top * 0.75)) {
					showTheBox();
				} else {
					hideTheBox();
				}
			}
	});
	// Minimize the box
	$q('#qoate_close_box').click(function() {
		$q("#qoate_social_bookmark").animate({
			height:'12px',
		},1000,function() {
			$q('#qoate_close_box').css('display','none');
			$q('#qoate_show_box').css('display','');
		});
	});
	
	// Maximize the box
	$q('#qoate_show_box').click(function() {
		$q("#qoate_social_bookmark").animate({
			height:old_height,
		},1000,function() {
			$q('#qoate_close_box').css('display','');
			$q('#qoate_show_box').css('display','none');
		});
	});
})

function showTheBox()
{
	// check which animation to do
	if(anim=='slide') {
		$q("#qoate_social_bookmark").show("slow");
	} else if(anim=='fade') {
		$q("#qoate_social_bookmark").fadeIn("slow");
	}
}

function hideTheBox()
{
	// check which animation to do
	if(anim=='fade'){
		$q('#qoate_social_bookmark').fadeOut('slow');
	} else {
		$q('#qoate_social_bookmark').hide('slow');
	}
}