const closeCart = document.querySelectorAll('.closeCart');
closeCart.forEach(btn => {
  btn.onclick = e => {
    e.preventDefault();
    document.querySelector('.cart').classList.add('cart-hide');
  }
});