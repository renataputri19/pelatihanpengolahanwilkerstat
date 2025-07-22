/**
 * Modern Training Materials JavaScript Framework
 * Enterprise-grade interactive components for training content
 */

class TrainingModern {
    constructor() {
        this.init();
    }

    init() {
        this.initAccordion();
        this.initSmoothScrolling();
        this.initTableOfContents();
        this.initProgressTracking();
        this.initReadingProgress();
        this.initAnimations();
        this.initResponsiveFeatures();
    }

    /**
     * Accordion Functionality
     */
    initAccordion() {
        const accordionHeaders = document.querySelectorAll('.modern-accordion-header');
        
        accordionHeaders.forEach(header => {
            header.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggleAccordion(header);
            });
        });

        // Auto-expand first accordion item
        if (accordionHeaders.length > 0) {
            this.expandAccordion(accordionHeaders[0]);
        }
    }

    toggleAccordion(header) {
        const content = header.nextElementSibling;
        const isActive = header.classList.contains('active');

        if (isActive) {
            this.collapseAccordion(header);
        } else {
            // Close other accordions in the same group
            const accordion = header.closest('.modern-accordion');
            const otherHeaders = accordion.querySelectorAll('.modern-accordion-header.active');
            otherHeaders.forEach(otherHeader => {
                if (otherHeader !== header) {
                    this.collapseAccordion(otherHeader);
                }
            });

            this.expandAccordion(header);
        }
    }

    expandAccordion(header) {
        const content = header.nextElementSibling;
        header.classList.add('active');
        content.classList.add('active');
        
        // Smooth scroll to accordion if it's not in view
        setTimeout(() => {
            const rect = header.getBoundingClientRect();
            if (rect.top < 100) {
                header.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start',
                    inline: 'nearest'
                });
            }
        }, 300);
    }

    collapseAccordion(header) {
        const content = header.nextElementSibling;
        header.classList.remove('active');
        content.classList.remove('active');
    }

    /**
     * Smooth Scrolling for Internal Links
     */
    initSmoothScrolling() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const offset = 80; // Account for fixed headers
                    const targetPosition = targetElement.offsetTop - offset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Update URL without jumping
                    history.pushState(null, null, `#${targetId}`);
                }
            });
        });
    }

    /**
     * Table of Contents Active State Management
     */
    initTableOfContents() {
        const tocLinks = document.querySelectorAll('.modern-toc-link');
        const sections = document.querySelectorAll('.modern-accordion-item, .content-section');
        
        if (tocLinks.length === 0 || sections.length === 0) return;

        // Intersection Observer for active section detection
        const observerOptions = {
            root: null,
            rootMargin: '-20% 0px -70% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const sectionId = entry.target.id;
                    this.updateActiveTocItem(sectionId);
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            if (section.id) {
                observer.observe(section);
            }
        });
    }

    updateActiveTocItem(sectionId) {
        const tocLinks = document.querySelectorAll('.modern-toc-link');
        
        tocLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${sectionId}`) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Progress Tracking
     */
    initProgressTracking() {
        this.createProgressBar();
        this.updateProgressOnScroll();
    }

    createProgressBar() {
        const progressBar = document.createElement('div');
        progressBar.className = 'reading-progress-bar';
        progressBar.innerHTML = '<div class="reading-progress-fill"></div>';
        
        const styles = `
            .reading-progress-bar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 4px;
                background: rgba(0, 0, 0, 0.1);
                z-index: var(--z-fixed);
                backdrop-filter: blur(10px);
            }
            .reading-progress-fill {
                height: 100%;
                background: linear-gradient(90deg, var(--primary-500), var(--primary-600));
                width: 0%;
                transition: width 0.3s ease;
            }
        `;
        
        if (!document.querySelector('#progress-styles')) {
            const styleSheet = document.createElement('style');
            styleSheet.id = 'progress-styles';
            styleSheet.textContent = styles;
            document.head.appendChild(styleSheet);
        }
        
        document.body.appendChild(progressBar);
    }

    updateProgressOnScroll() {
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            const progressFill = document.querySelector('.reading-progress-fill');
            if (progressFill) {
                progressFill.style.width = `${Math.min(scrollPercent, 100)}%`;
            }
        });
    }

    /**
     * Reading Progress Indicators
     */
    initReadingProgress() {
        const sections = document.querySelectorAll('.modern-accordion-item, .content-section');
        
        sections.forEach((section, index) => {
            const progressIndicator = this.createProgressIndicator(index + 1, sections.length);
            const header = section.querySelector('.modern-accordion-header, .section-header');
            
            if (header) {
                header.appendChild(progressIndicator);
            }
        });
    }

    createProgressIndicator(current, total) {
        const indicator = document.createElement('div');
        indicator.className = 'section-progress-indicator';
        indicator.innerHTML = `
            <span class="progress-text">${current}/${total}</span>
            <div class="progress-dots">
                ${Array.from({length: total}, (_, i) => 
                    `<div class="progress-dot ${i < current ? 'completed' : ''}"></div>`
                ).join('')}
            </div>
        `;
        
        const styles = `
            .section-progress-indicator {
                display: flex;
                align-items: center;
                gap: var(--space-3);
                font-size: var(--text-xs);
                opacity: 0.8;
            }
            .progress-dots {
                display: flex;
                gap: var(--space-1);
            }
            .progress-dot {
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transition: all var(--transition-fast);
            }
            .progress-dot.completed {
                background: rgba(255, 255, 255, 0.9);
                transform: scale(1.2);
            }
        `;
        
        if (!document.querySelector('#section-progress-styles')) {
            const styleSheet = document.createElement('style');
            styleSheet.id = 'section-progress-styles';
            styleSheet.textContent = styles;
            document.head.appendChild(styleSheet);
        }
        
        return indicator;
    }

    /**
     * Animation on Scroll
     */
    initAnimations() {
        const animatedElements = document.querySelectorAll(
            '.modern-card, .modern-feature-card, .modern-list-item, .modern-progress-card'
        );
        
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    animationObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(element => {
            animationObserver.observe(element);
        });
    }

    /**
     * Responsive Features
     */
    initResponsiveFeatures() {
        this.initMobileMenu();
        this.initTouchGestures();
    }

    initMobileMenu() {
        // Mobile-friendly table of contents toggle
        const sidebar = document.querySelector('.modern-sidebar');
        if (!sidebar) return;

        const toggleButton = document.createElement('button');
        toggleButton.className = 'mobile-toc-toggle';
        toggleButton.innerHTML = '<i class="fas fa-list"></i> Daftar Isi';
        
        const styles = `
            .mobile-toc-toggle {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: var(--primary-600);
                color: white;
                border: none;
                border-radius: var(--radius-xl);
                padding: var(--space-3) var(--space-4);
                font-weight: 500;
                box-shadow: var(--shadow-lg);
                z-index: var(--z-fixed);
                cursor: pointer;
                transition: all var(--transition-fast);
            }
            .mobile-toc-toggle:hover {
                background: var(--primary-700);
                transform: translateY(-2px);
            }
            @media (max-width: 1024px) {
                .mobile-toc-toggle {
                    display: flex;
                    align-items: center;
                    gap: var(--space-2);
                }
            }
        `;
        
        if (!document.querySelector('#mobile-toc-styles')) {
            const styleSheet = document.createElement('style');
            styleSheet.id = 'mobile-toc-styles';
            styleSheet.textContent = styles;
            document.head.appendChild(styleSheet);
        }
        
        document.body.appendChild(toggleButton);
        
        toggleButton.addEventListener('click', () => {
            sidebar.scrollIntoView({ behavior: 'smooth' });
        });
    }

    initTouchGestures() {
        // Add touch-friendly interactions for mobile devices
        if ('ontouchstart' in window) {
            document.body.classList.add('touch-device');
            
            // Improve touch targets
            const touchStyles = `
                .touch-device .modern-accordion-header {
                    min-height: 60px;
                }
                .touch-device .modern-toc-link {
                    min-height: 44px;
                    padding: var(--space-3) var(--space-4);
                }
                .touch-device .modern-btn {
                    min-height: 44px;
                    padding: var(--space-3) var(--space-6);
                }
            `;
            
            const styleSheet = document.createElement('style');
            styleSheet.textContent = touchStyles;
            document.head.appendChild(styleSheet);
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new TrainingModern();
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TrainingModern;
}
