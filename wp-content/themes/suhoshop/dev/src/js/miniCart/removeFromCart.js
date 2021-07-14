const cartActionRemove = (id, q) => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", 'removeFromCart')
    formData.append("p_id", id)

    request.open('POST', data.ajax, true)

    request.onload = function(){
      if (this.status >= 200 && this.status < 400) {
        resolve(this.response)
      }
    }

    request.onerror = function(){
      reject(this.response)
    };

    request.send(formData)
  })
}

let removeFromCart = () => {
  let removeFromCart = document.querySelectorAll('.removeFromCart');
  removeFromCart.forEach(remove => {
    remove.addEventListener('click', e => {
      e.preventDefault();

      let id = e.target.dataset.product_id;

      document.getElementById('product-'+id).remove();

      cartActionRemove(id)
        .then(() => cartAction('getTotal'))
        .then(getTotal => {
          const cartTotals = document.querySelectorAll('.cartTotal');
          cartTotals.forEach(total => {
            total.innerHTML = getTotal;
          })
        })
        .then(() => cartAction('getDiscount'))
        .then(getDiscount => {
          const cartDiscounts = document.querySelectorAll('.cartDiscount');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = getDiscount;
          });

          let cartItems = document.querySelectorAll('.cart-item');
          if(cartItems.length === 0){
            document.querySelector('.cart').classList.add('cart-hide');
            document.querySelector('.cart-button').classList.add('cart-button-hide');
          }
        })

    });
  });
}
removeFromCart();