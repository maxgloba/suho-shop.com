<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
  echo get_the_password_form(); // WPCS: XSS ok.
  return;
}
?>

<div <?php wc_product_class( 'row', $product ); ?>>

  <div class="col-md-6">
    <?php
      remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
      do_action( 'woocommerce_before_single_product_summary' );
    ?>
  </div>
  <div class="col-md-6">
    <h1><?php the_title(); ?></h1>
      <?php
      /**
       * Hook: woocommerce_single_product_summary.
       *
       * @hooked woocommerce_template_single_title - 5
       * @hooked woocommerce_template_single_rating - 10
       * @hooked woocommerce_template_single_price - 10
       * @hooked woocommerce_template_single_excerpt - 20
       * @hooked woocommerce_template_single_add_to_cart - 30
       * @hooked woocommerce_template_single_meta - 40
       * @hooked woocommerce_template_single_sharing - 50
       * @hooked WC_Structured_Data::generate_product_data() - 60
       */
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

      add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_description', 9 );
      function woocommerce_template_single_description() {
        the_content();
      }

      add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_mgprice', 9 );
      function woocommerce_template_single_mgprice() {
        global $product;
        $sale = $product->get_sale_price();
        $regular = $product->get_regular_price();
        $price = $product->get_price();
        $symbol = get_woocommerce_currency_symbol();
        $discount = $price * 100 / $regular - 100;
        if($sale){
          echo '
            <div class="price">
              <span class="price-regular">'.$symbol.$regular.'</span>
              <span class="price-sale"><span>'.$discount.'%</span> SALE</span> <br>
              <span class="price-now">'.$symbol.$price.'</span>
              <span class="price-stock"><i class="fa fa-check"></i> в наличии</span>
            </div>';
        } else {
          echo '<div class="price"><span class="price-now">'.$symbol.$price.'</span><span class="price-stock"><i class="fa fa-check"></i> в наличии</span></div>';
        }
      }

      add_action( 'woocommerce_single_product_summary', 'woocommerce_mg_addtocart', 30 );
      function woocommerce_mg_addtocart() {
        global $product;
        $id = $product->get_id();
        echo '
        <div class="btns">
          <button class="btn btn-add addToCart" data-product_id="'.$id.'" data-quantity="1">Купить</button>
        </div>
        ';
      }

      do_action( 'woocommerce_single_product_summary' );

      remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
      remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
      do_action( 'woocommerce_after_single_product_summary' );
    ?>
  </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
