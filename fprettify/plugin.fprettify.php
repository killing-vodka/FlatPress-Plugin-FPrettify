<?php
/*
Plugin Name: FPrettify
Version: 0.1
Plugin URI: https://github.com/pozharlab/FlatPress-Plugin-FPrettify
Description: A script that makes source-code snippets in HTML prettier.
Author: Giovanni Forte
Author URI: http://www.pozharlab.net
*/

add_action('wp_head', 'plugin_fprettify_head', 0);

function plugin_fprettify_head() {
	$pdir=plugin_geturl('jquery');
	echo <<<JSUTILS
	echo "<script src=\"https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js\"></script>\n";
	echo "\t<link rel=\"stylesheet\" href=\"https://cdn.rawgit.com/google/code-prettify/master/src/prettify.css\">\n";
}

function plugin_fprettyprint($string) {
	$string = str_replace('<pre>', "<pre class=\"prettyprint\">", $string);
	return $string;
}						
			
add_filter('the_content', 'plugin_fprettyprint', 1);
add_filter('comment_text', 'plugin_fprettyprint', 1);
?>
