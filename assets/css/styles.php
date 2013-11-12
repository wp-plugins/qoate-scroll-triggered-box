<?php
header("Content-type: text/css"); 
$vpos = $_GET['vpos'];
$hpos = $_GET['hpos'];
?>

html, body{ min-height: 100%; }

#qoate-scroll-triggered-box {
	-webkit-box-sizing: border-box;
	-box-sizing: border-box;
	-moz-box-sizing: border-box;
	background:transparent url("../img/overlay.png");
	position:fixed;
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
	overflow:hidden;
	padding:15px;
}

#qoate-scroll-triggered-box h4{
	font-size:20px;
	margin:0 0 10px 0;
	font-weight:bold;
}

#qoate-scroll-triggered-box a{ 
	display:inline-block; 
}

#qoate-scroll-triggered-box a img{
	opacity:0.8;
	border:0;
	filter:alpha(opacity=80);
	margin:0;
	-moz-opacity:0.8;
	-khtml-opacity: 0.8;
	line-height:0;
}

#qoate-scroll-triggered-box a img:hover{
	opacity:1;
	filter:alpha(opacity=100);
	-moz-opacity:1;
	-khtml-opacity:1;
}