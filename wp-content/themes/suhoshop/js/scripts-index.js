/* --------------------
  START mini cart
-------------------- */
(function(){

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
const cartAction = actionName => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", actionName)
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
const closeCart = document.querySelectorAll('.closeCart');
closeCart.forEach(btn => {
  btn.onclick = e => {
    e.preventDefault();
    document.querySelector('.cart').classList.add('cart-hide');
  }
});
const closeDiscount = document.querySelectorAll('.closeDiscount');
closeDiscount.forEach(close => {
  close.addEventListener('click', e => {
    e.preventDefault();
    document.querySelector('.discount').classList.add('discount-hide');
  });
});
  const timer_counter = e => {
    timerFlag = false;
    const deadTime = '<i>00</i>:<i>00</i>:<i>00</i>';
    if(!e.dataset.time) return deadTime;
    const
      now = new Date(),
      timer = setInterval(() => {
        const
          deadline = new Date( now.getTime() + Number(e.dataset.time) * 60000 ),
          dateNow = new Date(),
          t = deadline - dateNow;

        let
          h = Math.floor((t % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60)),
          m = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)),
          s = Math.floor((t % (1000 * 60)) / 1000);

        h = (h < 10) ? `0${h}` : h;
        m = (m < 10) ? `0${m}` : m;
        s = (s < 10) ? `0${s}` : s;

        if (t < 0){
          clearInterval(timer);
          alert("Reserve time has stalled and your goods can be bought by other buyers! Check what's left and continue.");
          timer_counter(document.querySelector('[data-time]'));
        }
        e.innerHTML = (t < 0) ? deadTime : `<i>${h}</i>:<i>${m}</i>:<i>${s}</i>`;
      }, 1000);
  }

})();
/* --------------------
  END mini cart
-------------------- */

(function(){

  let openPopup = document.querySelectorAll('[data-popup]');
  for (let i = 0; i < openPopup.length; i++) {
    openPopup[i].addEventListener('click', function(e){
      e.preventDefault();
      let popupID = e.target.dataset.popup,
        popupContent = document.getElementById(popupID).innerHTML,
        popupContentBox = document.getElementById('popupContentBox');
      popupContentBox.innerHTML = popupContent;
      document.body.classList.add('popup-active');
    });
  }

  let closePopup = document.getElementById('closePopup');
  closePopup.addEventListener('click', function(e){
    e.preventDefault();
    document.body.classList.remove('popup-active');
  });

})();
(function(){

  const faqs = document.querySelectorAll('.faq .question');
  faqs.forEach(faq => {
    faq.onclick = e => {
      e.preventDefault();
      e.target.parentNode.classList.toggle('active');
    }
  });

})();
(function(){

  const gs = document.querySelector('.gs'),
    gs_next = document.querySelector('.gs-next'),
    gs_prev = document.querySelector('.gs-prev'),
    gs_close = document.querySelector('.gs-close'),
    gs_img = document.querySelector('.gs-img'),
    gs_open = document.querySelectorAll('.gs-open'),
    gs_wclose = document.querySelector('.gs-wclose');

  gs_next.onclick = e => {
    let index = Number(gs_img.dataset.index) + 1;
    if( index === gs_images.length) index = 0;
    gs_img.src = gs_images[index];
    gs_img.dataset.index = index;
  }
  gs_img.onclick = e => {
    let index = Number(gs_img.dataset.index) + 1;
    if( index === gs_images.length) index = 0;
    gs_img.src = gs_images[index];
    gs_img.dataset.index = index;
  }
  gs_prev.onclick = e => {
    let index = Number(gs_img.dataset.index) - 1;
    if( index === 0 || index < 0  ) index = gs_images.length - 1;
    gs_img.src = gs_images[index];
    gs_img.dataset.index = index;
  }
  gs_close.onclick = e => {
    gs.classList.add('gs-hide');
  }
  gs_wclose.onclick = e => {
    console.log('111');
    gs.classList.add('gs-hide');
  }
  gs_open.forEach(item => {
    item.onclick = e => {
      gs.classList.remove('gs-hide');
    }
  });

})();

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