<?php
/*
Plugin Name: Quotes Everywhere!
Plugin URI: http://wordpress.org/plugins/quotes-everywhere
Description: This plugin will get your (inspirational) quotes wherever you want them to appear on your site. Way to easy to customise! Just Copy-Paste your quotes!
Version: 1.1
Author: Sam Simons, krommesammie
Author URI: http://sam-simons.nl/
License: quoteseverywhere
*/

//*************** Admin function ***************

function quoteseverywhere_admin() {
	include('quoteseverywhere_admin.php');
}

function quoteseverywhere_admin_actions() {
add_options_page( 'Quotes Everywhere!', 'Quotes Everywhere!', 'administrator', 'quoteseverywhere_display_main', 'quoteseverywhere_admin' );

}

add_action('admin_menu', 'quoteseverywhere_admin_actions');



function get_quote() {
	
	$quotes_with_slashes = get_option('quotinhead_quotes');
	$quotes = stripslashes($quotes_with_slashes);

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
$chosen = wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );

if ($chosen === "") {
get_quote(); 
} else {
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}
}

// This just echoes the chosen line, we'll position it later

function quote() {
$chosen = get_quote();
$tagx = get_option("quotinhead_quote_tags");
eval("\$tag = \"$tagx\";");
echo stripslashes($tag);
}


// Now we set that function up to execute when the admin_notices action is called
add_action( 'quotehere', 'quote' );

// We need some CSS to position the paragraph
function quote_css() {
$stylex = get_option("quotinhead_quote_style");	
// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'right' : 'left';
	eval("\$style = \"$stylex\";");
	
	echo "
	<style type='text/css'>
	#quote {";
	echo stripslashes($style);
	echo "
	}
	</style>
	";
}
add_action( 'quotehere', 'quote_css' );

//*************** This plugin could not be created without the 'Hello Dolly' plugin and this pluginmaking tutorial: http://net.tutsplus.com/tutorials/wordpress/creating-a-custom-wordpress-plugin-from-scratch/ ***************

?>