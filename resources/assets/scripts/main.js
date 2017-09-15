/** import external dependencies */
import 'jquery';
import 'bootstrap';
import './util/jquery.simplr.smoothscroll.min';
import './util/jquery.mousewheel.min';
import '../plugins/owlcarousel/owl.carousel.js';

// $.srSmoothscroll({step: 200, speed: 600});


$('.carousel_widget').owlCarousel({
  loop: true,
  margin: 10,
  smartSpeed: 700,
  nav: true,
  dots: false,
  items: 1,
});

// КАТЕГОРИИ
$('.list_cats').owlCarousel({
  loop: false,
  autoplay: true,
  autoplayTimeout: 4000,
  autoplayHoverPause:true,
  smartSpeed: 1000,
  margin: 0,
  nav: true,
  dots: false,
  items: 4,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});



