<?php
add_action('admin_init', 'qoate_sb_settings_init' );
add_action('admin_print_styles','add_qoate_box_dashboard_style');
add_action('admin_menu', 'qoate_add_sb_options_page');

function add_qoate_box_dashboard_style(){
	wp_enqueue_style('qoate_admin_style', WP_CONTENT_URL .'/plugins/'. plugin_basename(dirname(__FILE__)).'/'. 'qoate_dashboard_layout.css');
}

// Add menu page
function qoate_add_sb_options_page() {
	add_options_page('Qoate Scroll Triggered Box', 'Qoate Scroll Triggered Box', 'manage_options', 'qoate-sb-settings', 'qoate_create_sb_options_page');
}

// Init plugin options to white list our options
function qoate_sb_settings_init(){
	register_setting('qoate_sb_options', 'qoate_sb_holder');
}

// Draw the menu page itself
function qoate_create_sb_options_page() {
	?>
<div class="wrap">
	<h2>Qoate Scroll Triggered Box Settings</h2>
	<div class="postbox-container" style="width:70%;">
		<div class="metabox-holder">	
			<div class="meta-box-sortables">
				<div class="postbox">
					<h3 class="hndle"><span>Placement, animation and content settings.</span></h3>
					<div class="inside">
					<p style="margin:5px">Here you can configure the content, the placement and the animation settings of the Qoate Scroll Triggered Box. Scroll below to do some advanced styling..</p>
					<form method="post" action="options.php">
						<?php settings_fields('qoate_sb_options');  $options = get_option('qoate_sb_holder',array('height'=>20,'vplacement'=>'bottom','hplacement'=>'right','animation'=>'slide','percentage'=>75,'text'=>'Your HTML-content goes here..','bgcolor'=>'white','textcolor'=>'black')); ?>
						<table class="form-table">
						<tr valign="top"><th scope="row">Height</th>
							<td><input type="text" size="1" name="qoate_sb_holder[height]" value="<?php echo $options['height']; ?>" />px </td>
						</tr>
						<tr valign="top"><th scope="row">Vertical Placement</th>
							<td>Top <input type="radio" name="qoate_sb_holder[vplacement]" value="top"<?php if($options['vplacement']=='top') echo ' CHECKED';?> />
							Bottom <input type="radio" name="qoate_sb_holder[vplacement]" value="bottom"<?php if($options['vplacement']=='bottom') echo ' CHECKED';?> /></td>
						</tr>
						<tr valign="top"><th scope="row">Horizontal Placement</th>
							<td>Left <input type="radio" name="qoate_sb_holder[hplacement]" value="left"<?php if($options['hplacement']=='left') echo ' CHECKED';?> />
							Right <input type="radio" name="qoate_sb_holder[hplacement]" value="right"<?php if($options['hplacement']=='right') echo ' CHECKED';?> /></td>
						</tr>
						<tr valign="top"><th scope="row">Animation</th>
							<td>Slide <input type="radio" name="qoate_sb_holder[animation]" value="slide"<?php if($options['animation']=='slide') echo ' CHECKED';?> />
							Fade <input type="radio" name="qoate_sb_holder[animation]" value="fade"<?php if($options['animation']=='fade') echo ' CHECKED';?> /></td>
						</tr>
						<tr valign="top"><th scope="row">When to show?</th>
							<td><input type="text" size="1" name="qoate_sb_holder[percentage]" value="<?php echo $options['percentage'];?>" />(% of total page height)</td>
						</tr>
						<tr valign="top"><th scope="row">Content (HTML)</th>
							<td><textarea rows="8" cols="20" name="qoate_sb_holder[text]"><?php echo $options['text'];  ?>
							</textarea></td>
						</tr>
					</table>
					<p class="submit">
							<input type="submit" class="button-primary" style="margin:5px;" value="<?php _e('Save Changes') ?>" />
					</p>
				
				</div>				
			</div>
			<div class="postbox">
			<h3 class="hndle"><span>Advanced Styling Settings</span></h3>
				<div class="inside">
					<p style="margin:5px">This is where you can do some advanced CSS styling.</p>
					<table class="form-table">
						<tr valign="top"><th scope="row">Use rounded borders?<small>(won't work in IE,IE sucks.)</small></th>
							<td><input type="checkbox" name="qoate_sb_holder[roundedborders]" value="1"<?php if($options['roundedborders']=='1') echo ' CHECKED';?> /></td>
						</tr>
						<tr valign="top"><th scope="row">Background color</th>
							<td><input type="text" size="4" name="qoate_sb_holder[bgcolor]" value="<?php echo $options['bgcolor'];?>" />(use obvious color name or hex codes e.g. black or #000000)</td>
						</tr>
						<tr valign="top"><th scope="row">Text color</th>
							<td><input type="text" size="4" name="qoate_sb_holder[textcolor]" value="<?php echo $options['textcolor'];?>" />(use obvious color name or hex codes e.g. black or #000000)</td>
						</tr>
						<tr valign="top"><th scope="row">Custom CSS<small> (custom css rules, e.g. text-align:left;)</th>
							<td><textarea rows="4" cols="15" name="qoate_sb_holder[css]"><?php echo $options['css'];  ?>
							</textarea></td>
						</tr>
						
						
					</table>
					<p class="submit">
							<input type="submit" class="button-primary" style="margin:5px;" value="<?php _e('Save Changes') ?>" />
					</p>
				</div>
			</div>
			</form>
</div>
</div>
</div>
</div>
	<!-- Qoate Right Sidebar -->
		<?php include('qoate-right-sidebar.php'); ?>
</div>
<?php } ?>