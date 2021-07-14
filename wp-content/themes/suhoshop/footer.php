    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="main-footer__logo">
              <a href="<?php echo home_url(); ?>">
                <img src="<?php echo IMG; ?>/logo-white.png" alt="">
              </a>
              <div class="main-footer__sitename">
                <span>Suho</span>
                Shop
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <h4>Контакты</h4>
            <ul>
              <li>
                <a target="_blank" href="tel:<?php the_field('phone', 'option'); ?>">
                  <i class="far fa-phone"></i>
                  <?php the_field('phone', 'option'); ?>
                </a>
              </li>
              <li>
                <a target="_blank" href="https://www.instagram.com/<?php the_field('instagram', 'option'); ?>/">
                  <i class="fab fa-instagram"></i>
                  @<?php the_field('instagram', 'option'); ?>
                </a>
              </li>
              <li>
                <a target="_blank" href="https://telegram.me/<?php the_field('telegram', 'option'); ?>/">
                  <i class="fab fa-telegram-plane"></i>
                  @<?php the_field('telegram', 'option'); ?>
                </a>
              </li>
              <li>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php the_field('phone', 'option'); ?>">
                  <i class="fab fa-viber"></i>
                  <?php the_field('phone', 'option'); ?>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4>Страницы</h4>
            <ul class="slides">
              <?php $i = 0; while( have_rows('footer_text', 'option') ): the_row(); $i++; ?>
                <li>
                  <a href="#" data-popup="popup_<?php echo $i; ?>"><?php the_sub_field('name'); ?></a>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <?php get_template_part( 'partials/mg', 'popup' ); ?>

    <div id="loader" class="loader loader-hide"></div>

    <?php wp_footer(); ?>
  </body>
</html>