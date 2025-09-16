<div class="main-container project-section" wire:poll>
    <section class="projects">
        <div class="page-title">
            <img src="{{ asset('css/website/img/coding.svg') }}" alt="Code Icon">
            <h2>{{ $settings->copyright_holder }}.<span class="pink">projects</span></h2>
        </div>
        <p class="section-description">
            See <a wire:navigate class="hyperlink" href="{{ $settings->githup }}">GitHub</a>
            profile for more details.
        </p>
        <div class="project-cards-container">
            @foreach ($project as $projects)
                <div class="card">
                    <img src="{{ url('storage', $projects->image) }}" alt="Project Preview Screenshot"
                        class="card-preview-img">
                    <div class="card-info">
                        <div class="title-and-links">
                            <span class="project-title">
                                {{ $projects->name }}
                            </span>
                            <div class="project-links">
                                @if ($projects->links)
                                    <a href="https://nunflix-6e5b3.web.app/">
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
                            @foreach (explode(',', $projects->project_skills) as $skills)
                                <span>{{ $skills }}</span>
                            @endforeach
                        </div>
                        <p class="project-description">
                            {{ $projects->description }}
                        </p>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
</div>
