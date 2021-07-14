(function(){

  const callAction = actionName => {
    return new Promise((resolve, reject) => {
      var formData = new FormData();
      formData.append("action", actionName);
      var request = new XMLHttpRequest();
      request.open('POST', data.ajax, true);
      request.onload = function() {
        if (this.status >= 200 && this.status < 400) {
          resolve(this.response);
        }
      };

      request.onerror = function() {
        reject(this.response);
      };

      request.send(formData);
    });
  }


  // const callAction = actionName => {
  //   var formData = new FormData();
  //   formData.append("action", actionName);
  //   var request = new XMLHttpRequest();
  //   request.open('POST', data.ajax, true);
  //   request.onload = function() {
  //     if (this.status >= 200 && this.status < 400) {
  //       console.log(this.response);
  //       return this.response;
  //     }
  //   };

  //   request.onerror = function() {
  //     console.log(this.response);
  //   };

  //   request.send(formData);
  // }

  document.querySelector('.openCart').addEventListener('click', e => {
  e.preventDefault();
    document.querySelector('.cart').classList.remove('cart-hide');
    callAction('getTotal').then(res => {
      console.log(res);
      document.querySelector('.cartTotal').innerHTML = res;
    });
    callAction('getCartCount')
      .then(res => {
        console.log(res);
      })
    callAction('getCartItems')
      .then(res => {
        document.querySelector('.cartItems').innerHTML = res;
      })
  });

})();