// Ensure GSAP and ScrollTrigger are loaded
gsap.registerPlugin(ScrollTrigger);

// Target the SVG with the class 'blog'
gsap.to('.blob', {
  fill: 'red', // Fill color change to red
  scrollTrigger: {
    trigger: '.background--image-high',
    // markers: true,
    start: 'top 80%', // When the top of the SVG hits the bottom of the screen
    end: 'top 20%', // When the top of the SVG hits the top of the screen
    toggleActions: 'play reverse play reverse', // Play when in view, reverse when out of view
    onLeaveBack: () => gsap.to('.blob', { fill: 'black' }) // Reset to the original color (black)
  }
});

// Animate the sunburst down the page
gsap.to('.sunburst', {
  scrollTrigger: {
    trigger: 'body', // Start the animation on body scroll
    start: 'top top', // Start the animation when the user starts scrolling
    end: 'bottom bottom', // End when the user reaches the bottom of the page
    scrub: true // Smoothly transition as the user scrolls
  },
  y: window.innerHeight + 200, // Move the sunburst down by the height of the window + extra to make it exit the bottom
  ease: 'none' // Linear animation
});

gsap.to('.dark-gradient', {
  '--start-grad': '50%', // Animate from 0% to 50%
  '--end-grad': '200%', // Animate from 100% to 200%
  scrollTrigger: {
    trigger: '.section--two',
    start: 'top bottom', // Start the animation when the page starts scrolling
    end: 'bottom+=200vh', // Animation ends after scrolling 200vh
    markers: true,
    scrub: true // Makes the animation follow the scroll position
  }
});

// Create a GSAP timeline for the splats
const tl = gsap.timeline({
  repeat: 0,
  defaults: { duration: 0.1, ease: 'back.out(1.7)' }
});

// Target each splat and animate them in sequence
tl.to('.splat--one', { opacity: 1, scale: 1 })
  .to('.splat--two', { opacity: 1, scale: 1 }, '+=0.1') // Delay of 0.2 seconds between each
  .to('.splat--three', { opacity: 1, scale: 1 }, '+=0.1')
  .to('.splat--four', { opacity: 1, scale: 1 }, '+=0.1')
  .to('.splat--five', { opacity: 1, scale: 1 }, '+=0.1')
  .to('.splat--six', { opacity: 1, scale: 1 }, '+=0.1')
  .to('.splat--seven', { opacity: 1, scale: 1 }, '+=0.1')
  .to('.splat--eight', { opacity: 1, scale: 1 }, '+=0.1')
  .to('.splat--nine', { opacity: 1, scale: 1 }, '+=0.1');
