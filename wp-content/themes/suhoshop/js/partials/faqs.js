(function(){

  const faqs = document.querySelectorAll('.faq .question');
  faqs.forEach(faq => {
    faq.onclick = e => {
      e.preventDefault();
      e.target.parentNode.classList.toggle('active');
    }
  });

})();