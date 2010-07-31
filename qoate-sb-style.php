<?php
header("Content-type: text/css"); 
$vpos=$_GET['vpos'];
$hpos=$_GET['hpos'];
$rb=$_GET['rb'];
?>
#qoate_social_bookmark{
position:fixed;
padding:15px;
text-align:center;
font-family:Verdana;
height:<?php echo $_GET['height']; ?>px;
display:none;
<?php
if($hpos=='left' && $vpos=='bottom') {
		echo 'bottom:0;border-top:1px solid black;';
		echo 'left:0;border-right:1px solid black;';
		if($rb==1){ echo '-webkit-border-top-right-radius: 5px; -moz-border-radius-topright: 5px; border-top-right-radius: 5px;'; }
}
if($hpos=='right' && $vpos=='bottom') {
		echo 'bottom:0;border-top:1px solid black;';
		echo 'right:0;border-left:1px solid black;';
		if($rb==1){ echo '-webkit-border-top-left-radius: 5px; -moz-border-radius-topleft: 5px; border-top-left-radius: 5px;'; }
}
if($vpos=='top' && $hpos =='left') {
		echo 'top:0;border-bottom:1px solid black;';
		echo 'left:0;border-right:1px solid black;';
		if($rb==1){ echo '-webkit-border-bottom-right-radius: 5px; -moz-border-radius-bottomright: 5px; border-bottom-right-radius: 5px;'; }
}
if($vpos=='top' && $hpos=='right') {
		echo 'right:0;border-left:1px solid black;';
		echo 'top:0;border-bottom:1px solid black;';
		if($rb==1){ echo '-webkit-border-bottom-left-radius: 5px; -moz-border-radius-bottomleft: 5px; border-bottom-left-radius: 5px;'; }
}
if(strlen($_GET['bgc']) > 0) {
	echo 'background-color:'.$_GET['bgc'].';
	'; }
if(strlen($_GET['tc']) > 0) {
	echo 'color:'.urldecode($_GET['tc']).';
	'; }
echo ''.urldecode($_GET['css']);
?>
}