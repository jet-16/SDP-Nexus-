var modalBtn = document.querySelector('.purchase');
var modalBg = document.querySelector('.paybg-div');
var modalClose = document.querySelector('.modal-close');
var modalBuy = document.querySelector('.ty');
var modalTy = document.querySelector('.ty-div');
var modalDiv = document.querySelector('.pay-div');
var modalXty = document.querySelector('.xty');

modalBtn.addEventListener('click', function() {
  modalBg.classList.add('modal-active');
});

modalClose.addEventListener('click', function() {
  modalBg.classList.remove('modal-active');
});

modalBuy.addEventListener('click', function() {
  modalTy.classList.add('ty-active');
  modalDiv.classList.add('pay-unactive');
});

modalXty.addEventListener('click', function() {
  modalBg.classList.remove('modal-active');
  modalTy.classList.remove('ty-active');
  modalDiv.classList.remove('pay-unactive');
});
