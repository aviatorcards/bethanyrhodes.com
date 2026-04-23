// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('nav ul');

  if (hamburger) {
    hamburger.addEventListener('click', function() {
      nav.classList.toggle('active');
      this.classList.toggle('active');
    });

    // Close menu when clicking a link
    const navLinks = document.querySelectorAll('nav ul a');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        nav.classList.remove('active');
        hamburger.classList.remove('active');
      });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
      if (!nav.contains(e.target) && !hamburger.contains(e.target)) {
        nav.classList.remove('active');
        hamburger.classList.remove('active');
      }
    });
  }
  // Hero Card Flip Logic
  const heroCard = document.querySelector('.hero-card');
  if (heroCard) {
    const heroIframe = document.getElementById('hero-video-iframe');
    const closeBtn = document.querySelector('.flip-close-btn');

    const postMessageToPlayer = (command) => {
      if (heroIframe && heroIframe.contentWindow) {
        heroIframe.contentWindow.postMessage(JSON.stringify({
          'event': 'command',
          'func': command,
          'args': []
        }), '*');
      }
    };

    heroCard.addEventListener('click', function(e) {
      // If clicking the close button, stop here (handled below)
      if (e.target.closest('.flip-close-btn')) return;

      if (!this.classList.contains('flipped')) {
        this.classList.add('flipped');
        postMessageToPlayer('playVideo');
      }
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        heroCard.classList.remove('flipped');
        postMessageToPlayer('pauseVideo');
      });
    }
  }
});
