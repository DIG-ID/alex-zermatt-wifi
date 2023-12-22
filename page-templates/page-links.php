<?php
/**
 * Template Name: Links
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );

		if ( have_rows( 'menu_links' ) ) :
			?><ul class="menu-links px-5 xl:px-0 xl:columns-2 xl:gap-x-6"><?php
			while ( have_rows( 'menu_links' ) ) :
				the_row();
				?><li class="menu-links--item"><?php
				$menu_link      = get_sub_field( 'link' );
				$menu_link_icon = get_sub_field( 'icon' );
				if ( $menu_link ) :
					$link_url    = $menu_link['url'];
					$link_title  = $menu_link['title'];
					$link_target = $menu_link['target'] ? $menu_link['target'] : '_self';
					?>
					<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
						<span class="button-icon-wrapper">
							<?php
							if ( $menu_link_icon ) :
								echo '<span class="icon">' . wp_get_attachment_image( $menu_link_icon, 'full' ) . '</span>';
							endif;
							echo esc_html( $link_title );
							?>
						</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none" class="download-icon">
							<path d="M8.91994 11.2103H1.68756C0.783508 11.2103 0 10.487 0 9.5227V8.3173C0 8.07622 0.180809 7.83514 0.482159 7.83514C0.783508 7.83514 0.964318 8.01595 0.964318 8.3173V9.5227C0.964318 9.94459 1.32594 10.2459 1.68756 10.2459H8.91994C9.34183 10.2459 9.64318 9.88432 9.64318 9.5227V8.3173C9.64318 8.07622 9.82398 7.83514 10.1253 7.83514C10.4267 7.83514 10.6075 8.01595 10.6075 8.3173V9.5227C10.6075 10.4267 9.82399 11.2103 8.91994 11.2103Z" fill="#002850"/>
							<path d="M5.30372 8.19671C5.18318 8.19671 5.06264 8.13644 5.00237 8.07617L1.98888 5.06267C1.80807 4.88187 1.80807 4.58052 1.98888 4.39971C2.16969 4.2189 2.47104 4.2189 2.65185 4.39971L5.36399 7.11185L8.07613 4.39971C8.25694 4.2189 8.55829 4.2189 8.7391 4.39971C8.91991 4.58052 8.91991 4.88187 8.7391 5.06267L5.72561 8.07617C5.5448 8.13644 5.42426 8.19671 5.30372 8.19671Z" fill="#002850"/>
							<path d="M5.30381 8.1967C5.06273 8.1967 4.82166 8.01589 4.82166 7.71454V0.482159C4.82166 0.241079 5.00246 0 5.30381 0C5.60516 0 5.78597 0.18081 5.78597 0.482159V7.71454C5.78597 7.95562 5.54489 8.1967 5.30381 8.1967Z" fill="#002850"/>
						</svg>
					</a>

					<?php
				endif;
				?></li><?php
			endwhile;
			?></ul><?php
		endif;

		if ( have_rows( 'page_links' ) ) :
			?><ul class="menu-links"><?php
			while ( have_rows( 'page_links' ) ) :
				the_row();
				?><li class="menu-links--item"><?php
				$page_link      = get_sub_field( 'link' );
				$page_link_icon = get_sub_field( 'icon' );
				if ( $page_link_icon ) :
					echo wp_get_attachment_image( $page_link_icon, 'full' );
				endif;
				if ( $page_link ) :
					$link_url    = $page_link['url'];
					$link_title  = $page_link['title'];
					$link_target = $page_link['target'] ? $page_link['target'] : '_self';
					?>
					<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php
				endif;
				?></li><?php
			endwhile;
			?></ul><?php
		endif;

		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
