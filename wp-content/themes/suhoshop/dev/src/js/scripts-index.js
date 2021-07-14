/* --------------------
  START mini cart
-------------------- */
(function(){

//= miniCart/quantity.js
//= miniCart/cartAction.js
//= miniCart/addToCart.js
//= miniCart/removeFromCart.js
//= miniCart/openCart.js
//= miniCart/closeCart.js
//= miniCart/closeDiscount.js
//= partials/timer.js

})();
/* --------------------
  END mini cart
-------------------- */

//= partials/popup.js
//= partials/faqs.js
//= partials/gs.js

let productScroll = localStorage.getItem('productScroll'),
  productBox = document.getElementsByClassName(`${productScroll}`);
if(productScroll){
  productBox[0].scrollIntoView();
  localStorage.removeItem('productScroll');
}

const wooNotices = document.querySelector('.woocommerce-notices-wrapper')
if(wooNotices) wooNotices.innerHTML = ' ';

document.querySelector('.goToProduct').addEventListener('click', e => {
  e.preventDefault();
  document.getElementById('products').scrollIntoView({block: "start", behavior: "smooth"})
});