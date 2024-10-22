// Ensure GSAP and ScrollTrigger are loaded
gsap.registerPlugin(ScrollTrigger);

// Function to set a cookie
function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000); // Convert days to milliseconds
  document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
}

// Function to get a cookie value
function getCookie(name) {
  const nameEQ = name + '=';
  const ca = document.cookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

// Check if the age verification cookie exists
if (getCookie('ageVerified') === 'true') {
  document.body.classList.add('age-verified'); // Show content
  animateContent(); // Greensock animation for content
} else {
  // Ensure the body remains hidden until age gate interaction
  document.body.style.display = 'block'; // Now just show the age gate

  document.getElementById('age-gate').style.display = 'flex';

  document.getElementById('yes-btn').addEventListener('click', function () {
    document.body.classList.add('age-verified'); // Show content
    setCookie('ageVerified', 'true', 180); // Set cookie to expire in 180 days

    // Start splat animations and fade out the age gate after the last splat
    startSplatAnimations();
  });
}

function startSplatAnimations() {
  // Example Greensock splat animation
  gsap.to('#splat1', { opacity: 1, duration: 1, ease: 'back.out' });
  gsap.to('#splat2', { opacity: 1, duration: 1, delay: 0.5, ease: 'back.out' });

  // After splat animations complete, fade out the age gate and reveal content
  gsap.to('#age-gate', {
    opacity: 0,
    duration: 0.5,
    onComplete: function () {
      document.getElementById('age-gate').style.display = 'none';
      document.body.classList.add('age-verified'); // Reveal content
      animateContent(); // Trigger Greensock content animations
    }
  });
}

function animateContent() {
  // Greensock animations for content after verification
  gsap.to('.content', { opacity: 1, duration: 1 });
}
if (document.querySelector('.section--two')) {
  // gsap.to('.dark-gradient', {
  //   '--start-grad': '20%',
  //   '--end-grad': '80%',
  //   scrollTrigger: {
  //     trigger: '.hero',
  //     start: 'bottom top',
  //     endTrigger: '.site-footer',
  //     end: 'top bottom',
  //     scrub: true
  //   }
  // });

  // Grow the image when .hero bottom hits the center of the viewport
  gsap.to('.background--image-bottle img', {
    scale: 1.5,
    y: '25vh',
    duration: 2, // Slow animation
    ease: 'power2.out', // Smooth easing
    scrollTrigger: {
      trigger: '.hero',
      start: 'bottom center', // Start when .hero's bottom hits the center
      endTrigger: '.site-footer',
      end: 'top bottom', // Continue the grow until .hero exits the viewport
      toggleActions: 'play reverse play reverse' // Play on scroll down, reverse on scroll up
    }
  });
}

if (document.querySelector('.section--three')) {
  gsap.to('.dark-gradient', {
    '--start-grad': '50%',
    '--end-grad': '120%',
    duration: 2,
    ease: 'power2.out', // Smooth easing
    scrollTrigger: {
      trigger: '.hero',
      start: 'bottom center',
      endTrigger: '.site-footer',
      end: 'top bottom',
      // scrub: true,
      toggleActions: 'play reverse play reverse' // Play on scroll down, reverse on scroll up
    }
  });
}

// Function to trigger page content animation
function animateContent() {
  const heroTop = document.querySelector('.hero-fm-top');

  // Check if '.hero-fm-top' exists
  if (!heroTop) {
    return; // Exit the function if element is not found
  }

  const line = heroTop.querySelector('.line');

  // Check if '.line' exists within '.hero-fm-top'
  if (!line) {
    return; // Exit the function if element is not found
  }

  const tl = gsap.timeline();

  // Animate the '.hero-fm-top' (adjust selectors as needed)
  tl.fromTo(
    heroTop,
    { opacity: 0, y: -24 }, // Start at 0 opacity and 24px above
    { opacity: 1, y: 0, duration: 1, ease: 'power2.out' } // Animate to full opacity and normal position
  ).to(
    line,
    { height: '100%', duration: 0.5, ease: 'power2.out' }, // Animate to 100% height
    '-=0.5'
  );
}

// Function to start splat animations
function startSplatAnimations() {
  const tl = gsap.timeline({
    repeat: 0,
    defaults: { duration: 0.2, ease: 'back.out(1.7)' }
  });

  // Target each splat and animate them in sequence
  tl.to('.splat--one', { opacity: 0.95, scale: 1, zIndex: 50 })
    .to('.splat--two', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--three', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--four', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--five', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--six', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--seven', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--eight', { opacity: 0.95, scale: 1, zIndex: 50 }, '+=0.1')
    .to('.splat--nine', { opacity: 1, scale: 1, zIndex: 50 }, '+=0.1')
    .add(function () {
      // Fade out the age gate after the last splat
      const ageGate = document.getElementById('age-gate');
      gsap.to(ageGate, {
        opacity: 0,
        duration: 1,
        onComplete: function () {
          ageGate.style.pointerEvents = 'none'; // Disable interactions after fading out
        }
      });
    });
  animateContent();
}

if (document.querySelector('.spin-me')) {
  gsap.to('.spin-me', {
    rotate: 360,
    duration: 150,
    ease: 'none',
    repeat: -1 // Continuous spin
  });
}

// Apply the animation to all elements with the class .fm-above
gsap.utils.toArray('.fm-above').forEach((element) => {
  gsap.from(element, {
    y: -24, // Move 24px above
    opacity: 0, // Start at 0 opacity
    duration: 1.5, // Animation duration (1 second)
    ease: 'power2.out', // Easing for smooth motion
    scrollTrigger: {
      trigger: element, // Trigger animation when the element enters the viewport
      start: 'top 60%', // Start animation when the element hits the center of the viewport
      toggleActions: 'play none none none' // Play the animation when entering the viewport
    }
  });
});

// Apply the animation to all elements with the class .fm-above
gsap.utils.toArray('.fm-right').forEach((element) => {
  gsap.from(element, {
    x: 24, // Move 24px left
    opacity: 0, // Start at 0 opacity
    duration: 1.5, // Animation duration (1 second)
    ease: 'power2.out', // Easing for smooth motion
    scrollTrigger: {
      trigger: element, // Trigger animation when the element enters the viewport
      start: 'top 60%', // Start animation when the element hits the center of the viewport
      toggleActions: 'play none none none' // Play the animation when entering the viewport
    }
  });
});

// Apply the animation to all elements with the class .fm-above
gsap.utils.toArray('.fm-left,.entry-summary').forEach((element) => {
  gsap.from(element, {
    x: -24, // Move 24px left
    //   opacity: 0, // Start at 0 opacity
    duration: 1.5, // Animation duration (1 second)
    ease: 'power2.out', // Easing for smooth motion
    scrollTrigger: {
      trigger: element, // Trigger animation when the element enters the viewport
      start: 'top 60%', // Start animation when the element hits the center of the viewport
      toggleActions: 'play none none none' // Play the animation when entering the viewport
    }
  });
});
// Target all 'li' elements within '.content_blocks'
gsap.utils.toArray('.content_blocks li').forEach((li, index) => {
  // Create a timeline for each 'li' with staggered animations
  gsap
    .timeline({
      scrollTrigger: {
        trigger: li, // Trigger animation when each 'li' enters the viewport
        start: 'top 75%', // Start when 'li' hits the center of the viewport
        toggleActions: 'play none none none' // Play only once when entering
      }
    })
    .from(
      li.querySelector('img'),
      {
        rotate: 45, // Rotate image by 45 degrees
        opacity: 0, // Start with 0 opacity
        duration: 0.6, // Duration for image animation
        ease: 'power2.out' // Smooth easing
      },
      index * 0.5
    ) // Add a 1 second delay based on the index of the 'li'
    .from(
      li.querySelector('div'),
      {
        x: 24, // Slide text in from 24px to the right
        opacity: 0, // Start with 0 opacity
        duration: 0.6, // Duration for text animation
        ease: 'power2.out' // Smooth easing
      },
      index * 0.5 + 0.2
    ); // Start text animation after image, with a slight overlap
});
if (document.querySelector('.section--three')) {
  // Create a timeline for step animations
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.section--three', // Trigger when 'section--three' hits the center of the viewport
      start: 'top 60%', // Start when the top of 'section--three' hits the center
      toggleActions: 'play none none none' // Play the animation when entering
    }
  });

  // Step animations with a slight delay between each
  tl.from('.step--one', {
    opacity: 0, // Fade in from 0 to 1 opacity
    duration: 1, // Duration of fade-in
    ease: 'power2.out' // Smooth easing
  })
    .from(
      '.step--two',
      {
        opacity: 0, // Fade in from 0 to 1 opacity
        duration: 1, // Duration of movement and fade-in
        ease: 'power2.out' // Smooth easing
      },
      '+=0.3'
    ) // Add a 0.5-second delay after the first animation finishes
    .from(
      '.step--three',
      {
        opacity: 0, // Fade in from 0 to 1 opacity
        duration: 1, // Duration of fade-in
        ease: 'power2.out' // Smooth easing
      },
      '+=0.3'
    ); // Add a 0.5-second delay after the second animation
}
gsap.utils.toArray('.splats').forEach((splat) => {
  // Create a timeline for each splat
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.splats--top', // Trigger animation when this element hits the viewport
      start: 'top 80%', // Start when the top of the element hits 80% of the viewport height
      toggleActions: 'play none none none' // Play once when entering the viewport
    }
  });

  // First animation: splat effect (scale and fade in)
  tl.from(splat, {
    opacity: 0, // Start with 0 opacity (fade in)
    duration: 1, // Duration of the animation (1 second)
    ease: 'back.out(1.7)' // Splat effect with back easing
  })

    // Second animation: fade out to 0.5 opacity after the splat animation
    .to(splat, {
      opacity: 0.5, // Fade to 0.5 opacity
      duration: 1, // Duration of the fade
      ease: 'power2.inOut' // Smooth easing for fade
    });
});
if (document.querySelector('.section--five')) {
  // Create the animation
  gsap.to('.section--five .line', {
    height: '100%',
    scrollTrigger: {
      trigger: '.section--five',
      start: 'top center', // when the top of the section hits the center of the viewport
      end: 'bottom center', // when the bottom of the section hits the center of the viewport
      scrub: true, // smooth scrubbing, takes the duration of the scroll
      toggleActions: 'play none none reverse' // play on enter, reverse on leave
    }
  });
}
const sectionSeven = document.querySelector('.section--seven');

if (sectionSeven) {
  const sectionSevenTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: '.section--seven',
      start: 'top center',
      once: true
    }
  });

  const animations = [
    { selector: '.seven--one', props: { y: -50, opacity: 0, duration: 1 } },
    {
      selector: '.seven--two path.leaf-two',
      props: { opacity: 0, rotate: 4, duration: 1 },
      offset: '0'
    },
    {
      selector: '.seven--two path.leaf-five',
      props: { opacity: 0, rotate: 4, duration: 1 },
      offset: '0'
    }, // Ensure these are separated
    {
      selector: '.seven--two path.leaf-one',
      props: { opacity: 0, rotate: -4, duration: 1 },
      offset: '0'
    },
    {
      selector: '.seven--two path.leaf-three',
      props: { opacity: 0, rotate: -4, duration: 1 },
      offset: '0'
    },
    {
      selector: '.seven--two path.leaf-four',
      props: { opacity: 0, rotate: -7, duration: 1 },
      offset: '0'
    },
    {
      selector: '.seven--three',
      props: { opacity: 0, duration: 1 },
      offset: '-=0.5'
    },
    {
      selector: '.seven--four',
      props: { opacity: 0, duration: 1 },
      offset: '-=0.5'
    }
  ];

  animations.forEach(({ selector, props, offset }) => {
    const element = document.querySelector(selector);
    if (element) {
      sectionSevenTimeline.from(element, props, offset);
    }
  });
}

//FOUR BOX REVEAL ANIMATION

// Check if '.section--eight' exists before creating the timeline
const sectionEight = document.querySelector('.section--eight');

if (sectionEight) {
  const sectionEightTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: '.section--eight',
      start: 'top center',
      once: true
    }
  });

  const animations = [
    { selector: '.eight-fade', props: { opacity: 0, duration: 1 } },
    {
      selector: '.grow-right-1',
      props: { opacity: 0, width: 0, duration: 1 },
      offset: '+=0'
    },
    { selector: '.fm-right-1', props: { opacity: 0, x: 16 }, offset: '+=0' },
    {
      selector: '.grow-right-2',
      props: { opacity: 0, width: 0, duration: 1 },
      offset: '+=0'
    },
    { selector: '.fm-right-2', props: { opacity: 0, x: 16 }, offset: '+=0' },
    {
      selector: '.grow-right-3',
      props: { opacity: 0, width: 0, duration: 1 },
      offset: '+=0'
    },
    { selector: '.fm-right-3', props: { opacity: 0, x: 16 }, offset: '+=0' }
  ];

  animations.forEach(({ selector, props, offset }) => {
    const element = document.querySelector(selector);
    if (element) {
      sectionEightTimeline.from(element, props, offset);
    }
  });
}

// Check if the screen is mobile
const isMobile = window.matchMedia('(max-width: 768px)').matches; // Adjust the max-width for your mobile breakpoint

// Number of text blocks (can be increased dynamically)
const totalBlocks = document.querySelectorAll('[class^="text--block"]').length;

// Loop through the blocks and create animations
for (let i = 1; i <= totalBlocks; i++) {
  // Animate fade out of current image/overlay and fade in the next one
  ScrollTrigger.create({
    trigger: `.text--block-${i}`, // Each text block triggers its corresponding image
    start: 'top center', // When the top of the text block hits the center of the viewport
    end: 'bottom center',
    onEnter: () => {
      // On mobile, lock the main image and overlay to the top of the screen
      if (isMobile) {
        gsap.set(`.main-image-${i}`, {
          position: 'fixed',
          top: 0,
          left: 0,
          width: '100%',
          zIndex: 1
        });
        gsap.set(`.overlay-${i}`, {
          position: 'fixed',
          top: 0,
          left: 0,
          width: '100%',
          zIndex: 2
        });
      }

      gsap.to(`.main-image-${i}`, { opacity: 1, duration: 1 });
      gsap.to(`.overlay-${i}`, { opacity: 1, duration: 1 });

      // Fade out previous images and overlays
      if (i > 1) {
        gsap.to(`.main-image-${i - 1}`, { opacity: 0, duration: 1 });
        gsap.to(`.overlay-${i - 1}`, { opacity: 0, duration: 1 });
      }
    },
    onLeaveBack: () => {
      // On mobile, reset position when scrolling back up
      if (isMobile) {
        gsap.set(`.main-image-${i}`, {
          position: 'absolute',
          top: 'initial',
          left: 'initial',
          width: 'auto',
          zIndex: 1
        });
        gsap.set(`.overlay-${i}`, {
          position: 'absolute',
          top: 'initial',
          left: 'initial',
          width: 'auto',
          zIndex: 2
        });
      }

      gsap.to(`.main-image-${i}`, { opacity: 0, duration: 1 });
      gsap.to(`.overlay-${i}`, { opacity: 0, duration: 1 });

      if (i > 1) {
        gsap.to(`.main-image-${i - 1}`, { opacity: 1, duration: 1 });
        gsap.to(`.overlay-${i - 1}`, { opacity: 1, duration: 1 });
      }
    }
  });
}

//RECIPE HAND ANIMATION

const handElement = document.querySelector('#the-hand');

if (handElement) {
  // Use GSAP ScrollTrigger to animate when the element reaches the center of the page
  gsap.from('#the-hand', {
    x: '-120px', // Move from off-screen to the left
    rotation: -45, // Full rotation
    opacity: 0,
    duration: 3, // Duration of the animation
    ease: 'power2.out', // Ease for deceleration
    scrollTrigger: {
      trigger: '#the-hand',
      start: 'top center', // Start when the top of the element hits the center of the viewport
      toggleActions: 'play none none none' // Only play the animation once
    }
  });
}

//  LEFT HAND GLOW ELEMENT

const leftGlow = document.querySelector('.left-glow');
const element1 = document.querySelector('.hero');
const element2 = document.querySelector('.section--eight');

// Check if left-glow exists on the page
if (leftGlow) {
  // Function to update the left-glow based on the position of the elements
  function updateLeftGlow() {
    // Animate the changes using GSAP
    gsap.to(leftGlow, {
      width: '30rem', // Set the new width
      x: '0', // Change the position
      duration: 0.75, // Animation duration
      ease: 'power1.out' // Easing function
    });
  }

  // Create ScrollTrigger for element1
  ScrollTrigger.create({
    trigger: element1, // Trigger point for the first element
    start: 'top center', // Start when the top of element1 hits the center of the viewport
    end: 'bottom center', // End when the bottom of element1 hits the center of the viewport
    onEnter: updateLeftGlow, // Call update function on enter
    onLeave: resetLeftGlow, // Call reset function on leave
    onEnterBack: updateLeftGlow, // Call update on entering back
    onLeaveBack: resetLeftGlow // Call reset on leaving back
  });

  // Create ScrollTrigger for element2
  ScrollTrigger.create({
    trigger: element2, // Trigger point for the second element
    start: 'top center', // Start when the top of element2 hits the center of the viewport
    end: 'bottom center', // End when the bottom of element2 hits the center of the viewport
    onEnter: updateLeftGlow, // Call update function on enter
    onLeave: resetLeftGlow, // Call reset function on leave
    onEnterBack: updateLeftGlow, // Call update on entering back
    onLeaveBack: resetLeftGlow // Call reset on leaving back
  });

  // Reset function for left-glow
  function resetLeftGlow() {
    // Reset to original state if needed
    gsap.to(leftGlow, {
      width: '30rem', // Reset width to initial value
      x: '-30rem', // Reset position if needed
      duration: 0.75,
      ease: 'power1.out'
    });
  }
}
