var openModal = document.querySelector('.editprofile');
var bgModal = document.querySelector('.editprofile-div-bg');
var closeModal = document.querySelector('.closebtn');

openModal.addEventListener('click', function() {
  bgModal.classList.add('modal-active');
});

closeModal.addEventListener('click', function() {
  bgModal.classList.remove('modal-active');
});
