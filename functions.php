<?php 

// Load open sans

function child_font() {
	
	wp_enqueue_style('lato','http://fonts.googleapis.com/css?family=Lato:400,400italic,700');
	
}

add_action('wp_enqueue_scripts','child_font');