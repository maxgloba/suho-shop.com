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