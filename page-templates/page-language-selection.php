<?php
/**
 * Template Name: Language Selection
 */

get_header( 'clean' );
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
		do_action( 'wpml_add_language_selector' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer( 'clean' );