<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function de_volendammer_setup() {
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'de-volendammer' ),
		)
	);

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

	add_theme_support(
		'custom-background',
		apply_filters(
			'de_volendammer_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'de_volendammer_setup' );

function de_volendammer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'de_volendammer_content_width', 640 );
}
add_action( 'after_setup_theme', 'de_volendammer_content_width', 0 );

function de_volendammer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'de-volendammer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'de-volendammer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'de_volendammer_widgets_init' );

function de_volendammer_scripts() {
	wp_enqueue_style( 'de-volendammer-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'de-volendammer-style', 'rtl', 'replace' );

	wp_enqueue_script( 'de-volendammer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'de_volendammer_scripts' );

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function deVolendammer_load_stylesheets () {
    wp_register_style('deVolendammer_header', get_template_directory_uri() . '/css/header.css', array(), rand(111, 9999), 'all');
    wp_register_style('deVolendammer_footer', get_template_directory_uri() . '/css/footer.css', array(), rand(111, 9999), 'all');
	wp_register_style('deVolendammer_fontGrenze', 'https://fonts.googleapis.com/css2?family=Grenze:ital,wght@0,300;0,500;1,400&display=swap', array(), false, 'all');
    wp_register_style('deVolendammer_fontSourceSansPro', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap', array(), false, 'all');
    wp_register_style('deVolendammer_fontAwesomeIcons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), false, 'all');

    wp_enqueue_style('deVolendammer_header');
    wp_enqueue_style('deVolendammer_footer');

    wp_enqueue_style('deVolendammer_page');
	wp_enqueue_style('deVolendammer_fontGrenze');
    wp_enqueue_style('deVolendammer_fontSourceSansPro');
    wp_enqueue_style('deVolendammer_fontAwesomeIcons');

	if (is_page()) {
		if (!is_front_page() && !is_shop() && !is_product_category() && !is_product() && !is_cart() && !is_checkout()) {
			wp_register_style('deVolendammer_page', get_template_directory_uri() . '/css/page.css', array(), rand(111, 9999), 'all');
			wp_enqueue_style('deVolendammer_page');
		}
	}

    if (is_front_page()) {
        wp_register_style('deVolendammer_front_page', get_template_directory_uri() . '/css/front-page.css', array(), rand(111, 9999), 'all');
        wp_enqueue_style('deVolendammer_front_page');
    }

	if (is_shop()) {
		wp_register_style('deVolendammer_shop', get_template_directory_uri() . '/css/shop.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_shop');
	}

	if (is_product_category()) {
		wp_register_style('deVolendammer_productCategory', get_template_directory_uri() . '/css/product_category.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_productCategory');
	}

	if (is_product()) {
		wp_register_style('deVolendammer_singleProduct', get_template_directory_uri() . '/css/single_product.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_singleProduct');
	}

	if (is_cart()) {
		wp_register_style('deVolendammer_cart', get_template_directory_uri() . '/css/cart.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_cart');
	}

	if (is_checkout()) {
		wp_register_style('deVolendammer_checkout', get_template_directory_uri() . '/css/checkout.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_checkout');
	}

	if (is_404()) {
		wp_register_style('deVolendammer_404', get_template_directory_uri() . '/css/404.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_404');
	}

	if (!empty( is_wc_endpoint_url('order-received'))) {
		wp_register_style('deVolendammer_order', get_template_directory_uri() . '/css/order.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style('deVolendammer_order');
	}

	wp_register_style('deVolendammer_default', get_template_directory_uri() . '/css/default.css', array(), rand(111, 9999), 'all');
	wp_enqueue_style('deVolendammer_default');
}

add_action('wp_enqueue_scripts', 'deVolendammer_load_stylesheets');

function deVolendammer_load_scripts () {
    wp_register_script('deVolendammer_header', get_template_directory_uri() . '/js/header.js', 'jquery', rand(111, 9999), true);
    wp_enqueue_script('deVolendammer_header');

    if (is_front_page()) {
		wp_register_script('deVolendammer_carousel', get_template_directory_uri() . '/js/carousel.js', 'jquery', rand(111, 9999), true);
    	wp_enqueue_script('deVolendammer_carousel');
    }
}

add_action('wp_enqueue_scripts', 'deVolendammer_load_scripts');

add_theme_support('menus');

register_nav_menus(
    array(
        "header-menu" => "Header",
        "footer-menu" => "Footer"
    )
);