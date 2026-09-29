// Hamburger Menu
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
});

// Close menu saat klik link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
    });
});

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.padding = '0.5rem 0';
        navbar.style.boxShadow = '0 5px 20px rgba(0,0,0,0.3)';
    } else {
        navbar.style.padding = '1rem 0';
        navbar.style.boxShadow = 'none';
    }
});

// Animate progress bars saat masuk viewport
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const progress = entry.target;
            progress.style.width = progress.dataset.width;
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.progress').forEach(p => observer.observe(p));

// Form submit
document.getElementById('contactForm').addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Terima kasih! Pesan kamu sudah terkirim. 🎉');
    e.target.reset();
});

// Smooth scroll untuk browser lama
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});