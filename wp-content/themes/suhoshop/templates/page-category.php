<?php
/*
 * Template Name: Category
 */
get_header(); ?>

<?php if(isset($_GET['cat'])): ?>
  <?php
    $term = get_term($_GET['cat']);
    if($term):
  ?>
    <section class="products page-category" id="products">
      <div class="container">
        <?php get_template_part( 'partials/mg', 'categories' ); ?>
        <?php get_template_part( 'partials/mg', 'catsort' ); ?>
        <?php get_template_part( 'partials/mg', 'catproducts' ); ?>
      </div>
    </section>
  <?php else: ?>
    <script>
      window.location.href = "<?php echo home_url(); ?>";
    </script>
  <?php endif; ?>
<?php endif; ?>


<?php get_footer();