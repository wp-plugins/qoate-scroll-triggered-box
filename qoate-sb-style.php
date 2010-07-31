<?php
header("Content-type: text/css"); 
$vpos=$_GET['vpos'];
$hpos=$_GET['hpos'];
?>
#qoate_social_bookmark{
position:fixed;
padding:15px;
text-align:center;
font-family:Verdana;
<?php
if($vpos=='top'){
	echo 'top:0;border-bottom:1px solid black;';
} else {
	echo 'bottom:0;border-top:1px solid black;';
}
if($hpos=='right') {
echo 'right:0;border-left:1px solid black;';
} else {
echo 'left:0;border-right:1px solid black;';
}
?>
height:<?php echo $_GET['height']; ?>px;
display:none;
}