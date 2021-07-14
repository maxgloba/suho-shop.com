<div class="cart cart-hide">
  <div class="cart-wrap">
    <button class="cart-close closeCart"><i class="fas fa-times"></i></button>
    <h3>Корзина</h3>
    <div class="cart-items cartItems">
      <?php echo theCartItems(); ?>
    </div>

    <div class="cart-discount">
      Скидка:
      <span class="cartDiscount"><?php echo theDiscount(); ?></span>
    </div>

    <div class="cart-total">
      Всего:
      <span class="cartTotal"><?php echo theTotal(); ?></span>
    </div>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-add">Завершить покупку</a>
    <button class="btn btn-link closeCart">Продолжить покупки</button>
  </div>
</div>
<button class="cart-button openCart <?php if(theItemsCount() == 0){ echo "cart-button-hide"; } ?>" >
  <i class="fas fa-shopping-cart"></i>
  <span class="cartTotal"><?php echo theTotal(); ?></span>
</button>