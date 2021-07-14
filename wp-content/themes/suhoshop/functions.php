<?php

define('ROOT', get_template_directory_uri());
define('IMG', get_template_directory_uri() . '/img');

function TYPE(){
  global $post;
  return $post->post_type;
}

function replace_core_jquery_version() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

include('include/clear.php');

include('miniCart/cart-actions.php');

add_theme_support( 'menus' );

function front_scripts() {

// Index page
  if( is_page_template( 'templates/page-index.php' ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-index.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-index.js', false, false, 'in_footer');
  }

// Category page
  if( is_page_template( 'templates/page-category.php' ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-category.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-category.js', false, false, 'in_footer');
  }

  // Single page
  if( is_single() && TYPE() === 'product' ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-product.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-product.js', false, false, 'in_footer');
  }

// Thank you page
  if( is_order_received_page() ){ }

// Checkout
  if( is_checkout() ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-checkout.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-checkout.js', false, false, 'in_footer');
  }

// Cart
  if( is_cart() ){}

// Single page
  if( is_single() ){ }

//Default page template
  if( is_page_template('default') ){ }

// 404 page
  if( is_404() ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-404.css');
  }

  if( is_page_template( 'templates/page-thank_you.php' ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-thank_you.css');
  }

  if( is_checkout() && empty( $wp->query_vars['order-received'] ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-thank_you.css');
  }

}
add_action( 'wp_enqueue_scripts', 'front_scripts' );

function front_variables(){
  wp_localize_script( 'scripts', 'data',
    array(
      'ajax' => admin_url('admin-ajax.php')
    )
  );
}
add_action( 'wp_enqueue_scripts', 'front_variables' );


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields){
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_postcode']);

  $fields['billing']['billing_first_name']['placeholder'] = 'Имя';
  $fields['billing']['billing_last_name']['placeholder'] = 'Фамилия';
  $fields['billing']['billing_country']['placeholder'] = 'Страна';
  $fields['billing']['billing_address_1']['placeholder'] = 'Адрес';
  $fields['billing']['billing_address_2']['placeholder'] = 'Номер отделения';
  $fields['billing']['billing_city']['placeholder'] = 'Город';
  $fields['billing']['billing_state']['placeholder'] = 'Область';
  // $fields['billing']['billing_postcode']['placeholder'] = 'Почтовый индекс';
  $fields['billing']['billing_email']['placeholder'] = 'Email';
  $fields['billing']['billing_phone']['placeholder'] = 'Телефон';

  $fields['billing']['billing_first_name']['label'] = '';
  $fields['billing']['billing_last_name']['label'] = '';
  $fields['billing']['billing_country']['label'] = '';
  $fields['billing']['billing_address_1']['label'] = '';
  $fields['billing']['billing_address_2']['label'] = '';
  $fields['billing']['billing_city']['label'] = '';
  $fields['billing']['billing_state']['label'] = '';
  // $fields['billing']['billing_postcode']['label'] = '';
  $fields['billing']['billing_email']['label'] = '';
  $fields['billing']['billing_phone']['label'] = '';

  $fields['billing']['billing_first_name']['required'] = true;
  $fields['billing']['billing_last_name']['required'] = true;
  $fields['billing']['billing_country']['required'] = true;
  $fields['billing']['billing_address_1']['required'] = false;
  $fields['billing']['billing_address_2']['required'] = true;
  $fields['billing']['billing_city']['required'] = true;
  $fields['billing']['billing_state']['required'] = true;
  // $fields['billing']['billing_postcode']['placeholder'] = false;
  $fields['billing']['billing_email']['required'] = false;
  $fields['billing']['billing_phone']['required'] = true;

  return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'checkout_priority' );
function checkout_priority( $checkout_fields ) {
  $checkout_fields['billing']['billing_first_name']['priority'] = 1;
  $checkout_fields['billing']['billing_last_name']['priority'] = 2;
  $checkout_fields['billing']['billing_email']['priority'] = 3;
  $checkout_fields['billing']['billing_phone']['priority'] = 4;
  $checkout_fields['billing']['billing_country']['priority'] = 5;
  $checkout_fields['billing']['billing_state']['priority'] = 6;
  $checkout_fields['billing']['billing_city']['priority'] = 7;
  $checkout_fields['billing']['billing_address_1']['priority'] = 8;
  // $checkout_fields['billing']['billing_postcode']['priority'] = 9;
  $checkout_fields['billing']['billing_address_2']['priority'] = 11;
  return $checkout_fields;
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
// add_action( 'woocommerce_checkout_before_order_review', 'woocommerce_checkout_coupon_form' );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_mg_payment', 'woocommerce_checkout_payment' );


function my_theme_modify_stripe_fields_styles( $styles ) {
    return array(
        'base' => array(
            'lineHeight'     => '30px',
            'color'         => '#333',
            'fontSize'      => '16px',
            '::placeholder' => array(
                'color' => '#9e9e9e',
            ),
        ),
    );
}

add_filter( 'wc_stripe_elements_styling', 'my_theme_modify_stripe_fields_styles' );



add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );

function misha_custom_button_text( $button_text ) {
   return 'Заказать'; // new text is here
}





/*--------------------*/
function redirect_mg() {
  global $woocommerce;
  if( is_cart() && $woocommerce->cart->is_empty() ){
    wp_redirect(home_url());
    exit();
  } else if( is_cart() && !$woocommerce->cart->is_empty() ){
    wp_redirect(wc_get_checkout_url());
    exit();
  } else if( is_checkout() && !empty( is_wc_endpoint_url('order-received') ) ){
    wp_redirect( get_permalink(131) );
    exit();
  }
}
add_action('template_redirect', 'redirect_mg');


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}