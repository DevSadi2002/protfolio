// public/js/project-card.js
// Gentle expansion: small scale + reveal full description.
// Click toggles expansion, keyboard accessible, ignores clicks on links.

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    function closeAllExcept(exceptCard) {
        cards.forEach(c => {
            if (c !== exceptCard && c.classList.contains('expanded')) {
                c.classList.remove('expanded');
                c.setAttribute('aria-expanded', 'false');
            }
        });
    }

    cards.forEach(card => {
        // prevent toggling when clicking on links or interactive elements
        card.addEventListener('click', function (e) {
            if (e.target.closest('a') || e.target.closest('button')) return;

            const isExpanded = card.classList.contains('expanded');
            if (isExpanded) {
                card.classList.remove('expanded');
                card.setAttribute('aria-expanded', 'false');
            } else {
                closeAllExcept(card);
                card.classList.add('expanded');
                card.setAttribute('aria-expanded', 'true');
                card.focus();
                // keep page from jumping: try to ensure expanded card is visible
                const rect = card.getBoundingClientRect();
                // if bottom of card is outside viewport, scroll a bit
                if (rect.bottom > window.innerHeight - 20) {
                    window.scrollBy({
                        top: rect.bottom - (window.innerHeight - 20),
                        behavior: 'smooth'
                    });
                }
            }
        });

        // keyboard accessibility: Enter/Space to toggle, Escape to close
        card.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.click();
            } else if (e.key === 'Escape') {
                card.classList.remove('expanded');
                card.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // clicking outside closes expanded cards
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.card')) {
            cards.forEach(c => {
                if (c.classList.contains('expanded')) {
                    c.classList.remove('expanded');
                    c.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });

    // on resize close expansions to avoid layout glitches
    window.addEventListener('resize', function () {
        cards.forEach(c => {
            if (c.classList.contains('expanded')) {
                c.classList.remove('expanded');
                c.setAttribute('aria-expanded', 'false');
            }
        });
    });
});
