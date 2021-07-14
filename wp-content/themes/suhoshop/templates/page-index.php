<?php
/*
 * Template Name: Index
 */
get_header(); ?>

<section class="banner">
  <?php $banner_video = get_field('banner_video'); ?>
  <video width="100%" muted webkit-playsinline playsinline autoplay loop >
    <source src="<?php echo $banner_video['url']; ?>" type="video/mp4">
  </video>
  <div class="container">
    <div class="banner__content">
      <h2><?php the_field('banner_title'); ?></h2>
      <div class="banner__sales">
        <div class="banner__sales-box">
          <span class="num num-3">-3%</span> от <br> 2000грн.
        </div>
        <div class="banner__sales-box">
          <span class="num num-5">-5%</span> от <br> 5000грн.
        </div>
        <div class="banner__sales-box">
          <span class="num num-10">-10%</span> от <br> 10000грн.
        </div>
      </div>
    </div>
  </div>
  <button class="goToProduct">
    <i class="fas fa-hand-point-down"></i>
  </button>
</section>

<section class="products" id="products">
  <div class="container">
    <h2><?php the_field('products_title'); ?></h2>
    <h3><?php the_field('products_text'); ?></h3>
    <?php get_template_part( 'partials/mg', 'categories' ); ?>
    <?php get_template_part( 'partials/mg', 'products' ); ?>
  </div>
</section>

<section class="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php the_field('about_title'); ?></h2>
        <div class="text">
          <p><?php the_field('about_text'); ?></p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?php the_field('about_image'); ?>" alt="" width="100%">
      </div>
    </div>
  </div>
</section>

<section class="jig">
  <div class="container">
    <h2><?php the_field('weare_title'); ?></h2>
    <div class="row">
      <?php while( have_rows('weare_repeater') ): the_row(); ?>
      <div class="col-md-3">
        <?php the_sub_field('image'); ?>
        <h4><?php the_sub_field('title'); ?></h4>
        <p><?php the_sub_field('text'); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<section class="preview">
  <div class="container">
    <h2><?php the_field('obzor_title'); ?></h2>
    <?php the_field('obzor_video'); ?>
  </div>
</section>

<section class="products">
  <div class="container">
    <h2><?php the_field('products_title'); ?></h2>
    <h3><?php the_field('products_text'); ?></h3>
    <?php get_template_part( 'partials/mg', 'products' ); ?>
  </div>
</section>

<section class="reviews">
  <div class="container">
    <h2><?php the_field('otzuvu_title'); ?></h2>
    <h3><?php the_field('otzuvu_text'); ?></h3>
    <div class="row">
      <?php while( have_rows('otzuvu_repeater') ): the_row(); ?>
      <div class="col-md-6">
        <div class="reviews-text"><?php the_sub_field('text'); ?></div>
        <div class="reviews-img">
          <i class="fab fa-instagram"></i>
          <img src="<?php the_sub_field('image'); ?>" alt="">
        </div>
        <div class="reviews-name"><?php the_sub_field('name'); ?></div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<section class="gallery">
  <div class="container">
    <h2><?php the_field('gal_title'); ?></h2>
    <h3><?php the_field('gal_text'); ?></h3>
    <?php the_field('gal_imgs'); ?>
  </div>
</section>
<?php
$images = get_field('gal_images');
$gallery_images = [];
foreach( $images as $image ):
  array_push($gallery_images, $image['url']);
endforeach;
?>
<script>
const gs_images = ['<?php echo implode( "','", $gallery_images); ?>'];
</script>
<div class="gs gs-hide">
  <button class="gs-wclose"></button>
  <button class="gs-prev"><i class="fas fa-caret-left"></i></button>
  <button class="gs-next"><i class="fas fa-caret-right"></i></button>
  <div class="gs-wrap">
    <button class="gs-close"><i class="fas fa-times"></i></button>
    <img class="gs-img" src="<?php echo $gallery_images[0]; ?>" data-index="0">
  </div>
</div>

<section class="faqs">
  <div class="container">
    <h2><?php the_field('questions_title'); ?></h2>
    <div class="faqs">
      <?php while( have_rows('questions_repeater') ): the_row(); ?>
      <div class="faq">
        <div class="question"><?php the_sub_field('question'); ?><i class="fas fa-arrow-down"></i></div>
        <div class="answer"><?php the_sub_field('answer'); ?></div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php get_footer();