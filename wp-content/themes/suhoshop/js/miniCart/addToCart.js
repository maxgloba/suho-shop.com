const cartActionAdd = (id, q) => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", 'addToCart')
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

let addToCart = document.querySelectorAll('.addToCart');
addToCart.forEach(add => {
  add.onclick = e => {
    e.preventDefault();

    let q = e.target.dataset.quantity,
      id = e.target.dataset.product_id;

    document.querySelector('.loader').classList.remove('loader-hide');

    cartActionAdd(id, q)
      .then(total => {

        const discountSalesNums = document.querySelectorAll('.discount-sales .num');
        discountSalesNums.forEach(num => {
          num.classList.remove('num-active');
        });

        const cartDiscounts = document.querySelectorAll('.cartDiscount');
        if(total < 2000){
          document.querySelector('.discount-sales .num-0').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-3%';
          });
        } else if(total >= 2000 && total < 5000){
          document.querySelector('.discount-sales .num-3').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-5%';
          });
        } else if(total >= 5000 && total < 10000){
          document.querySelector('.discount-sales .num-5').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-10%';
          });
        } else if(total >= 10000){
          document.querySelector('.discount-sales .num-10').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-10%';
          });
        } else {
          document.querySelector('.openCart').click();
        }

        const cartTotals = document.querySelectorAll('.cartTotal');
        cartTotals.forEach(totale => {
          totale.innerHTML = total;
        });

        document.querySelector('.cart-button').classList.remove('cart-button-hide');
        document.querySelector('.loader').classList.add('loader-hide');


      });

  }
});