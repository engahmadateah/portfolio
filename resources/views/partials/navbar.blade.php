<nav class="sticky top-0 z-50 backdrop-blur-md border-b border-slate-800 bg-slate-900/15 text-white transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-10 py-5 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="text-2xl font-extrabold tracking-wide text-cyan-400 hover:opacity-90 transition">
            MyPortfolio
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-10 text-sm font-medium">

            <a href="{{ url('/#about') }}" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-1 group-hover:rotate-12"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4z"/>
                    <path d="M6 20v-2a6 6 0 0112 0v2"/>
                </svg>
                من أنا
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#skills') }}" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-12"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 3l2.4 6.8H21l-5.5 4 2.1 6.7L12 16.9 6.4 20.5 8.5 13.8 3 9.8h6.6z"/>
                </svg>
                المهارات
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#experience') }}" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-y-[-4px]"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 21h18"/>
                    <path d="M5 21V7l8-4v18"/>
                    <path d="M19 21V11l-6-3"/>
                </svg>
                الخبرات
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#projects') }}" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 7h18M3 12h18M3 17h18"/>
                </svg>
                المشاريع
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#services') }}" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 2l3 7h7l-5.5 4 2 7-6.5-4.5L5.5 20l2-7L2 9h7z"/>
                </svg>
                الخدمات
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ url('/#contact') }}" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 4h16v16H4z"/>
                    <path d="M4 4l8 8 8-8"/>
                </svg>
                تواصل
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="/blog" class="relative group flex items-center gap-2 hover:text-cyan-400 transition">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 4h16v16H4z"/>
                    <path d="M8 8h8M8 12h8M8 16h6"/>
                </svg>
                المدونة
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
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

            <a href="#about" onclick="toggleMenu()" class="hover:text-cyan-400 transition">من أنا</a>
            <a href="#skills" onclick="toggleMenu()" class="hover:text-cyan-400 transition">المهارات</a>
            <a href="#experience" onclick="toggleMenu()" class="hover:text-cyan-400 transition">الخبرات</a>
            <a href="#projects" onclick="toggleMenu()" class="hover:text-cyan-400 transition">المشاريع</a>
            <a href="#services" onclick="toggleMenu()" class="hover:text-cyan-400 transition">الخدمات</a>
            <a href="#contact" onclick="toggleMenu()" class="hover:text-cyan-400 transition">تواصل</a>
            <a href="/blog" onclick="toggleMenu()" class="hover:text-cyan-400 transition">المدونة</a>

        </div>
    </div>
</nav>