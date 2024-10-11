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

gsap.to('.dark-gradient', {
  '--start-grad': '100%', // Animate from 0% to 50%
  '--end-grad': '300%', // Animate from 100% to 200%
  scrollTrigger: {
    trigger: '.age-verified .section--two',
    start: 'top bottom', // Start the animation when the page starts scrolling
    end: 'bottom+=300vh', // Animation ends after scrolling 200vh
    scrub: true // Makes the animation follow the scroll position
  }
});

// Function to trigger page content animation
function animateContent() {
  const heroTop = document.querySelector('.hero-fm-top');
  const line = heroTop.querySelector('.line');

  const tl = gsap.timeline();

  // Animate the '.hero-fm-top' (adjust selectors as needed)
  tl.fromTo(
    heroTop,
    { opacity: 0, y: -24 }, // Start at 0 opacity and 24px above
    { opacity: 1, y: 0, duration: 1, ease: 'power2.out' } // Animate to full opacity and normal position
  ).to(
    line,
    { height: '100%', duration: 0.5, ease: 'power2.out' }, // Animate to 100% height
    '+=0'
  );
}

// Function to start splat animations
function startSplatAnimations() {
  const tl = gsap.timeline({
    repeat: 0,
    defaults: { duration: 0.2, ease: 'back.out(1.7)' }
  });

  // Target each splat and animate them in sequence
  tl.to('.splat--one', { opacity: 1, scale: 1 })
    .to('.splat--two', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--three', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--four', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--five', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--six', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--seven', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--eight', { opacity: 1, scale: 1 }, '+=0.2')
    .to('.splat--nine', { opacity: 1, scale: 1 }, '+=0.2')
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
      start: 'top 80%', // Start when the top of the element hits the center
      toggleActions: 'play none none none' // Play once when entering the viewport
    }
  });
});

// Create a new timeline for section seven animations
const sectionSevenTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: '.section--seven', // Element that triggers the animation
    start: 'top center', // When the top of the trigger hits the center of the viewport
    once: true // Animation will only happen once
  }
});

// Add animations to the section seven timeline
sectionSevenTimeline
  .from('.seven--one', {
    y: -50, // Drop effect
    opacity: 0,
    duration: 1
  })
  .from(
    '.seven--two path',
    {
      opacity: 0,
      rotate: 4, // Set rotation to 0
      duration: 1
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.seven--three',
    {
      opacity: 0,
      duration: 1
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.seven--four',
    {
      opacity: 0,
      duration: 1
    },
    '-=0.5'
  ); // Start this animation 0.5 seconds before the previous one completes

// Create a new timeline for section seven animations
const sectionEightTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: '.section--eight', // Element that triggers the animation
    start: 'top center', // When the top of the trigger hits the center of the viewport
    once: true // Animation will only happen once
  }
});

// Add animations to the section seven timeline
sectionEightTimeline
  .from('.eight-fade', {
    opacity: 0,
    duration: 1
  })
  .from(
    '.grow-right-1',
    {
      opacity: 0,
      width: 0,
      duration: 1
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.fm-right-1',
    {
      opacity: 0,
      x: 16
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.grow-right-2',
    {
      opacity: 0,
      width: 0,
      duration: 1
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.fm-right-2',
    {
      opacity: 0,
      x: 16
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.grow-right-3',
    {
      opacity: 0,
      width: 0,
      duration: 1
    },
    '-=0.5'
  ) // Start this animation 0.5 seconds before the previous one completes
  .from(
    '.fm-right-3',
    {
      opacity: 0,
      x: 16
    },
    '-=0.5'
  ); // Start this animation 0.5 seconds before the previous one completes
