// public/js/header-dropdown.js (محدّث)
// Fixed + safe dropdown positioning: moves dropdown to <body> when fixed to avoid clipping.

document.addEventListener('DOMContentLoaded', function () {
    const userBtn = document.getElementById('userBtn');
    const dropdown = document.getElementById('userDropdown');
    const avatarInput = document.getElementById('avatarInput');
    const avatarForm = document.getElementById('avatarForm');
    const langButtons = document.querySelectorAll('.lang-btn');
    const toggleBtn = document.querySelector('.toggle');
    const navMenu = document.querySelector('.nav-menu');

    let origParent = null;
    let origNext = null;

    function moveDropdownToBody() {
        if (!dropdown) return;
        if (dropdown.parentElement !== document.body) {
            origParent = dropdown.parentElement;
            origNext = dropdown.nextSibling;
            document.body.appendChild(dropdown);
        }
    }

    function restoreDropdownParent() {
        if (!dropdown || !origParent) return;
        if (origNext) origParent.insertBefore(dropdown, origNext);
        else origParent.appendChild(dropdown);
        origParent = null;
        origNext = null;
    }

    function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }

    function positionDropdown() {
        if (!dropdown || !userBtn) return;
        dropdown.style.maxHeight = 'calc(100vh - 120px)';
        dropdown.style.overflowY = 'auto';
        dropdown.style.zIndex = '999999';

        const isMobile = window.innerWidth < 768;
        const isRtl = document.documentElement.getAttribute('dir') === 'rtl';

        if (isMobile || isRtl) {
            // move to body so it's not clipped by parent transforms/overflow
            moveDropdownToBody();
            dropdown.style.position = 'fixed';
            dropdown.style.minWidth = '160px';
            dropdown.style.maxWidth = 'calc(100vw - 32px)';

            const rect = userBtn.getBoundingClientRect();
            // compute top (slightly below avatar)
            let top = Math.round(rect.bottom + 8);
            // ensure not below viewport bottom
            const estHeight = dropdown.offsetHeight || 300;
            if (top + 40 > window.innerHeight) top = Math.max(8, window.innerHeight - estHeight - 20);
            dropdown.style.top = top + 'px';

            if (isRtl) {
                const right = Math.round(Math.max(8, window.innerWidth - rect.right));
                dropdown.style.right = right + 'px';
                dropdown.style.left = 'auto';
                dropdown.style.transformOrigin = 'top right';
            } else {
                const left = Math.round(Math.max(8, rect.left));
                dropdown.style.left = left + 'px';
                dropdown.style.right = 'auto';
                dropdown.style.transformOrigin = 'top left';
            }

            // safety: if dropdown still goes off-screen, nudge it inside
            const ddRect = dropdown.getBoundingClientRect();
            if (ddRect.right > window.innerWidth - 8) {
                // reduce left to fit
                const overflow = ddRect.right - (window.innerWidth - 8);
                const currentLeft = parseInt(dropdown.style.left || 0, 10);
                dropdown.style.left = Math.max(8, currentLeft - overflow) + 'px';
            }
            if (ddRect.left < 8) {
                dropdown.style.left = '8px';
                dropdown.style.right = 'auto';
            }
        } else {
            // restore to original positioning/parent to follow desktop layout
            restoreDropdownParent();
            dropdown.style.position = '';
            dropdown.style.top = '';
            dropdown.style.left = '';
            dropdown.style.right = '';
            dropdown.style.minWidth = '';
            dropdown.style.maxWidth = '';
            dropdown.style.overflowY = '';
            dropdown.style.transformOrigin = '';
        }
    }

    // language apply helper (keeps existing logic)
    function applyLang(lang) {
        document.documentElement.setAttribute('lang', lang);
        document.documentElement.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');
        // (update element texts omitted for brevity; keep your translations)
        langButtons.forEach(b => b.setAttribute('aria-pressed', b.dataset.lang === lang ? 'true' : 'false'));
        try { localStorage.setItem('site_lang', lang); } catch (e) {}
        positionDropdown();
    }

    // init language
    const saved = (function () { try { return localStorage.getItem('site_lang'); } catch (e) { return null; } })();
    const initLang = saved || (navigator.language && navigator.language.startsWith('ar') ? 'ar' : 'en');
    applyLang(initLang);

    function showDropdown() {
        if (!dropdown) return;
        dropdown.classList.add('show');
        dropdown.setAttribute('aria-hidden', 'false');
        positionDropdown();
        if (window.innerWidth < 768) document.documentElement.classList.add('no-scroll-when-dd');
    }
    function hideDropdown() {
        if (!dropdown) return;
        dropdown.classList.remove('show');
        dropdown.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('no-scroll-when-dd');
        // restore parent after a short delay (allow CSS transition)
        setTimeout(() => {
            restoreDropdownParent();
            // clear inline styles to avoid side effects
            dropdown.style.position = '';
            dropdown.style.top = '';
            dropdown.style.left = '';
            dropdown.style.right = '';
            dropdown.style.minWidth = '';
            dropdown.style.maxWidth = '';
            dropdown.style.overflowY = '';
            dropdown.style.zIndex = '';
        }, 220);
    }

    // events
    userBtn && userBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        if (!dropdown) return;
        if (dropdown.classList.contains('show')) hideDropdown();
        else showDropdown();
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.user-wrap')) hideDropdown();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') hideDropdown();
    });

    if (avatarInput && avatarForm) {
        avatarInput.addEventListener('change', function () {
            if (avatarInput.files && avatarInput.files.length > 0) {
                avatarForm.submit();
            }
        });
    }

    langButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            const lang = btn.dataset.lang;
            applyLang(lang);
            hideDropdown();
        });
    });

    if (toggleBtn && navMenu) {
        toggleBtn.addEventListener('click', function (e) {
            document.querySelector('header').classList.toggle('menu-open');
            navMenu.classList.toggle('open');
            positionDropdown();
        });
    }

    window.addEventListener('resize', positionDropdown);
    window.addEventListener('scroll', positionDropdown);
});
