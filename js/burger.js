const slide = () => {

  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.navbar-ul-links');
    burger.addEventListener('click', () => {
      nav.classList.toggle('nav-active');
      burger.classList.toggle('toggle');
    });
    
}
slide();
