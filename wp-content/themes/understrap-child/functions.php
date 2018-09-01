<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/libraries/slick/slick.css',  false);
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array('jquery'), $the_theme->get( 'Version' ), false );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/libraries/slick/slick.min.js', array('jquery'), false);
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false);
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

add_action('acf/init', 'add_options');

function add_options() {
    
    if( function_exists('acf_add_options_page') ) {
        
        $footer_option_page = acf_add_options_page(array(
            'page_title'    => 'Footer content',
            'menu_title'    => 'Footer content',
        ));
        
        $policies_option_page = acf_add_options_page(array(
            'page_title'    => 'Policies',
            'menu_title'    => 'Policies',
        ));

        $policies_option_page = acf_add_options_page(array(
            'page_title'    => 'Contact information',
            'menu_title'    => 'Contact information',
        ));
    }

}

add_filter('woocommerce_checkout_fields', 'custom_woocommerce_checkout_fields');

function custom_woocommerce_checkout_fields( $fields ) {

     $fields['order']['order_comments']['label'] = '<span class="order-info">Addtional Information (optional)</span> </br> Would you like a personalised plaque or gift note? </br> Do you have any special requirements for delivery?';
     $fields['order']['order_comments']['placeholder'] = 'Let us know...';

     return $fields;

}

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );