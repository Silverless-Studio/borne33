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
  $('.recipe-slider').slick({
    infinite: true,
    centerMode: true,
    slidesToShow: 1,
    centerPadding: '25px',
    variableWidth: true,
    rows: 0,
    prevArrow: $('.hero__navigation__previous'),
    nextArrow: $('.hero__navigation__next')
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

  /* MENU */
  $('header').on('click', '.mobile-burger svg', function () {
    $('header').addClass('mobile-menu-open');
  });

  $('header').on('click', '.menu-close svg', function () {
    $('header').removeClass('mobile-menu-open');
    $('.sub-menu').removeClass('show');
  });

  $('header .menu-item.menu-item-has-children').each(function () {
    var self = $(this);
    var clone = $(self).clone();
    $(clone).removeClass(
      'menu-item-has-children current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor'
    );
    $(clone).attr('id', `sub-${$(clone).attr('id')}`);
    $(clone).find('.sub-menu').remove();
    $(self).find('.sub-menu').prepend(clone);
  });

  $('header').on('click', '.menu-item a', function (e) {
    var menuItem = $(this).closest('.menu-item');
    if ($(menuItem).hasClass('menu-item-has-children')) {
      e.preventDefault();
      $('.sub-menu').removeClass('show');
      $(this).next('.sub-menu').addClass('show');
    }
  });

  /* ANIMATIONS */
  $('body').addClass('js-on');

  function handleIntersection(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        $(entry.target).removeClass('hidden').addClass('visible');
      } else {
        $(entry.target).removeClass('visible').addClass('hidden');
      }
    });
  }

  // Create an Intersection Observer
  const observer = new IntersectionObserver(handleIntersection, {
    threshold: 0.5
  });

  // Target elements to observe
  const targetElements = $('.fm-above, .fm-left, .fm-right');

  // Start observing each target element
  targetElements.each(function (index, element) {
    observer.observe(element);
  });

  $(document).on('scroll', function () {
    var header = $('#site-header');
    var scrollPosition = $(window).scrollTop();

    // Check if the scroll is beyond 100vh
    if (scrollPosition > $(window).height()) {
      header.addClass('visible');
    } else {
      header.removeClass('visible');
    }
  });
});
