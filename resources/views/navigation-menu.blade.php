<nav id="navbar" class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top shadow">
    @if (Route::is('blog.single'))
        <div class="progress fixed-top" style="height: 5px;">
            <div class="progress-bar" style="width:1px;" id='myBar'></div>
        </div>
    @endif
    <div class="container"  data-aos="zoom-out" >
        <!-- Logo -->
        <a class="navbar-brand me-4" href="{{ Route::is('ballina') ? '#ballina' : route('ballina') }}">
            <x-jet-application-mark width="43" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-jet-nav-link href="{{ Route::is('ballina') ? '#ballina' : route('ballina') }}">
                    {{ __('Ballina') }}
                </x-jet-nav-link>

                @php
                    $linkNavigate = [
                        'About Me' => '#about',
                        'Services' => '#services',
                        'Portfolio' => '#portofilo',
                        'Blog' => '#blog',
                        'Contact' => '#contact',
                    ];
                @endphp

                @foreach ($linkNavigate as $link => $href)
                    <x-jet-nav-link href="{{ $href }}">
                        {{ $link }}
                    </x-jet-nav-link>
                @endforeach

                <x-jet-nav-link href="{{ route('blog.show') }}" :active="request()->routeIs('blog.show')">
                    {{ __('Posts') }}
                </x-jet-nav-link>
                {{-- @dd(request()->routeIs('ballina')."#services") --}}
            </ul>
            {{-- <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkMode">
                <label class="form-check-label" for="darkMode">Dark Mode</label>
            </div> --}}
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-baseline">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Management -->
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <!-- Team Switcher -->
                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                @endif

                <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Manage Account') }}
                            </h6>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @auth
                                <x-jet-dropdown-link href="{{ url('/admin') }}">
                                    {{ __('Admin Pannel') }}
                                </x-jet-dropdown-link>
                            @endauth

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @endauth

            </ul>
            <div class="d-flex align-items-center header_icone">
                <a href="{{ config('social.github') }}" target="_blank" title="Github" style="margin-right: 8px;"> <i
                        class="fa-brands fa-github"></i></a>
                <a href="{{ config('social.linkedin') }}" target="_blank" title="Linkedin"> <i
                        class="fa-brands fa-linkedin"></i></a>
            </div>

        </div>
    </div>
</nav>

{{-- <script>
    let darkModeOn = false;

    const createStorage = (name, value) => {
        localStorage.setItem(name, value);
    }

    const readStorage = name => {
        return localStorage.getItem(name);
    }

    const deleteStorage = name => {
        localStorage.removeItem(name);
    }

    const toggleDarkMode = (e) => {
        if (document.body.classList.contains("dark-mode")) {
            document.body.classList.remove("dark-mode");
            darkModeOn = false;
            createStorage("my_preferredMode", "light-mode");
        } else {
            document.body.classList.add("dark-mode");
            darkModeOn = true;
            createStorage("my_preferredMode", "dark-mode");
        }
    }

    document.getElementById("darkMode").addEventListener("click", toggleDarkMode)

    document.addEventListener("DOMContentLoaded", () => {
        if (readStorage("my_preferredMode")) {
            if (readStorage("my_preferredMode") == "dark-mode") {
                darkModeOn = true;
            } else {
                darkModeOn = false;
            }
        } else {
            if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
                darkModeOn = true;
            } else {
                if (document.body.classList.contains("dark-mode")) {
                    darkModeOn = true;
                } else {
                    darkModeOn = false;
                }
            }
        }

        if (darkModeOn) {
            if (!document.body.classList.contains("dark-mode")) {
                document.body.classList.add("dark-mode");
            }
            document.getElementById("darkMode").checked = true
        } else {
            if (document.body.classList.contains("dark-mode")) {
                document.body.classList.remove("dark-mode");
            }
        }
    })
</script>


<script>
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)
</script> --}}
