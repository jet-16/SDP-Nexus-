var modalBtn = document.querySelector('.btnrate');
var modalBg = document.querySelector('.ratemodal-bg');
var modalClose = document.querySelector('.fa-times');

modalBtn.addEventListener('click', function() {
  modalBg.classList.add('modal-active');
});

modalClose.addEventListener('click', function() {
  modalBg.classList.remove('modal-active');
});
