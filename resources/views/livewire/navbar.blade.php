<header wire:poll class="header">
    <a href="/" class="header-logo">@Dev.Sadi</a>

    <nav class="nav">
        <div class="toggle"><i class="fas fa-bars"></i></div>

        <ul class="nav-menu">
            <li class="nav-item"><a wire:navigate href="/about" data-i18n="nav.about">{{ __('page.nav.about') }}</a></li>
            <li class="nav-item"><a wire:navigate href="/projects"
                    data-i18n="nav.projects">{{ __('page.nav.projects') }}</a>
            </li>
            <li class="nav-item"><a wire:navigate href="https://anniedotexe.mypixieset.com/"
                    data-i18n="nav.photos">{{ __('page.nav.photos') }}</a></li>

        </ul>
    </nav>

    <!-- user avatar button (ضعه في اليمين في نفس السطر) -->
    <div class="user-wrap">
        <button id="userBtn" class="user-btn" aria-haspopup="true" aria-expanded="false" aria-controls="userDropdown">
            <img src="{{ Auth::user()->avatar ?? asset('css/website/img/profile.png') }}" alt="User avatar"
                class="user-avatar">
        </button>

        <div id="userDropdown" class="user-dropdown" role="menu" aria-hidden="true">
            <label for="avatarInput" class="user-dropdown-item" role="menuitem">
                <i class="fas fa-camera"></i>
                <span data-i18n="menu.change_photo">
                    {{ __(key: 'page.menu.change_photo') }}
                </span>
            </label>

            @guest
                <a href="#" class="user-dropdown-item" role="menuitem">
                    <i class="fas fa-sign-in-alt"></i>
                    <span data-i18n="menu.login">
                        {{ __('page.menu.login') }}
                    </span>
                </a>
            @else
                <a href="#" class="user-dropdown-item" role="menuitem">
                    <i class="fas fa-user"></i>
                    <span data-i18n="menu.profile">
                        {{ __('page.menu.profile') }}
                    </span>
                </a>
                <form method="POST" action="#" style="display:inline;">
                    @csrf
                    <button type="submit" class="user-dropdown-item" role="menuitem">
                        <i class="fas fa-sign-out-alt"></i>
                        <span data-i18n="menu.logout">
                            {{ __('page.menu.logout') }}
                        </span>
                    </button>
                </form>
            @endguest

            <div class="dropdown-divider"></div>

            <div class="lang-switcher" role="group" aria-label="Language switcher">
                <a wire:navigate href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="lang-btn" data-lang="en"
                    aria-pressed="{{ app()->getLocale() === 'en' ? 'true' : 'false' }}">EN</a>
                <a wire:navigate href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="lang-btn"
                    data-lang="ar" aria-pressed="{{ app()->getLocale() === 'ar' ? 'true' : 'false' }}">ع</a>
            </div>
        </div>

        <form id="avatarForm" action="#" method="POST" enctype="multipart/form-data" style="display:none;">
            @csrf
            <input id="avatarInput" name="avatar" type="file" accept="image/*">
        </form>
    </div>

    {{-- <link rel="stylesheet" href="{{ asset('css/header.css') }}"> --}}
</header>
