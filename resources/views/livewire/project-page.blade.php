<div wire:poll>
    <section class="projects">
        <div class="page-title">
            <img src="{{ asset('css/website/img/coding.svg') }}" alt="Code Icon">
            <h2>Dev.Sadi.<span class="pink">projects</span></h2>
        </div>
        <p class="section-description">
            See <a wire:navigate class="hyperlink" href="https://github.com/anniedotexe">GitHub</a>
            profile for more details.
        </p>
        <div class="project-cards-container">
            <div class="card">
                <img src="./img/project-preview/nunflix-preview.png" alt="Project Preview Screenshot"
                    class="card-preview-img">
                <div class="card-info">
                    <div class="title-and-links">
                        <span class="project-title">
                            Nunflix
                        </span>
                        <div class="project-links">
                            <!-- <a href="https://nunflix-6e5b3.web.app/">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a> -->
                            <a href="https://github.com/anniedotexe/nunflix">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </div>
                    </div>
                    <div class="project-skills">
                        <span>React JS</span>
                        <span>Firebase Hosting</span>
                    </div>
                    <p class="project-description">
                        This is a frontend clone of Netflix's website made just for their
                        original series <a class="hyperlink" href="https://www.imdb.com/title/tt9059350/">Warrior
                            Nun</a>. It
                        is built with React and uses the TMDB API to pull in data and
                        images. All images are shuffled upon page refresh.
                    </p>
                </div>
            </div>


        </div>
    </section>
</div>
