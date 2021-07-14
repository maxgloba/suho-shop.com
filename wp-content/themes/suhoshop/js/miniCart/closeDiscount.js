const closeDiscount = document.querySelectorAll('.closeDiscount');
closeDiscount.forEach(close => {
  close.addEventListener('click', e => {
    e.preventDefault();
    document.querySelector('.discount').classList.add('discount-hide');
  });
});