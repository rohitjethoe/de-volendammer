<?php
/**
 * @package De_Volendammer
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <!-- Made with ❤️ by Rohit Jethoe. -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header>
        <div class="header">
            <div class="logo">
                <a href="<?php echo get_site_url(); ?>">
                    <img class="logo-image" src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="De Volendammer">
                </a>
                <a href="<?php echo get_site_url(); ?>">
                    <img class="logo-image-colored" src="<?php echo get_template_directory_uri() . '/images/logo-colored.png'; ?>" style="display: none;" alt="De Volendammer">
                </a>
            </div>
            <div class="nav">
                
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu'
                        )
                    );

                    if (!is_front_page()) {
                        global $woocommerce;
                        $shopping_cart_url = $woocommerce->cart->get_cart_url();
                        $shopping_cart_contents = $woocommerce->cart->get_cart_contents_count();
                        
                        echo "
                        <div class='nav-cart'>
                            <a href='" . $shopping_cart_url . "'>
                                <div class='nav-cart-items'>
                                    <div class='nav-cart-icon'>
                                        <i class='fa-solid fa-cart-shopping'></i>
                                    </div>
                                    <div class='nav-cart-contents'>
                                        " . $shopping_cart_contents . "
                                    </div>
                                </div>
                            </a>
                        </div>
                        ";
                    }
                ?>
            </div>
            <div class="mobile-nav">
                <?php 
                    if (!is_front_page()) {
                        global $woocommerce;
                        $shopping_cart_url = $woocommerce->cart->get_cart_url();
                        $shopping_cart_contents = $woocommerce->cart->get_cart_contents_count();
                        
                        echo "
                        <div class='nav-cart'>
                            <a href='" . $shopping_cart_url . "'>
                                <div class='nav-cart-items'>
                                    <div class='nav-cart-icon'>
                                        <i class='fa-solid fa-cart-shopping'></i>
                                    </div>
                                    <div class='nav-cart-contents'>
                                        " . $shopping_cart_contents . "
                                    </div>
                                </div>
                            </a>
                        </div>
                        ";
                    }
                ?>
                <div class="mobile-nav-icon" onclick="openNav()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="mobile-nav-sidebar">
                    <div class="mobile-nav-sidebar-button" onclick="closeNav()">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header-menu'
                            )
                        )
                    ?>
                </div>
            </div>
        </div>
    </header>
    
