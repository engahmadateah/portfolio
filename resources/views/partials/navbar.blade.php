<nav id="site-nav" class="sticky top-0 z-50 backdrop-blur-md border-b border-slate-800 bg-slate-900/15 text-white transition-all duration-300">
    <div id="site-nav-row" class="max-w-7xl mx-auto px-10 py-5 flex items-center justify-between transition-all duration-300">

        <!-- Logo -->
        <a href="/" class="shrink-0 me-8 lg:me-14 text-2xl font-extrabold tracking-wide text-cyan-400 hover:opacity-90 transition">
            {{ $brandName }}
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-7 text-sm font-medium">

            <a href="{{ url('/#about') }}" data-nav-link="about" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-1 group-hover:rotate-12"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4z"/>
                    <path d="M6 20v-2a6 6 0 0112 0v2"/>
                </svg>
                {{ __('About me') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#skills') }}" data-nav-link="skills" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-12"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 3l2.4 6.8H21l-5.5 4 2.1 6.7L12 16.9 6.4 20.5 8.5 13.8 3 9.8h6.6z"/>
                </svg>
                {{ __('Skills') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#experience') }}" data-nav-link="experience" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-y-[-4px]"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 21h18"/>
                    <path d="M5 21V7l8-4v18"/>
                    <path d="M19 21V11l-6-3"/>
                </svg>
                {{ __('Experience') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#projects') }}" data-nav-link="projects" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 7h18M3 12h18M3 17h18"/>
                </svg>
                {{ __('Projects') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#services') }}" data-nav-link="services" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 2l3 7h7l-5.5 4 2 7-6.5-4.5L5.5 20l2-7L2 9h7z"/>
                </svg>
                {{ __('Services') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#contact') }}" data-nav-link="contact" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 4h16v16H4z"/>
                    <path d="M4 4l8 8 8-8"/>
                </svg>
                {{ __('Contact') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="/blog" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 4h16v16H4z"/>
                    <path d="M8 8h8M8 12h8M8 16h6"/>
                </svg>
                {{ __('Blog') }}
                <span class="nav-underline absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4">

            <!-- Theme Toggle -->
            <button
                onclick="toggleTheme()"
                aria-label="Toggle theme"
                class="border border-slate-700 bg-slate-800 text-white px-5 py-2.5 rounded-xl hover:border-cyan-400 hover:text-cyan-400 transition flex items-center gap-2"
            >
                🌓
                <span class="hidden sm:inline">Theme</span>
            </button>

            <!-- Language Switcher -->
            <a
                href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                class="border border-slate-700 bg-slate-800 text-white px-4 py-2.5 rounded-xl hover:border-cyan-400 hover:text-cyan-400 transition flex items-center gap-2 text-sm font-semibold"
            >
                <i class="fa-solid fa-globe"></i>
                {{ app()->getLocale() === 'ar' ? 'EN' : 'AR' }}
            </a>

            <!-- Mobile Menu Button -->
            <button
                onclick="toggleMenu()"
                aria-label="Open menu"
                class="md:hidden text-white text-3xl hover:text-cyan-400 transition hover:rotate-90 duration-300"
            >
                ☰
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800 bg-slate-900 px-6 py-6">
        <div class="flex flex-col gap-5 text-sm font-medium">

            <a href="{{ url('/#about') }}" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('About me') }}</a>
            <a href="{{ url('/#skills') }}" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('Skills') }}</a>
            <a href="{{ url('/#experience') }}" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('Experience') }}</a>
            <a href="{{ url('/#projects') }}" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('Projects') }}</a>
            <a href="{{ url('/#services') }}" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('Services') }}</a>
            <a href="{{ url('/#contact') }}" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('Contact') }}</a>
            <a href="/blog" onclick="toggleMenu()" class="hover:text-cyan-400 transition">{{ __('Blog') }}</a>

            @if(file_exists(public_path('files/cv.pdf')))
            <a
                href="{{ asset('files/cv.pdf') }}"
                download="CV.pdf"
                class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-500 to-blue-500
                       text-slate-950 font-bold px-5 py-3 rounded-xl mt-2"
            >
                <i class="fa-solid fa-file-arrow-down"></i>
                {{ __('Download CV') }}
            </a>
            @endif

        </div>
    </div>
</nav>