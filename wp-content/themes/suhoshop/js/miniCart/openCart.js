// let timerFlag = true;
const openCart = document.querySelectorAll('.openCart');
openCart.forEach(btn => {
  btn.onclick = () => {

    document.querySelector('.discount').classList.add('discount-hide');

    document.querySelector('.loader').classList.remove('loader-hide');

    cartAction('getTotal')
      .then(res => {
        const cartTotals = document.querySelectorAll('.cartTotal');
        cartTotals.forEach(total => {
          total.innerHTML = res;
        })
      })
      .then(() => cartAction('getCartItems'))
      .then(res => {
        document.querySelector('.cartItems').innerHTML = res;
        removeFromCart();
        quantityPlus();
        quantityMinus();
      })
      .then(() => cartAction('getDiscount'))
      .then(res => {
        const cartDiscounts = document.querySelectorAll('.cartDiscount');
        cartDiscounts.forEach(cartDiscount => {
          cartDiscount.innerHTML = res;
        });
      })
      .then(() => {
        document.querySelector('.cart').classList.remove('cart-hide');
        document.querySelector('.loader').classList.add('loader-hide');
      })
    // if(timerFlag) timer_counter(document.querySelector('[data-time]'));


  }
});