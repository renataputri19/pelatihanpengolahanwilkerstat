// Tutorial Detail Page JavaScript

// Toggle section visibility
function toggleSection(sectionId) {
    const content = document.getElementById(`content-${sectionId}`);
    const icon = document.getElementById(`icon-${sectionId}`);
    
    content.classList.toggle('active');
    icon.classList.toggle('rotated');
    
    // Update progress
    updateProgress();
}

// Update progress bar based on visible sections
function updateProgress() {
    const totalSections = document.querySelectorAll('.section-card').length;
    const activeSections = document.querySelectorAll('.section-content.active').length;
    const progress = (activeSections / totalSections) * 100;
    
    document.getElementById('progressBar').style.width = progress + '%';
}

// Initialize tutorial functionality
document.addEventListener('DOMContentLoaded', function() {
    // Auto-open first section
    const firstSection = document.querySelector('.section-card');
    if (firstSection) {
        const firstSectionId = firstSection.querySelector('.section-header').getAttribute('onclick').match(/'([^']+)'/)[1];
        toggleSection(firstSectionId);
    }
    
    // Add scroll event for progress tracking
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset;
        const docHeight = document.body.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        document.getElementById('progressBar').style.width = Math.min(scrollPercent, 100) + '%';
    });
    
    // Add intersection observer for section animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1
    });
    
    document.querySelectorAll('.section-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Close all sections
        document.querySelectorAll('.section-content.active').forEach(content => {
            const sectionId = content.id.replace('content-', '');
            toggleSection(sectionId);
        });
    }
});

// Smooth scrolling utility function
function smoothScrollTo(element) {
    element.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}

// Section navigation helpers
function openAllSections() {
    document.querySelectorAll('.section-card').forEach(card => {
        const sectionHeader = card.querySelector('.section-header');
        const sectionId = sectionHeader.getAttribute('onclick').match(/'([^']+)'/)[1];
        const content = document.getElementById(`content-${sectionId}`);
        const icon = document.getElementById(`icon-${sectionId}`);
        
        if (!content.classList.contains('active')) {
            content.classList.add('active');
            icon.classList.add('rotated');
        }
    });
    updateProgress();
}

function closeAllSections() {
    document.querySelectorAll('.section-content.active').forEach(content => {
        const sectionId = content.id.replace('content-', '');
        const icon = document.getElementById(`icon-${sectionId}`);
        
        content.classList.remove('active');
        icon.classList.remove('rotated');
    });
    updateProgress();
}

// Progress tracking utilities
function getCompletionPercentage() {
    const totalSections = document.querySelectorAll('.section-card').length;
    const activeSections = document.querySelectorAll('.section-content.active').length;
    return Math.round((activeSections / totalSections) * 100);
}

// Export functions for global access
window.tutorialDetail = {
    toggleSection,
    updateProgress,
    openAllSections,
    closeAllSections,
    getCompletionPercentage,
    smoothScrollTo
};