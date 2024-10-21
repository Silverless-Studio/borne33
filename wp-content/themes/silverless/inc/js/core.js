//=require vendor/01-mixitup.min.js
//=require vendor/02-mixitup-pagination.js
//=require vendor/fslightbox.js
//=require vendor/mapbox-geocoder.min.js
//=require vendor/mapbox.js
//=require vendor/slick.js

'use strict';
jQuery(document).ready(function ($) {
  var navHeight = $('.main-nav').outerHeight();

  /* ADD CLASS ON SCROLL DOWN nPX */
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      $('body').addClass('scrolled');
      $('.main-nav').css('top', '-' + navHeight + 'px');
    } else {
      $('body').removeClass('scrolled');
      $('.main-nav').css('top', '0');
    }
  });
  /* ADD CLASS ON SCROLL UP */
  var c,
    currentScrollTop = 0,
    navbar = $('.main-nav');

  $(window).scroll(function () {
    var a = $(window).scrollTop();
    var b = navbar.height();
    currentScrollTop = a;
    if (c < currentScrollTop && a > b + b) {
      navbar.css('top', '-' + navHeight + 'px');
      navbar.removeClass('solid');
    } else if (c > currentScrollTop && !(a <= b)) {
      navbar.css('top', '0');
      navbar.addClass('solid');
    }
    c = currentScrollTop;
  });

  $('.js-view-grid').on('click', function (e) {
    e.preventDefault();
    $('#page').toggleClass('show-grid');
    $(this).addClass('active');
  });

  /* INITIATE SLIDERS */
  // $('.recipe-slider').slick({
  //   infinite: true,
  //   centerMode: true,
  //   slidesToShow: 1,
  //   centerPadding: '25px',
  //   variableWidth: true,
  //   rows: 0,
  //   prevArrow: $('.slider--nav-previous'),
  //   nextArrow: $('.slider--nav-next')
  // });

  $('.recipe-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    prevArrow: $('.slider--nav-previous'),
    nextArrow: $('.slider--nav-next'),
    dots: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          infinite: true,
          centerMode: true,
          slidesToShow: 1,
          centerPadding: '25px',
          variableWidth: true,
          dots: false,
          rows: 0
        }
      }
    ]
  });

  /* SCROLL TO NEXT SECTION */
  $('body').on('click', '.js_scroll-next-section', function (e) {
    e.preventDefault();
    var $currentSection = $(this).closest('section');
    var $nextSection = $currentSection.next('section');
    var $nextdiv = $currentSection.next('div');
    if ($nextSection.length > 0) {
      $nextSection[0].scrollIntoView({ behavior: 'smooth' });
    }
    if ($nextdiv.length > 0) {
      $nextdiv[0].scrollIntoView({ behavior: 'smooth' });
    }
  });

  // /* ANIMATIONS */
  // $('body').addClass('js-on');

  // function handleIntersection(entries, observer) {
  //   entries.forEach((entry) => {
  //     if (entry.isIntersecting) {
  //       $(entry.target).removeClass('hidden').addClass('visible');
  //     } else {
  //       $(entry.target).removeClass('visible').addClass('hidden');
  //     }
  //   });
  // }

  // // Create an Intersection Observer for non-tiled elements
  // const observer = new IntersectionObserver(
  //   (entries) => handleIntersection(entries, observer),
  //   {
  //     threshold: 0.5,
  //     rootMargin: '0px 0px -25% 0px' // Adjusts the trigger point to when the top hits the center
  //   }
  // );

  // // Target non-tiled elements to observe
  // const nonTiledElements = $(
  //   '.fm-below, .fm-above, .fm-left, .fm-right, .fade-in, .grow, .grow-right'
  // );

  // // Start observing each non-tiled target element
  // nonTiledElements.each(function (index, element) {
  //   observer.observe(element);
  // });

  // // Create an Intersection Observer for tiled elements
  // const tiledObserver = new IntersectionObserver(
  //   (entries) => {
  //     entries.forEach((entry, index) => {
  //       if (entry.isIntersecting && !$(entry.target).hasClass('animated')) {
  //         // Calculate delay based on index
  //         const delay = index * 400; // Adjust this delay according to your preference
  //         setTimeout(() => {
  //           $(entry.target).removeClass('hidden').addClass('visible animated');
  //         }, delay);
  //       }
  //     });
  //   },
  //   {
  //     threshold: 0.5,
  //     rootMargin: '0px 0px -25% 0px' // Same adjustment for the tiled elements
  //   }
  // );

  // // Target tiled elements to observe
  // const tiledElements = $('.tiled, .tiled-fm-left');

  // // Start observing each tiled target element
  // tiledElements.each(function (index, element) {
  //   tiledObserver.observe(element);
  // });
  $(document).on('scroll', function () {
    var header = $('#home-header');
    var scrollPosition = $(window).scrollTop();

    // Check if the scroll is beyond 100vh
    if (scrollPosition > $(window).height()) {
      header.addClass('visible');
    } else {
      header.removeClass('visible');
    }
  });
});

// document.getElementById('no-btn').addEventListener('click', function() {
//     window.location.href = 'https://www.google.com'; // Redirect to another page if under 18
// });
