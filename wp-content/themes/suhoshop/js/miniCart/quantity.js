const cartQuantity = (id, q) => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", 'setCartQuantity')
    formData.append("p_id", id)
    formData.append("p_q", q)

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

let quantityPlus = () => {
  let btns = document.querySelectorAll('.quantity-plus');
  btns.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();

      let
        id = e.target.dataset.product_id,
        num = document.querySelector(`.quantity-num__${id}`);

      document.querySelector('.loader').classList.remove('loader-hide');
      num.innerHTML = Number(num.innerHTML) + 1;

      cartQuantity(id, num.innerHTML)
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
        .then(res => {
          document.querySelector('.loader').classList.add('loader-hide');
        })
    });
  })
}
quantityPlus();

let quantityMinus = () => {
  let btns = document.querySelectorAll('.quantity-minus');
  btns.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();

      let
        id = e.target.dataset.product_id,
        num = document.querySelector(`.quantity-num__${id}`);

      document.querySelector('.loader').classList.remove('loader-hide');
      num.innerHTML = Number(num.innerHTML) - 1;

      if(num.innerHTML == 0){
        document.getElementById('product-'+id).remove();
      }

      cartQuantity(id, num.innerHTML)
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
            console.log(cartItems.length);
            if(cartItems.length === 0){
              document.querySelector('.cart').classList.add('cart-hide');
              document.querySelector('.cart-button').classList.add('cart-button-hide');
            }
          })
        .then(res => {
          document.querySelector('.loader').classList.add('loader-hide');
        })
    });
  })
}
quantityPlus();