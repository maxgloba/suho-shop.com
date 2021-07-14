(function(){

  const closeCart = document.querySelectorAll('.closeCart');
  closeCart.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      document.querySelector('.cart').classList.add('cart-hide');
    });
  });

})();