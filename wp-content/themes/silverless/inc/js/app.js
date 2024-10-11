// Ensure GSAP and ScrollTrigger are loaded
gsap.registerPlugin(ScrollTrigger);

// // Target the SVG with the class 'blog'
// gsap.to('.blob', {
//   fill: 'red', // Fill color change to red
//   scrollTrigger: {
//     trigger: '.background--image-high',
//     // markers: true,
//     start: 'top 80%', // When the top of the SVG hits the bottom of the screen
//     end: 'top 20%', // When the top of the SVG hits the top of the screen
//     toggleActions: 'play reverse play reverse', // Play when in view, reverse when out of view
//     onLeaveBack: () => gsap.to('.blob', { fill: 'black' }) // Reset to the original color (black)
//   }
// });

// // Animate the sunburst down the page
// gsap.to('.sunburst', {
//   scrollTrigger: {
//     trigger: 'body', // Start the animation on body scroll
//     start: 'top top', // Start the animation when the user starts scrolling
//     end: 'bottom bottom', // End when the user reaches the bottom of the page
//     scrub: true // Smoothly transition as the user scrolls
//   },
//   y: window.innerHeight + 200, // Move the sunburst down by the height of the window + extra to make it exit the bottom
//   ease: 'none' // Linear animation
// });

gsap.to('.dark-gradient', {
  '--start-grad': '100%', // Animate from 0% to 50%
  '--end-grad': '300%', // Animate from 100% to 200%
  scrollTrigger: {
    trigger: '.section--two',
    start: 'top bottom', // Start the animation when the page starts scrolling
    end: 'bottom+=300vh', // Animation ends after scrolling 200vh

    scrub: true // Makes the animation follow the scroll position
  }
});

// Function to start splat animations
function startSplatAnimations() {
  const tl = gsap.timeline({
    repeat: 0,
    defaults: { duration: 0.1, ease: 'back.out(1.7)' }
  });

  // Target each splat and animate them in sequence
  tl.to('.splat--one', { opacity: 1, scale: 1 })
    .to('.splat--two', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--three', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--four', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--five', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--six', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--seven', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--eight', { opacity: 1, scale: 1 }, '+=0.1')
    .to('.splat--nine', { opacity: 1, scale: 1 }, '+=0.1')
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
}

gsap.to('.spin-me', {
  rotate: 360,
  duration: 20,
  ease: 'none',
  repeat: -1 // Continuous spin
});

// Apply the animation to all elements with the class .fm-above
gsap.utils.toArray('.fm-above').forEach((element) => {
  gsap.from(element, {
    y: -24, // Move 24px above
    opacity: 0, // Start at 0 opacity
    duration: 1.5, // Animation duration (1 second)
    ease: 'power2.out', // Easing for smooth motion
    scrollTrigger: {
      trigger: element, // Trigger animation when the element enters the viewport
      start: 'top center', // Start animation when the element hits the center of the viewport
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
      start: 'top center', // Start animation when the element hits the center of the viewport
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
        start: 'top center', // Start when 'li' hits the center of the viewport
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

// Create a timeline for step animations
const tl = gsap.timeline({
  scrollTrigger: {
    trigger: '.section--three', // Trigger when 'section--three' hits the center of the viewport
    start: 'top center', // Start when the top of 'section--three' hits the center
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
      x: -100, // Enter from the left (-100px)
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

// Target both splat elements
gsap.utils.toArray('.splats').forEach((splat) => {
  // Create a splat animation for each element
  gsap.from(splat, {
    scale: 0, // Start with scale 0 (invisible)
    opacity: 0, // Start with 0 opacity (fade in)
    duration: 1, // Duration of the animation (1 second)
    ease: 'back.out(1.7)', // Splat effect with back easing
    scrollTrigger: {
      trigger: '.splats--top', // Trigger animation when the element hits the center of the viewport
      start: 'top 75%', // Start when the top of the element hits the center
      toggleActions: 'play none none none' // Play once when entering the viewport
    }
  });
});
