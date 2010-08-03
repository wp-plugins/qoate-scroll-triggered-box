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
if($hpos=='left') {
	echo 'left:0; border-right:1px solid black;';
} else {
	echo 'right:0; border-left:1px solid black;';
}
if($vpos=='top') {
	echo 'top:0; border-bottom:1px solid black;';
} else {
	echo 'bottom:0; border-top:1px solid black;';
}
?>
}

#qoate_social_bookmark h4{
font-size:19px;
font-color:#000;
margin-bottom:10px;
font-weight:bold;
text-shadow:1px 1px 1px;
}
#qoate_social_bookmark a img{
float:left;
opacity:0.8;
filter:alpha(opacity=80);
margin:0;
-moz-opacity:0.8;
-khtml-opacity: 0.8;
}
#qoate_social_bookmark a img:hover{
opacity:1;
filter:alpha(opacity=100);
-moz-opacity:1;
-khtml-opacity:1;
}