<?php header('Content-Type: text/javascript'); ?>

(function($) {

	var anim = "<?php echo $_GET["anim"] ?>";
	var perc = parseInt("<?php echo $_GET['perc']; ?>");
	var pos = '<?php echo $_GET['vpos']; ?>';
	var sac = '<?php echo $_GET['sac']; ?>';

	$(document).ready(function(){

		var oldHeight = $('#qoate_social_bookmark').css('height');
		var documentHeight = $(document).height();
		var windowHeight = $(window).height();
		var triggerHeight;
		$box = $("#qoate-scroll-triggered-box");

		if(sac == '0') {
			triggerHeight = (documentHeight * (perc / 100));
		} else if(sac == '1') {

			$el = $("#comments");

			if(!$el.length) {
				$el = $("#respond");
			}

			triggerHeight = $el.offset().top - (0.75 * windowHeight);
		} else if(sac == '2') {
			$el = $(".post");
			triggerHeight = ($el.offset().top + $el.height() - (1.1 * windowHeight));
		}

		$(window).scroll(function(){
			// get the height of the document
			var y = $(window).scrollTop();

			if((y + windowHeight) >= triggerHeight) {
				showTheBox();
			} else {
				hideTheBox();
			}	
		});

		// Minimize the box
		$('#qoate_close_box').click(function() {
			$box.animate({
				height: '12px',
				padding: '0',
			},1000,function() {
				$('#qoate_close_box').hide();
				$('#qoate_show_box').show();
			});
		});
		
		// Maximize the box
		$('#qoate_show_box').click(function() {
			$box.animate({
				height: oldHeight,
			},1000, function() {
				$('#qoate_close_box').show();
				$('#qoate_show_box').hide();
			});
		});
	})

	function showTheBox()
	{
		// check which animation to do
		if(anim=='slide') {
			$box.show("slow");
		} else if(anim=='fade') {
			$box.fadeIn("slow");
		}
	}

	function hideTheBox()
	{
		// check which animation to do
		if(anim=='fade'){
			$box.fadeOut('slow');
		} else {
			$box.hide('slow');
		}
	}

})(jQuery);