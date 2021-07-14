<div class="row">
  <?php
  $cat_id =  $_GET['cat'];
  $args = array(
    'post_type' => 'product',
    'orderby'   => 'date',
    'order'     => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'terms' => $cat_id,
            'operator' => 'IN',
        )
    )
  );
  if(isset($_GET['orderby']) && $_GET['orderby'] == 'price'){
    $args['orderby'] = 'meta_value_num';
    $args['meta_key'] = '_price';
  }
  if(isset($_GET['order'])){
    $args['order'] = $_GET['order'];
  }
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    global $product;
    $sale = $product->get_sale_price();
    $regular = $product->get_regular_price();
    $price = $product->get_price();
    $cur = get_woocommerce_currency_symbol();
    $id = $product->get_id();
    $discount = $price * 100 / $regular - 100;
  ?>
  <div class="col-md-3 product product_<?php echo $id; ?>">
    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <div class="product-desc"><?php the_excerpt(); ?></div>
    <div class="price-wrap">
      <?php if( $sale ): ?>
        <span class="price"><?php echo $cur; ?><?php echo $sale; ?></span>
        <span class="price-old"><?php echo $cur; ?><?php echo $regular; ?></span>
        <span class="price-sale"><?php echo $discount; ?>%</span>
      <?php else: ?>
        <span class="price"><?php echo $cur; ?><?php echo $regular; ?></span>
      <?php endif; ?>
    </div>
    <button class="btn btn-add addToCart" data-product_id="<?php echo $id; ?>" data-quantity="1"><i class="fas fa-shopping-cart"></i> Купить</button>
  </div>
  <?php endwhile; wp_reset_query(); ?>
</div>