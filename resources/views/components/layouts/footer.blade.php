 @php
     use App\Models\Setting;
     $setting = Setting::first();
 @endphp
 <footer class="footer-container">
     <div class="footer">
         <div class="footer-column">
             <a wire:navigate href="/" class="footer-logo">{{ $setting->copyright_holder }}</a>
             <div class="socials">
                 <ul>
                     <li class="social-link">

                         <a href="{{ $setting->linkedin }}" aria-label="LinkedIn" target="_blank">
                             <i class="fa-brands fa-linkedin-in"></i>
                         </a>
                     </li>
                     <li class="social-link">
                         <a href="{{ $setting->githup }}" aria-label="GitHub" target="_blank">
                             <i class="fa-brands fa-github"></i>
                         </a>
                     </li>
                     <li class="social-link">
                         <a href="{{ $setting->instgram }}" aria-label="Instagram" target="_blank">
                             <i class="fa-brands fa-instagram"></i>
                         </a>
                     </li>
                 </ul>
             </div>
             <span class="copyright"><i class="fa-regular fa-copyright"></i> {{ $setting->copyright_holder }}
                 {{ $setting->copyright_start }}-{{ $setting->copyright_end }}</span>
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
         </div>

         <div class="footer-column">
             <a href="{{ $setting->githup ?? '/' }}" class="footer-button">
                 <img src="{{ asset('css/website/img/git.svg') }}" alt="Code Icon">
                 GitHub
             </a>

             <a wire:navigate href="mailto:{{ $setting->email }}" class="footer-button">
                 <img src="{{ asset('css/website/img/email.svg') }}" alt="Email Icon">
                 Contact
             </a>
         </div>
     </div>

 </footer>
