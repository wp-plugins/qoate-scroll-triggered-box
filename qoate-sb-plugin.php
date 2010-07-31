<?php
add_action("wp_print_styles", "qoate_load_sb_stylesheet");
add_action('wp_footer','qoate_add_sb',99);
add_action("wp_print_scripts","qoate_sb_add_scripts");

/*Load the neccessary stylesheets and scripts!*/
function qoate_load_sb_stylesheet() {
$options = get_option('qoate_sb_holder',array('height'=>20,'vplacement'=>'bottom','hplacement'=>'right','animation'=>'slide'));
	wp_enqueue_style('qoate_sb_style', WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)). '/qoate-sb-style.php?vpos='.$options['vplacement'].'&hpos='.$options['hplacement'].'&height='.$options['height']);
}
function qoate_sb_add_scripts() {
$options = get_option('qoate_sb_holder',array('height'=>20,'vplacement'=>'bottom','animation'=>'slide','percentage'=>75));
wp_enqueue_script('jquery');
wp_enqueue_script('qoate_sb_script',WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)).'/qoate-sb-script.php?anim='.$options['animation'].'&vpos='.$options['vplacement'].'&perc='.$options['percentage']);
}

function qoate_add_sb(){
$options = get_option('qoate_sb_holder',array('text'=>'Your HTML-content goes here..'));
$content = '<div id="qoate_social_bookmark" style="background:transparent url('.WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)).'/overlay.png);">';
$content .= $options['text'];
$content .= '<!-- This Box is generated by Qoate Scroll Triggered Box! -->';
$content .= '</div>';

echo $content;
}

?>