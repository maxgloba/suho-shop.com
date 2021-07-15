<?php
/*
 * Template Name: Thank you
 */
// global $wp;

get_header();
while ( have_posts() ) : the_post(); ?>

<section class="thankyou-content">
  <div class="container">
    <h1><?php the_title(); ?> ;)</h1>
    <?php the_content(); ?>
  </div>
</section>

<?php
// unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
  $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
  foreach($cookies as $cookie) {
    $parts = explode('=', $cookie);
    $name = trim($parts[0]);
    setcookie($name, '', time()-1000);
    setcookie($name, '', time()-1000, '/');
  }
}
?>

<?php
endwhile;
get_footer(); ?>