<div wire:poll class="footer">
    <div class="footer-column">
        <a wire:navigate href="/" class="footer-logo">@Dev.sadi</a>
        <div class="socials">
            <ul>
                <li class="social-link">
                    <a wire:navigate href="https://www.linkedin.com/in/anniewu2303/" aria-label="LinkedIn" target="_blank">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </li>
                <li class="social-link">
                    <a wire:navigate href="https://github.com/anniedotexe" aria-label="GitHub" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </li>
                <li class="social-link">
                    <a wire:navigate href="https://instagram.com/anniedotexe" aria-label="Instagram" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <span class="copyright"><i class="fa-regular fa-copyright"></i> Annie Wu
            2021-2025</span>
    </div>
    <div class="footer-column">
        <a wire:navigate href="/about" class="footer-button">
            <img src="{{ asset('css/website/img/smile.svg') }}" alt="Smile Icon">
            About
        </a>
        <a wire:navigate href="/projects" class="footer-button">
            <img src="{{ asset('css/website/img/coding.svg') }}" alt="Code Icon">
            Projects
        </a>
        <a wire:navigate href="mailto:anniewu2303@gmail.com" class="footer-button">
            <img src="{{ asset('css/website/img/email.svg') }}" alt="Email Icon">
            Contact
        </a>
    </div>

</div>
