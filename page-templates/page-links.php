<?php
/**
 * Template Name: Links
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
		the_content();
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
