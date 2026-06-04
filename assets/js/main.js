/**
 * Udoy Portfolio Theme - Main JavaScript
 * Version: 1.0.0
 */

(function () {
    'use strict';

    // DOM Elements
    const navbar = document.getElementById('navbar');
    const menuToggle = document.getElementById('menu-toggle');
    const navMenuWrapper = document.querySelector('.nav-menu-wrapper');
    const btnTalk = document.getElementById('btn-talk');
    const navLinks = document.querySelectorAll('.nav-menu a');
    const body = document.body;

    // Initialize
    function init() {
        if (menuToggle && navMenuWrapper) {
            setupMobileMenu();
        }

        if (btnTalk) {
            setupCtaButton();
        }

        setupNavigation();
        setupScrollAnimation();
        setupFormHandling();
        setupTypewriter();
    }

    /**
     * Setup Typewriter Effect
     */
    function setupTypewriter() {
        const elements = document.querySelectorAll('.typewriter-text');
        
        elements.forEach(el => {
            const wordsData = el.getAttribute('data-words');
            if (!wordsData) return;
            
            try {
                const words = JSON.parse(wordsData);
                if (!Array.isArray(words) || words.length === 0) return;
                
                let wordIdx = 0;
                let charIdx = words[0].length;
                let isDeleting = false;
                
                // Set initial text
                el.textContent = words[0];
                
                const type = () => {
                    const currentWord = words[wordIdx];
                    
                    if (isDeleting) {
                        el.textContent = currentWord.substring(0, charIdx - 1);
                        charIdx--;
                    } else {
                        el.textContent = currentWord.substring(0, charIdx + 1);
                        charIdx++;
                    }
                    
                    let typeSpeed = isDeleting ? 40 : 80;
                    
                    if (!isDeleting && charIdx === currentWord.length) {
                        typeSpeed = 1500; // Hold full word
                        isDeleting = true;
                    } else if (isDeleting && charIdx === 0) {
                        isDeleting = false;
                        wordIdx = (wordIdx + 1) % words.length;
                        typeSpeed = 300; // Pause before next word
                    }
                    
                    setTimeout(type, typeSpeed);
                };
                
                setTimeout(type, 1500);
                
            } catch (e) {
                console.error('Error parsing typewriter words:', e);
            }
        });
    }
    function setupMobileMenu() {
        menuToggle.addEventListener('click', toggleMobileMenu);

        // Close menu when clicking on nav links
        navLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (event) {
            if (!navbar.contains(event.target)) {
                closeMobileMenu();
            }
        });
    }

    function toggleMobileMenu() {
        const isOpen = navbar.classList.contains('menu-open');
        if (isOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    function openMobileMenu() {
        navbar.classList.add('menu-open');
        navMenuWrapper.classList.add('mobile-open');
        body.style.overflow = 'hidden';
        menuToggle.setAttribute('aria-expanded', 'true');
    }

    function closeMobileMenu() {
        navbar.classList.remove('menu-open');
        navMenuWrapper.classList.remove('mobile-open');
        body.style.overflow = '';
        menuToggle.setAttribute('aria-expanded', 'false');
    }

    /**
     * Setup CTA Button
     */
    function setupCtaButton() {
        btnTalk.addEventListener('click', scrollToContact);
    }

    function scrollToContact() {
        const contactSection = document.getElementById('contact');
        if (contactSection) {
            contactSection.scrollIntoView({ behavior: 'smooth' });
            closeMobileMenu();
        }
    }

    /**
     * Setup Navigation
     */
    function setupNavigation() {
        // Add smooth scroll to anchor links
        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                try {
                    const url = new URL(this.href, window.location.href);
                    const path1 = url.pathname.replace(/\/$/, '');
                    const path2 = window.location.pathname.replace(/\/$/, '');
                    
                    if (path1 === path2 && url.hash) {
                        const target = document.querySelector(url.hash);
                        if (target) {
                            e.preventDefault();
                            target.scrollIntoView({ behavior: 'smooth' });
                            closeMobileMenu();
                        }
                    }
                } catch (err) {
                    // Fallback in case URL parsing fails
                    const href = this.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth' });
                            closeMobileMenu();
                        }
                    }
                }
            });
        });

        // Update active nav link on scroll
        updateActiveNavLink();
        window.addEventListener('scroll', updateActiveNavLink, { passive: true });
    }

    function updateActiveNavLink() {
        const sections = ['hero', 'about', 'skills', 'projects', 'contact'];

        sections.forEach(sectionId => {
            const section = document.getElementById(sectionId);
            if (section) {
                const rect = section.getBoundingClientRect();
                const link = Array.from(navLinks).find(navLink => {
                    try {
                        return new URL(navLink.href, window.location.href).hash === `#${sectionId}`;
                    } catch (err) {
                        return navLink.getAttribute('href') === `#${sectionId}`;
                    }
                });

                if (link) {
                    if (rect.top <= 100 && rect.bottom >= 100) {
                        navLinks.forEach(l => l.classList.remove('active'));
                        link.classList.add('active');
                    }
                }
            }
        });
    }

    /**
     * Setup Scroll Animation - Navbar shadow on scroll
     */
    function setupScrollAnimation() {
        if (!navbar) {
            return;
        }

        const updateNavbarState = function () {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };

        updateNavbarState();
        window.addEventListener('scroll', updateNavbarState, { passive: true });
    }

    /**
     * Setup Form Handling
     */
    function setupFormHandling() {
        const form = document.getElementById('contact-form-fallback');
        if (form) {
            form.addEventListener('submit', handleFormSubmit);
        }
    }

    function handleFormSubmit(e) {
        e.preventDefault();

        const form = e.target;
        const name = form.querySelector('input[name="name"]').value.trim();
        const email = form.querySelector('input[name="email"]').value.trim();
        const message = form.querySelector('textarea[name="message"]').value.trim();
        const statusDiv = form.querySelector('.form-status');

        // Validation
        if (!name || !email || !message) {
            showFormStatus(statusDiv, 'Please fill in all fields', 'error');
            return;
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showFormStatus(statusDiv, 'Please enter a valid email', 'error');
            return;
        }

        // Submit form (AJAX or standard)
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        // Simulate sending (in production, this would be AJAX)
        setTimeout(() => {
            showFormStatus(statusDiv, 'Message sent successfully! I\'ll be in touch soon.', 'success');
            form.reset();
            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Message';
        }, 1000);
    }

    function showFormStatus(statusDiv, message, type) {
        statusDiv.textContent = message;
        statusDiv.className = `form-status ${type}`;

        if (type === 'success') {
            setTimeout(() => {
                statusDiv.className = 'form-status';
            }, 5000);
        }
    }

    /**
     * Intersection Observer for scroll animations
     */
    function setupIntersectionObserver() {
        const elements = document.querySelectorAll('.animate-on-scroll, .project-card, .feature-card, .skill-category');

        if (!('IntersectionObserver' in window)) {
            elements.forEach(el => el.classList.add('in-view', 'animated'));
            return;
        }

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view', 'animated');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with scroll animation
        elements.forEach(el => observer.observe(el));
    }

    /**
     * Add animation styles on scroll
     */
    function addScrollAnimationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .project-card,
            .feature-card,
            .skill-category,
            .animate-on-scroll {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }

            .project-card.in-view,
            .feature-card.in-view,
            .skill-category.in-view,
            .animate-on-scroll.animated {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Handle responsive behavior
     */
    function setupResponsive() {
        // Close menu on resize if window is large enough
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });
    }

    /**
     * Setup keyboard shortcuts
     */
    function setupKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            // Close menu on Escape
            if (e.key === 'Escape') {
                closeMobileMenu();
            }

            // Jump to sections (Ctrl/Cmd + Number)
            if ((e.ctrlKey || e.metaKey) && e.key >= '1' && e.key <= '5') {
                const sections = ['hero', 'about', 'skills', 'projects', 'contact'];
                const index = parseInt(e.key) - 1;
                if (sections[index]) {
                    const section = document.getElementById(sections[index]);
                    if (section) {
                        section.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            }
        });
    }

    /**
     * Lazy load images
     */
    function setupLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Debounce function for performance
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Performance monitoring
     */
    function logPerformance() {
        if (window.performance && window.performance.timing) {
            window.addEventListener('load', () => {
                const perfData = window.performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('Page load time: ' + pageLoadTime + 'ms');
            });
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            init();
            addScrollAnimationStyles();
            setupIntersectionObserver();
            setupResponsive();
            setupKeyboardShortcuts();
            setupLazyLoading();
            logPerformance();
        });
    } else {
        init();
        addScrollAnimationStyles();
        setupIntersectionObserver();
        setupResponsive();
        setupKeyboardShortcuts();
        setupLazyLoading();
        logPerformance();
    }

    // Export for potential external use
    window.udoyPortfolio = {
        toggleMobileMenu: toggleMobileMenu,
        closeMobileMenu: closeMobileMenu,
        scrollToContact: scrollToContact,
        debounce: debounce
    };
})();
