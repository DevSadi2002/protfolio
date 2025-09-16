<div class="main-container" wire:poll>
    <main class="main-container about-section">
        <section id="profile">
            <div class="page-title">
                <img src="{{ asset('css/website/img/smile.svg') }}" alt="Smile Icon">
                <h2>{{ $settings->copyright_holder }}<span class="pink">.profile</span></h2>
            </div>
            <p class="section-description">
                Exploring pixels and code, one quality click at a time.
            </p>
            <div class="profile-container-about">
                <div class="me-icon-container">
                    <dotlottie-wc src="https://lottie.host/53353952-22b8-4e09-8088-b931a00f5037/q4VIMef01K.lottie"
                        style="width: 250px;height: 250px" speed="1" autoplay loop></dotlottie-wc>
                </div>
                <div class="terminal-container">
                    <div class="terminal-header">
                        <div id="terminal-title">{{ $settings->copyright_holder }}.exe</div>
                        <div class="right-side-buttons">
                            <i class="fa-solid fa-window-minimize"></i>
                            <i class="fa-solid fa-window-restore"></i>
                            <i class="fa-solid fa-window-close"></i>
                        </div>
                    </div>
                    <div class="terminal-window">
                        @foreach ($profile->statements as $item)
                            <div class="statement">
                                <p class="input">
                                    {{ $settings->copyright_holder }}.<span class="green">{{ $item->key }}</span>
                                </p>
                                <p class="return">
                                    {{ $item->value }}
                                </p>
                            </div>
                        @endforeach

                        <div class="statement">
                            <p class="input bottom"><span></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="education-experience">
            <div id="education" class="education-experience-container">
                <h3>Education</h3>
                <div class="education-experience-card">
                    <div class="card-info-about">
                        <h4 class="green">{{ $profile->degree }}</h4>
                        <p>{{ $profile->institution }}</p>
                    </div>
                    <div class="card-description">
                        <h5>Achievements</h5>
                        @foreach (explode(',', $profile->achievements ?? '') as $item)
                            <p>{{ $item }}</p>
                        @endforeach


                    </div>
                </div>
            </div>
            <div id="experience" class="education-experience-container">
                <h3>Experience</h3>
                @foreach ($profile->experience as $experience)
                    <div class="education-experience-card">
                        <div class="card-info-about">
                            <h4 class="green">{{ $experience->title }}</h4>
                            <p class="date">{{ $experience->start_date }} - Present</p>
                            <p>
                                <a href="/">
                                    {{ $experience->company }}
                                </a>
                                <br>
                                {{ $experience->location }}
                            </p>
                        </div>
                        <div class="card-description">
                            <h5>{{ $experience->description_title }}</h5>
                            <p>
                                {{ $experience->description }}
                            </p>

                        </div>
                    </div>
                @endforeach

        </section>
        <section id="tech-stack">
            <h3>Tech Stack</h3>
            <div class="tech-stack-container">
                @foreach ($profile->skills as $skill)
                    <div class="skill">
                        <img src="{{ url('storage', $skill->icon) }}"
                            alt="{{ $skill->name }}"><span>{{ $skill->name }}</span>
                    </div>
                @endforeach

            </div>
        </section>
        <section id="all-social-media">
            <h3>Contact</h3>
            <p class="section-description">
                Here are all the places you can find me on the
                internet.
            </p>
            <div class="social-media-list">
                <a href="{{ $settings->linkedin }}" class="social-media-item">
                    <i class="fa-brands fa-linkedin-in"></i>
                    LinkedIn
                </a>
                <a href="{{ $settings->githup }}" class="social-media-item">
                    <i class="fa-brands fa-github"></i>
                    GitHub
                </a>
                {{-- <a href="https://codepen.io/anniedotexe" class="social-media-item">
                    <i class="fa-brands fa-codepen"></i>
                    CodePen
                </a> --}}
                <a href="{{ $settings->instgram }}" class="social-media-item">
                    <i class="fa-brands fa-instagram"></i>
                    Instagram
                </a>
                {{-- <a href="https://www.flickr.com/people/anniewuphotos/" class="social-media-item">
                    <i class="fa-brands fa-flickr"></i>
                    Flickr
                </a> --}}
                <a href="mailto:{{ $settings->email }}" class="social-media-item">
                    <i class="fa-solid fa-envelope"></i>
                    Email
                </a>
            </div>
        </section>
    </main>
</div>
