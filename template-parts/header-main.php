<header id="header-main" class="header-main w-full" itemscope itemtype="http://schema.org/WebSite">
	<nav class="navigation-main w-full flex items-center pt-11 pb-20 relative" role="navigation" aria-label="<?php esc_attr_e( 'main navigation', 'az' ); ?>">

		<div class="w-full mx-auto flex justify-center items-center">
			<div class="site-branding">
				<?php
				if ( is_front_page() ) :
					echo '<h1 class="screen-reader-text">' . get_bloginfo( 'name' ) . '</h1>';
				else :
					echo '<p class="screen-reader-text">' . get_bloginfo( 'name' ) . '</p>';
				endif;
				?>
				<a rel="home" href="<?php echo esc_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url" class="navbar-brand custom-logo-link"><?php do_action( 'theme_logo' ); ?></a>
			</div>
		</div>

		<?php
		if ( is_active_sidebar( 'header' ) ) :
			dynamic_sidebar( 'header' );
		endif;
		?>

	</nav>

</header>
