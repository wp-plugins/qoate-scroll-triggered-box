<div class="wrap">
	<h2>Qoate Scroll Triggered Box Settings</h2>

	<div style="background: #efefef; padding:15px; margin:1em 0; border:1px solid #ccc; ">
		<p>This plugin is outdated, pease don't use it. Use my newer plugin called <a href="http://wordpress.org/plugins/scroll-triggered-boxes/">Scroll Triggered Boxes</a> instead. It does the same + more and is MUCH better.</p>
		<p><a href="http://wordpress.org/plugins/scroll-triggered-boxes/">It is available for download from the WordPress.org plugin repository &raquo;</a></p>
	</div>

	<p style="margin:5px">Here you can configure the content, the placement and the animation settings of the Qoate Scroll Triggered Box.</p>
	<form method="post" action="options.php">
		<?php settings_fields( 'qoate_sb_options' );  
		$options = qstb_get_options(); ?>
		<table class="form-table">
			<tr valign="top"><th scope="row">Show on</th>
				<td>
					<label><input type="checkbox" name="qoate_sb_holder[do_on_posts]" value="1"<?php if ( $options['do_on_posts']=='1' ) echo ' CHECKED';?> /> Posts</label> &nbsp; 
					<label><input type="checkbox" name="qoate_sb_holder[do_on_pages]" value="1"<?php if ( $options['do_on_pages']=='1' ) echo ' CHECKED';?> /> Pages</label> &nbsp; 
					<label><input type="checkbox" name="qoate_sb_holder[do_on_home]" value="1"<?php if ( $options['do_on_home']=='1' ) echo ' CHECKED';?> /> Home</label> &nbsp; 
					<label><input type="checkbox" name="qoate_sb_holder[do_on_archive]" value="1"<?php if ( $options['do_on_archive']=='1' ) echo ' CHECKED';?> /> Archives</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Give visitors the option to minimize?</th>
				<td><input type="checkbox" name="qoate_sb_holder[with_minimize]" value="1"<?php if ( $options['with_minimize']=='1' ) echo ' CHECKED';?> /></td>
			</tr>
			<tr valign="top"><th scope="row">Vertical Placement</th>
				<td>Top <input type="radio" name="qoate_sb_holder[vplacement]" value="top" <?php if ( $options['vplacement']=='top' ) echo ' CHECKED';?> />
					Bottom <input type="radio" name="qoate_sb_holder[vplacement]" value="bottom" <?php if ( $options['vplacement']=='bottom' ) echo ' CHECKED';?> /></td>
				</tr>
				<tr valign="top"><th scope="row">Horizontal Placement</th>
					<td>
						<label>Left <input type="radio" name="qoate_sb_holder[hplacement]" value="left"<?php if ( $options['hplacement']=='left' ) echo ' CHECKED';?> /></label> &nbsp; 
						<label>Right <input type="radio" name="qoate_sb_holder[hplacement]" value="right"<?php if ( $options['hplacement']=='right' ) echo ' CHECKED';?> /></label>
					</td>
					</tr>
					<tr valign="top"><th scope="row">Animation</th>
						<td>
							<label>Slide <input type="radio" name="qoate_sb_holder[animation]" value="slide"<?php if ( $options['animation']=='slide' ) echo ' CHECKED';?> /></label> &nbsp; 
							<label>Fade <input type="radio" name="qoate_sb_holder[animation]" value="fade"<?php if ( $options['animation']=='fade' ) echo ' CHECKED';?> /></label>
						</td>
						</tr>
						<tr valign="top"><th scope="row">When to show?</th>
							<td><input type="text" size="1" name="qoate_sb_holder[percentage]" value="<?php echo esc_attr($options['percentage']); ?>" />(% of total page height) ...or... show when at: <label><input type="radio" name="qoate_sb_holder[show_at_comments]" value="1" <?php if ( $options['show_at_comments']=='1' ) echo ' CHECKED';?> /> comments</label> &nbsp; <label><input type="radio" name="qoate_sb_holder[show_at_comments]" value="2"<?php if ( $options['show_at_comments']=='2' ) echo ' CHECKED';?> /> end of posts</label></td>
						</tr>
						<tr valign="top">
							<th scope="row">HTML Content(optional) <small><a href="#qoate_social_bookmark_settings">(You can also show social bookmarks!)</a></small></th>
							<td><textarea class="widefat" rows="8" cols="20" name="qoate_sb_holder[text]"><?php echo esc_textarea($options['text']);  ?></textarea></td>
						</tr>
					</table>

					<p class="submit">
						<input type="submit" class="button-primary" style="margin:5px;" value="<?php _e( 'Save Changes' ) ?>" />
					</p>

					<h3 class="" id="qoate_social_bookmark_settings">Social Bookmark Options</h3>

					<?php $sb_options = get_option( 'qoate_sb_settings', array( 'use_bookmarks' => 0, 'text'=>'Liked this post? Share it!' ) ); ?>
					<p style="margin:5px">Here you can choose to use social bookmarks where visitors can share your content. Note that if you use this, the HTML-content from above gets overruled.</p>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Use Social Bookmarking</th>
							<td><input type="checkbox" name="qoate_sb_settings[use_bookmarks]" value="1"<?php if ( $sb_options['use_bookmarks']=='1' ) echo ' CHECKED';?> /></td>
						</tr>
						<tr valign="top">
							<th scope="row">Heading</th>
							<td><input type="text" class="widefat" name="qoate_sb_settings[text]" value="<?php echo esc_attr($sb_options['text']);?>" /></td>
						</tr>
						<tr valign="top">
							<th scope="row">Share options</th>
							<td>
								<?php foreach ( $social_sites as $name => $site ) { ?>
									<label style="display:block"><input type="checkbox" value="1" name="qoate_sb_settings[<?php echo esc_attr($name); ?>]"<?php if ( isset($sb_options[$name]) && $sb_options[$name] ) echo ' CHECKED';?> /> <?php echo '<img width="18" style="vertical-align:middle;" height="18" src="'. QSTB_PLUGIN_URL . '/assets/img/social-media-icons/' . strtolower( $name ) . '.png" alt=' . $name . ' /> ' . $name; ?></label>
								<?php } ?>
							</td></tr>
						</table>
						<p class="submit">
							<input type="submit" class="button-primary" style="margin:5px;" value="<?php _e( 'Save Changes' ) ?>" />
						</p>

					</form>

					<div style="background: #efefef; padding:15px; margin:1em 0; border:1px solid #ccc; ">
		<p>This plugin is outdated, pease don't use it. Use my newer plugin called <a href="http://wordpress.org/plugins/scroll-triggered-boxes/">Scroll Triggered Boxes</a> instead. It does the same + more and is MUCH better.</p>
		<p><a href="http://wordpress.org/plugins/scroll-triggered-boxes/">It is available for download from the WordPress.org plugin repository &raquo;</a></p>
	</div>

				</div>
