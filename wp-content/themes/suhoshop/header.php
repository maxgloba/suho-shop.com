<!DOCTYPE html>
<html lang="en" style="margin-top: 0 !important;">
  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="copyright" content="<?php bloginfo('copyright'); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 user-scalable=0">
    <meta name="author" content="MaxGloba">
    <meta name="theme-color" content="#ffffff">

    <title>
      <?php
        if(is_front_page()){
          bloginfo('name'); echo ' - '; bloginfo('description');
        } else {
          echo get_bloginfo('name'); wp_title( '|', true, 'left' );
        }
      ?>
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico?v=1.01" />

    <script>
      const vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    </script>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >

      <header class="main-header">
        <div class="container">
          <div class="main-header__logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php the_field('header_logo', 'option'); ?>" alt="Suho shop logo">
            </a>
            <div class="main-header__sitename">
              <span>Suho</span>
              Shop
            </div>
          </div>
          <ul class="main-header__info">
            <li>
              <a target="_blank" target="_blank" href="https://www.instagram.com/<?php the_field('instagram', 'option'); ?>/">
                <i class="fab fa-instagram"></i>
                @<?php the_field('instagram', 'option'); ?>
              </a>
            </li>
            <li>
              <a target="_blank" target="_blank" href="tel:<?php the_field('phone', 'option'); ?>">
                <i class="far fa-phone"></i>
                <?php the_field('phone', 'option'); ?>
              </a>
            </li>
          </ul>
        </div>
      </header>

      <?php
        if( !is_404() && !is_checkout() ):
          get_template_part( 'miniCart/cart', 'template' );
          get_template_part( 'miniCart/discount', 'template' );
        endif;
      ?>