<?php

$categories = get_categories([
  'taxonomy'     => 'product_cat',
  'type'         => 'post',
  'child_of'     => 0,
  'orderby'      => 'name',
  'order'        => 'ASC',
  'hierarchical' => 1,
  'exclude'      => '0, 21, 22, 23'
]);

if( $categories ){
  echo '<div class="categories"><span>Категории:</span>';
  foreach( $categories as $cat ){
    $class = (isset($_GET['cat']) && $_GET['cat'] == $cat->term_taxonomy_id)? 'class="active"' : '';
    echo '<a href="/category?cat='.$cat->term_id.'" '.$class.'>'.$cat->name.'</a>';
  }
  echo '</div>';
}