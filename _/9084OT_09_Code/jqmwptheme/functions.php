<?php 
function footer(){
	echo '<div data-role="footer" class="ui-bar"><a href="http://www.packtpub.com" data-role="button" data-icon="info">Mastering jQuery Mobile</a></div>';
} add_action('wp_footer', 'footer');
?>