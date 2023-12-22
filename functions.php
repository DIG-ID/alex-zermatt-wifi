<?php
/**
 * Setup theme
 */
function az_theme_setup() {

	register_nav_menus(
		array(
			'main' => __( 'Main Menu', 'azw' ),

		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	add_post_type_support( 'page', 'excerpt' );

}

add_action( 'after_setup_theme', 'az_theme_setup' );


if ( ! function_exists( 'az_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions dig_theme_enqueue_styles() and twentytwentytwo_editor_styles() above.
	 */
	function az_get_font_face_styles() {

		return "
			@import url('https://use.typekit.net/nsu2etq.css');
			@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap');
		";

	}

endif;

if ( ! function_exists( 'az_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 */
	function az__preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preconnect" href="use.typekit.net" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'az__preload_webfonts' );


/**
 * Enqueue styles and scripts
 */
function az_theme_enqueue_styles() {

	//Get the theme data
	$the_theme     = wp_get_theme(); 
	$theme_version = $the_theme->get( 'Version' );

	// Register Theme main style.
	wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version );

	// Add styles inline.
	wp_add_inline_style( 'theme-styles', az_get_font_face_styles() );

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'theme-styles' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), $theme_version, false );

	/*if ( is_home() ) :
		wp_enqueue_script( 'blog-ajax', get_template_directory_uri() . '/dist/js/blog-ajax.js', array( 'jquery' ), $theme_version, true );
		wp_localize_script( 'blog-ajax', 'blog_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	endif;*/
}

add_action( 'wp_enqueue_scripts', 'az_theme_enqueue_styles' );

/**
 * Register our sidebars and widgetized areas.
 */
function az_theme_footer_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Header',
			'id'            => 'header',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		),
	);

}

add_action( 'widgets_init', 'az_theme_footer_widgets_init' );

/**
 * Create a customized options page and store the data in a variable for later use
 */
function az_theme_acf_op_gc_init() {
	if ( function_exists( 'acf_add_options_page' ) ) :
		$theme_option_page = acf_add_options_page(
			array(
				'page_title'      => __( 'Alex Zermatt Theme Options', 'az' ),
				'menu_title'      => __( 'Theme Options', 'az' ),
				'menu_slug'       => 'az-theme-general-options',
				'capability'      => 'edit_posts',
				'icon_url'        => get_template_directory_uri() . '/assets/images/hotel-resort-alex-theme-icon.png',
				'redirect'        => false,
				'update_button'   => __( 'Update Options', 'az' ),
				'updated_message' => __( 'Alex Zermatt Options Updated', 'az' ),
			)
		);
	endif;
}

add_action( 'acf/init', 'az_theme_acf_op_gc_init' );


// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// The theme admin settings
//require get_template_directory() . '/inc/theme-admin-settings.php';
