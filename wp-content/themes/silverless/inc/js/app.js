// Ensure GSAP and ScrollTrigger are loaded
gsap.registerPlugin(ScrollTrigger);

// Target the SVG with the class 'blog'
gsap.to('.blob', {
  fill: 'red', // Fill color change to red
  scrollTrigger: {
    trigger: '.background--image-high',
    markers: true,
    start: 'top 80%', // When the top of the SVG hits the bottom of the screen
    end: 'top 20%', // When the top of the SVG hits the top of the screen
    toggleActions: 'play reverse play reverse', // Play when in view, reverse when out of view
    onLeaveBack: () => gsap.to('.blob', { fill: 'black' }) // Reset to the original color (black)
  }
});
