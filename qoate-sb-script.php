var $q = jQuery.noConflict();
var anim = "<?php echo $_GET["anim"] ?>";
var perc = <?php echo $_GET['perc']; ?>;
var pos = '<?php echo $_GET['vpos']; ?>';
$q(document).ready(function(){
 $q(window).scroll(function(){
  // get the height of #wrap
  var h = $q(document).height();
  var y = $q(window).scrollTop();
  if( (y*2) > (h*(perc/100))){
   // check which animation to do
	if(anim=='slide') {
		$q("#qoate_social_bookmark").show("slow");
	} else if(anim=='fade') {
		$q("#qoate_social_bookmark").fadeIn("slow");
	}
  } else {
	if(anim=='fade'){
		$q('#qoate_social_bookmark').fadeOut('slow');
	} else {
		$q('#qoate_social_bookmark').hide('slow');
	}
  }
 });
})