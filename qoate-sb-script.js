var $q = jQuery.noConflict();
var anim = <?php $_GET["anim"] ?>;
$q(document).ready(function(){
 $q(window).scroll(function(){
  // get the height of #wrap
  var h = $q(document).height();
  var y = $q(window).scrollTop();
  if( y > (h*.4)){
   // if we are show keyboardTips
   $q("#qoate_social_bookmark").slideDown("slow");
   window.alert(anim);
  } else {
   $q('#qoate_social_bookmark').slideUp('slow');
  }
 });
})