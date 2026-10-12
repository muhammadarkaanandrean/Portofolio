/* ============================================================
   PORTOFOLIO SCRIPT — Muhammad Arkaan Andrean
   Fitur: Hamburger, Scroll Effect, Progress Bar, Reveal,
          Particles, Custom Cursor, Back to Top, Form Submit,
          Mouse Tracking, Parallax, Active Nav
   ============================================================ */

// ============ HAMBURGER MENU ============
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    hamburger.classList.toggle('active');
});

// Close menu saat klik link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
    });
});

// Close menu saat klik di luar
document.addEventListener('click', (e) => {
    if (
        navMenu.classList.contains('active') &&
        !navMenu.contains(e.target) &&
        !hamburger.contains(e.target)
    ) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
    }
});

// ============ NAVBAR SCROLL EFFECT ============
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// ============ ACTIVE NAV LINK ON SCROLL ============
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        if (window.scrollY >= sectionTop) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// ============ ANIMATE PROGRESS BARS ============
const progressObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const progress = entry.target;
            progress.style.width = progress.dataset.width;
        }
    });
}, { threshold: 0.4 });

document.querySelectorAll('.progress').forEach(p => progressObserver.observe(p));

// ============ SCROLL REVEAL ============
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, { threshold: 0.15, rootMargin: '0px 0px -50px 0px' });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ============ SKILL CARD MOUSE TRACKING ============
document.querySelectorAll('.skill-card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        card.style.setProperty('--x', `${x}%`);
        card.style.setProperty('--y', `${y}%`);
    });
});

// ============ FORM SUBMIT ============
const contactForm = document.getElementById('contactForm');

if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const btn = e.target.querySelector('button');
        const originalHTML = btn.innerHTML;

        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        btn.disabled = true;

        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-check"></i> Terkirim!';

            setTimeout(() => {
                alert('Terima kasih! Pesan kamu sudah terkirim. 🎉');
                e.target.reset();
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            }, 800);
        }, 1500);
    });
}

// ============ SMOOTH SCROLL ============
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;

        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// ============ BACK TO TOP ============
const backToTop = document.createElement('button');
backToTop.className = 'back-to-top';
backToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
backToTop.setAttribute('aria-label', 'Kembali ke atas');
document.body.appendChild(backToTop);

window.addEventListener('scroll', () => {
    if (window.scrollY > 500) {
        backToTop.classList.add('visible');
    } else {
        backToTop.classList.remove('visible');
    }
});

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// ============ FLOATING PARTICLES ============
(function createParticles() {
    const particlesContainer = document.createElement('div');
    particlesContainer.className = 'particles';
    document.body.appendChild(particlesContainer);

    const particleCount = window.innerWidth < 768 ? 15 : 30;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';

        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDuration = (Math.random() * 15 + 10) + 's';
        particle.style.animationDelay = Math.random() * 10 + 's';
        particle.style.opacity = Math.random() * 0.5 + 0.2;

        const size = Math.random() * 3 + 2;
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';

        particlesContainer.appendChild(particle);
    }
})();

// ============ CUSTOM CURSOR ============
if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    const cursorDot = document.createElement('div');
    cursorDot.className = 'cursor-dot';

    const cursorOutline = document.createElement('div');
    cursorOutline.className = 'cursor-outline';

    document.body.appendChild(cursorDot);
    document.body.appendChild(cursorOutline);

    let mouseX = 0, mouseY = 0;
    let outlineX = 0, outlineY = 0;

    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursorDot.style.left = mouseX + 'px';
        cursorDot.style.top = mouseY + 'px';
    });

    // Smooth follow untuk outline
    function animateOutline() {
        outlineX += (mouseX - outlineX) * 0.15;
        outlineY += (mouseY - outlineY) * 0.15;
        cursorOutline.style.left = outlineX + 'px';
        cursorOutline.style.top = outlineY + 'px';
        requestAnimationFrame(animateOutline);
    }
    animateOutline();

    // Hover effect pada elemen interaktif
    const hoverElements = document.querySelectorAll(
        'a, button, .skill-card, .project-card, .stat, .contact-item, .project-tags span, input, textarea'
    );

    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => cursorOutline.classList.add('hovering'));
        el.addEventListener('mouseleave', () => cursorOutline.classList.remove('hovering'));
    });
}

// ============ PARALLAX EFFECT ON HERO ============
window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const heroImage = document.querySelector('.hero-image img');
    const heroBlob = document.querySelector('.blob');

    if (heroImage && scrolled < window.innerHeight) {
        heroImage.style.transform = `translateY(${scrolled * 0.1}px)`;
        if (heroBlob) {
            heroBlob.style.transform = `translateY(${scrolled * 0.15}px)`;
        }
    }
});

// ============ HERO IMAGE TILT ON MOUSE MOVE (desktop) ============
if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    const heroImage = document.querySelector('.hero-image img');

    if (heroImage) {
        window.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth - 0.5) * 15;
            const y = (e.clientY / window.innerHeight - 0.5) * 15;

            const scrollY = window.scrollY;
            heroImage.style.transform =
                `perspective(1000px) rotateY(${x}deg) rotateX(${-y}deg) translateY(${scrollY * 0.1}px)`;
        });
    }
}

// ============ CONSOLE SIGNATURE ============
console.log(
    '%c👋 Halo! Terima kasih sudah membuka DevTools.',
    'color: #60a5fa; font-size: 16px; font-weight: bold;'
);
console.log(
    '%cPortofolio ini dibuat oleh Muhammad Arkaan Andrean 🚀',
    'color: #2563eb; font-size: 12px;'
);
