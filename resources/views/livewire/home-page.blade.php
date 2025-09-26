<div>
    <main class="main-container home-section">
        <section id="home">
            <div class="landing-page-details">
                @if (app()->getLocale() === 'ar')
                    <h1 class="small-title"> مرحباً في معرض اعمالي المتواضع...</h1>
                    <h2 class="big-title">أنا <span class="my-name pink">{{ $setting->copyright_holder }}</span></h2>
                    <h3 class="medium-title"><em>{{ $setting->job }} @
                            @if ($setting->compane_job)
                                <a class="pink" href="{{ $setting->link_job }}">
                                    {{ $setting->compane_job }}
                                </a>
                        </em>
                    @else
                        <a wire:navigate class="pink" href="/">Freelance</a></em>
                @endif
                </h3>
            @elseif (app()->getLocale() === 'en')
                <h1 class="small-title">Hi,</h1>
                <h2 class="big-title">I'm <span class="my-name pink">{{ $setting->copyright_holder }}</span></h2>
                <h3 class="medium-title"><em>{{ $setting->job }} @
                        @if ($setting->compane_job)
                            <a class="pink" href="{{ $setting->link_job }}">
                                {{ $setting->compane_job }}
                            </a>
                    </em>
                @else
                    <a wire:navigate class="pink" href="/">Freelance</a></em>
                </h3>
                @endif
                @endif

                </h3>
                @if ($setting->description !== null)
                    <div class="short-bio">
                        <p>{{ $setting->getTranslation('description', app()->getLocale()) }}</p>
                    </div>
                @endif


            </div>
            {{-- // avatar Icon --}}
            <div class="art-me">
                {{-- <dotlottie-wc src="https://lottie.host/4b36128f-5d8e-4dce-9982-c8278f3ca59f/GkcdJrk090.lottie"
                style="width:400px; height:400px" speed="1" autoplay loop>
            </dotlottie-wc> --}}
                {{-- <dotlottie-wc src="https://lottie.host/98f74771-7fad-4c77-8e1a-f3d5de2d858f/nqdbLV8DQE.lottie"
                style="width: 450px;height: 450px" speed="1" autoplay loop></dotlottie-wc> --}}
                <dotlottie-wc src="https://lottie.host/53353952-22b8-4e09-8088-b931a00f5037/q4VIMef01K.lottie"
                    style="width: 400px;height: 400px" speed="1" autoplay loop></dotlottie-wc>
            </div>

            {{-- @dump($setting->instgram) --}}
            <div class="landing-page-socials">
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
                    <li class="social-link">
                        <a href="{{ $setting->whatsapp }}" aria-label="WhatsApp" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                    <li class="social-link">
                        <a href="{{ $setting->whatsapp }}" aria-label="Telegram" target="_blank">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </section>



        <section class="projects" id="select-projects">
            @if (app()->getLocale() === 'ar')
                <h2>معرض المشاريع</h2>
                <p class="section-description">
                    هنا بعض المشاريع الشخصية التي عملت عليها.
                    يمكنك العثور على المزيد على
                    <a class="hyperlink" href="{{ $setting->githup }}">GitHub</a>.
                </p>
            @else
                <h2>Select Projects</h2>
                <p class="section-description">
                    Here are some personal projects I have worked on.
                    <br>
                    You can find more on
                    <a class="hyperlink" href="{{ $setting->githup }}">GitHub</a>.
                </p>
            @endif
            <div class="project-cards-container">

                @foreach ($project as $projects)
                    <div class="card" tabindex="0" role="button" aria-expanded="false">
                        <img src="{{ url('storage', $projects->image) }}" alt="Project Preview Screenshot"
                            class="card-preview-img">
                        <div class="card-info">
                            <div class="title-and-links">
                                <span class="project-title">
                                    {{ $projects->name }}
                                </span>
                                <div class="project-links">
                                    @if ($projects->links)
                                        <a href="{{ $projects->links }}">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                    @if ($projects->githup)
                                        <a href="{{ $projects->githup }}">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="project-skills">
                                {{--
                                    @foreach ($projects->project_skills as $skill)
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                --}}
                                @foreach ($projects->project_skills as $skill)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- short/truncated description shown by default -->
                            <p class="project-description truncated">
                                {{ Str::limit(value: $projects->description, limit: 200) }}
                            </p>

                            <!-- full description hidden by default, revealed on hover/click -->
                            <p class="project-description full">
                                {{ $projects->description }}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>

            <!-- include the JS (adjust path if using mix/asset pipeline) -->
            <script src="{{ asset('css/website/js/project-card.js') }}"></script>
            <div class="cta-container">
                <a wire:navigate href="/projects" class="cta">
                    <img src="{{ asset('css/website/img/coding.svg') }}" alt="Explore More">
                    <span>Explore More</span>
                </a>
            </div>
    </main>

</div>
