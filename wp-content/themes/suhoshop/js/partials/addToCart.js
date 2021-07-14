(function(){


  function addToCartFunction(id, q){
    var formData = new FormData();

    formData.append("action", "addToCart");
    formData.append("p_id", id);
    formData.append("p_q", q);

    var request = new XMLHttpRequest();
    request.open('POST', data.ajax, true);

    request.onload = function() {
      if (this.status >= 200 && this.status < 400) {
        console.log(this.response);
      } else {
        console.log(this.response);
      }
    };

    request.onerror = function() {
      console.log(this.response);
    };

    request.send(formData);
  }



// Quantity
  let quantity = document.querySelectorAll('[name="quantity"]');
  for(i=0; i < quantity.length; i++){
    quantity[i].addEventListener('change', function(e){
      let val = e.target.value,
        quantityID = e.target.dataset.quantityProduct_id,
        quantityProductID = document.querySelector('[data-product_id="'+quantityID+'"]');
      quantityProductID.dataset.quantity = val;
    });
  }

// Add to cart
  let addToCart = document.querySelectorAll('.addToCart');
  addToCart.forEach(add => {
    add.addEventListener('click', e => {
      e.preventDefault();
      let q = e.target.dataset.quantity,
        id = e.target.dataset.product_id;
      addToCartFunction(id, q);
      e.target.classList.add('added');
    });
  });
  // for(i=0; i < addToCart.length; i++){
  //   addToCart[i].addEventListener('click', function(e){
  //     let q = e.target.dataset.quantity,
  //       id = e.target.dataset.product_id;
  //     addToCartFunction(id, q);
  //     e.target.classList.add('added');
  //   });
  // }

})();