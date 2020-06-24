<?php
/**
 * velox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package velox
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'velox_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function velox_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on velox, use a find and replace
		 * to change 'velox' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'velox', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
                'top-menu' => esc_html__( 'Top', 'velox' ),
                'bottom-menu' => esc_html__( 'Bottom', 'velox' ),
				'menu-1' => esc_html__( 'Primary', 'velox' ),
				'footer-menu' => esc_html__( 'Footer', 'velox' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'velox_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'velox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function velox_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'velox_content_width', 640 );
}
add_action( 'after_setup_theme', 'velox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function velox_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'velox' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'velox' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'velox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function velox_scripts() {
	wp_enqueue_style( 'velox-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'velox-1bundle', get_template_directory_uri() . '/styles/1.bundle.css', array(), _S_VERSION );
    wp_enqueue_style( 'velox-bundle', get_template_directory_uri() . '/styles/bundle.css', array(), _S_VERSION );
    wp_enqueue_style( 'velox-maincss', get_template_directory_uri() . '/styles/main.css', array(), _S_VERSION );
	wp_style_add_data( 'velox-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'velox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'velox-chunk', get_template_directory_uri() . '/js/chunk.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'velox-app', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'velox-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'velox_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="shop-items__amount"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
    <?php
    $fragments['.shop-items__amount'] = ob_get_clean();
    return $fragments;
}




function modal_add_to_cart_fragments( $fragments ) {

    ob_start();

    ?>
    <div class="modal-items">
        <?php
        $cart_items = WC()->cart->get_cart();
        foreach( $cart_items as $cart_item_key => $item ) { ?>

            <div class="left col-md-3">
                <div class="product-image"><!-- Make sure ot check if it's a gallery, if so, get its first image -->
                    <?php echo $item['data']->get_image(); ?>
                </div>
            </div>
            <div class="right col-md-8">
                <h4 class="product-name"><?php echo $item['data']->get_name(); ?></h4>
                <div class="product-information">
                    <span class="product-quantity"><?php echo $item['quantity'] . 'x' ?></span>
                    <span class="product-price"><?php echo $item['data']->get_price_html(); ?></span>
                </div>
                <?php
                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                    '<a href="%s" aria-label="%s" data-product_id="%s" data-product_sku="%s">X</a>',
                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                    __( 'Remove this item', 'woocommerce' ),
                    esc_attr( $item['product_id'] ),
                    esc_attr( $item['data']->get_sku() )
                ), $cart_item_key );
                ?>
            </div>
        <?php } ?>
    </div>
    <?php
    $fragments['.modal-items'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'modal_add_to_cart_fragments', 10, 1 );


//Remove Sales Flash
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
    return false;
}


/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Apartment'
    $defaults['home'] = 'Головна';
    return $defaults;
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 26 );


/**
 * Change number of related products output
 */
function woo_related_products_limit() {
    global $product;

    $args['posts_per_page'] = 6;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 10; // 4 related products
    $args['columns'] = 1; // arranged in 2 columns
    return $args;
}
