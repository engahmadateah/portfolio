@extends('layouts.app')

@section('title', 'الرئيسية')
@section('meta_description', 'معرض أعمال وخدمات مطور Laravel و PHP مع مشاريع احترافية ولوحات تحكم ومتاجر إلكترونية.')
@section('meta_keywords', 'Laravel Developer, PHP Developer, Portfolio, مشاريع Laravel, برمجة مواقع')
@section('content')

<section class="relative min-h-screen flex items-center overflow-hidden bg-slate-900 text-white">

    <!-- Dynamic background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.15),transparent_40%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.15),transparent_40%)]"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-16 items-center">

        <!-- TEXT -->
        <div class="animate-fadeInUp">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2 mb-6 rounded-full 
                        border border-white/10 bg-white/5 backdrop-blur-xl
                        text-cyan-300 text-sm shadow-lg shadow-cyan-500/5
                        hover:scale-105 transition duration-300">
                <i class="fa-solid fa-code"></i>
                Software Engineer
            </div>

            <!-- Greeting -->
            <p class="text-cyan-300 mb-4 text-lg flex items-center gap-2">
                <i class="fa-solid fa-hand-sparkles animate-pulse"></i>
                مرحباً 👋 أنا
            </p>

            <!-- Name -->
            <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6">
                <span class="bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400 bg-clip-text text-transparent">
                    {{ $setting?->hero_title ?? 'اسمك هنا' }}
                </span>
            </h1>

            <!-- Subtitle -->
            <h2 class="text-2xl md:text-3xl text-slate-300 mb-6 flex items-center gap-3">
                <span class="flex items-center justify-center w-11 h-11 rounded-xl 
                             bg-white/5 border border-white/10 backdrop-blur-md
                             text-cyan-300 shadow-inner">
                    <i class="fa-solid fa-laptop-code"></i>
                </span>
                {{ $setting?->hero_subtitle ?? 'Laravel Developer & Software Engineer' }}
            </h2>

            <!-- Description -->
            <p class="text-slate-400 leading-8 text-lg mb-10 max-w-xl">
                أبني أنظمة احترافية عالية الأداء باستخدام Laravel و PHP مع تجربة مستخدم سلسة وتصميم عصري يحاكي المنتجات العالمية.
            </p>

            <!-- Tech Stack -->
            <div class="flex flex-wrap gap-3 mb-10">
                @foreach(['Laravel','PHP','MySQL','API'] as $tech)
                <span class="px-4 py-2 rounded-full 
                             bg-white/5 border border-white/10 
                             text-slate-300 text-sm
                             backdrop-blur-md
                             hover:bg-cyan-500/10 hover:border-cyan-400/30
                             hover:text-white
                             transition-all duration-300">
                    {{ $tech }}
                </span>
                @endforeach
            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-5">

                <!-- Primary -->
                <a href="#projects"
                   class="group relative inline-flex items-center gap-2 px-7 py-3 rounded-2xl font-bold text-white
                          bg-gradient-to-r from-cyan-500 to-blue-600
                          overflow-hidden transition duration-300">

                    <!-- Glow hover -->
                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>

                    <i class="fa-solid fa-briefcase transition group-hover:rotate-6"></i>
                    مشاهدة أعمالي
                </a>

                <!-- Secondary -->
                <a href="#contact"
                   class="group inline-flex items-center gap-2 px-7 py-3 rounded-2xl font-bold
                          border border-white/10 bg-white/5 backdrop-blur-xl
                          text-slate-200
                          hover:bg-cyan-500/10 hover:border-cyan-400/40 hover:text-white
                          transition-all duration-300">

                    <i class="fa-solid fa-envelope transition group-hover:-translate-y-1"></i>
                    تواصل معي
                </a>

            </div>

        </div>

        <!-- IMAGE -->
        <div class="flex justify-center animate-fadeIn">
            <div class="relative group">

                <!-- Glow -->
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/30 to-indigo-500/30 blur-3xl rounded-full opacity-70 group-hover:opacity-100 transition duration-500"></div>

                <!-- Rotating border -->
                <div class="absolute inset-0 rounded-full border border-white/10 animate-spin-slow"></div>

                <!-- Image -->
                <img
                    src="{{ $setting?->profile_image ? asset('storage/' . $setting->profile_image) : asset('images/profile.png') }}"
                    class="relative w-80 h-80 md:w-[420px] md:h-[420px] object-cover rounded-full
                           border-4 border-white/10 shadow-2xl
                           transition duration-500 group-hover:scale-105"
                >

                <!-- Floating badge -->
                <div class="absolute bottom-6 left-6 px-4 py-2 rounded-full 
                            bg-slate-900/80 backdrop-blur-xl border border-white/10
                            text-sm flex items-center gap-2 shadow-lg">
                    <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full animate-pulse"></span>
                    Available
                </div>

            </div>
        </div>

    </div>
</section>

<style>
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* slow rotate */
@keyframes spinSlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-fadeInUp {
    animation: fadeInUp 1s ease forwards;
}

.animate-fadeIn {
    animation: fadeIn 1.2s ease forwards;
}

.animate-spin-slow {
    animation: spinSlow 12s linear infinite;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">




<section id="about" 
class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.08),transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.08),transparent_50%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.025] pointer-events-none"
         style="background-image: url('https://grainy-gradients.vercel.app/noise.svg');">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">

        <!-- TEXT -->
        <div class="animate-fadeInUp">

            <!-- label -->
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 rounded-full 
                        border border-white/10 bg-white/5 backdrop-blur-xl
                        text-cyan-300 text-sm shadow-lg shadow-cyan-500/5">
                <i class="fa-solid fa-user"></i>
                About Me
            </div>

            <!-- TITLE (FIXED) -->
            <h2 class="text-4xl md:text-6xl font-black mb-6 pb-2 leading-[1.2]
                       bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400
                       text-transparent bg-clip-text">
                من أنا
            </h2>

            <p class="text-slate-400 leading-9 text-lg mb-6 max-w-xl">
                {{ $setting?->about_text ?? 
                'أنا مهندس برمجيات متخصص في تطوير تطبيقات الويب باستخدام Laravel و PHP و MySQL. أحب بناء الأنظمة الاحترافية ولوحات التحكم الحديثة، وأركز دائماً على الأداء وتجربة المستخدم.' }}
            </p>

            <p class="text-slate-500 leading-8 max-w-xl">
                أعمل على بناء مواقع، متاجر إلكترونية، لوحات تحكم، APIs، وأنظمة مخصصة للشركات والأفراد.
            </p>

        </div>

        <!-- STATS -->
        <div class="relative group">

            <!-- Glow -->
            <div class="absolute inset-0 
                        bg-gradient-to-r from-cyan-500/20 to-indigo-500/20 
                        blur-3xl rounded-3xl opacity-60 
                        group-hover:opacity-80 transition duration-500">
            </div>

            <!-- Card -->
            <div class="relative rounded-3xl p-10 
                        bg-white/5 backdrop-blur-2xl 
                        border border-white/10 
                        shadow-2xl shadow-cyan-500/10
                        transition duration-500 
                        group-hover:-translate-y-2 group-hover:scale-[1.02]">

                <div class="absolute inset-0 rounded-3xl 
                            bg-gradient-to-br from-white/5 to-transparent 
                            opacity-40">
                </div>

                <!-- Grid -->
                <div class="relative grid grid-cols-2 gap-10 text-center">

                    <div class="group/stat">
                        <h3 class="text-4xl font-black mb-2 
                                   bg-gradient-to-r from-cyan-300 to-blue-400
                                   text-transparent bg-clip-text
                                   transition duration-300 group-hover/stat:scale-110">
                            3+
                        </h3>
                        <p class="text-slate-500">سنوات خبرة</p>
                    </div>

                    <div class="group/stat">
                        <h3 class="text-4xl font-black mb-2 
                                   bg-gradient-to-r from-cyan-300 to-blue-400
                                   text-transparent bg-clip-text
                                   transition duration-300 group-hover/stat:scale-110">
                            20+
                        </h3>
                        <p class="text-slate-500">مشروع منفذ</p>
                    </div>

                    <div class="group/stat">
                        <h3 class="text-4xl font-black mb-2 
                                   bg-gradient-to-r from-cyan-300 to-blue-400
                                   text-transparent bg-clip-text
                                   transition duration-300 group-hover/stat:scale-110">
                            10+
                        </h3>
                        <p class="text-slate-500">عميل</p>
                    </div>

                    <div class="group/stat">
                        <h3 class="text-4xl font-black mb-2 
                                   bg-gradient-to-r from-cyan-300 to-blue-400
                                   text-transparent bg-clip-text
                                   transition duration-300 group-hover/stat:scale-110">
                            100%
                        </h3>
                        <p class="text-slate-500">رضا العملاء</p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<section id="skills" 
class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background نفس الهيرو -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.08),transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.08),transparent_50%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.025] pointer-events-none"
         style="background-image: url('https://grainy-gradients.vercel.app/noise.svg');">
    </div>

    <div class="relative max-w-7xl mx-auto px-6">

        <!-- Title -->
        <div class="mb-14">
            <h2 class="text-4xl md:text-6xl font-black leading-[1.2] md:leading-[1.1] mb-4 
                       bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400
                       text-transparent bg-clip-text pb-2">
                المهارات
            </h2>

            <p class="text-slate-400 max-w-xl">
                مجموعة التقنيات التي أستخدمها لبناء أنظمة احترافية عالية الأداء.
            </p>
        </div>

        <!-- Skills Grid -->
        <div class="grid md:grid-cols-2 gap-8">

            @foreach($skills as $skill)

            <div class="group relative">

                <!-- Glow -->
                <div class="absolute inset-0 
                            bg-gradient-to-r from-cyan-500/20 to-blue-500/20 
                            blur-2xl rounded-2xl opacity-0 
                            group-hover:opacity-100 transition duration-500">
                </div>

                <!-- Card -->
                <div class="relative p-6 rounded-2xl 
                            bg-white/5 backdrop-blur-xl 
                            border border-white/10
                            transition duration-500 
                            group-hover:-translate-y-2 group-hover:scale-[1.02]">

                    <!-- Top -->
                    <div class="flex justify-between items-center mb-4">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 flex items-center justify-center rounded-xl 
                                        bg-white/5 border border-white/10 text-cyan-300">
                                <i class="fa-solid fa-code"></i>
                            </div>

                            <span class="text-lg font-semibold text-slate-200">
                                {{ $skill->name }}
                            </span>

                        </div>

                        <span class="text-sm text-slate-400">
                            {{ $skill->percentage }}%
                        </span>

                    </div>

                    <!-- Progress -->
                    <div class="relative">

                        <!-- Background bar -->
                        <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">

                            <!-- Progress fill -->
                            <div class="h-2 rounded-full 
                                        bg-gradient-to-r from-cyan-400 to-blue-500
                                        relative overflow-hidden"
                                 style="width: {{ $skill->percentage }}%">

                                <!-- Shine animation -->
                                <span class="absolute inset-0 
                                             bg-white/20 opacity-0 
                                             group-hover:opacity-100 
                                             animate-shine">
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>

<style>

/* Shine animation */
@keyframes shine {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(100%);
    }
}

.animate-shine {
    animation: shine 1.2s ease;
}

</style>

<section id="experience" 
class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.08),transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.08),transparent_50%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.025] pointer-events-none"
         style="background-image: url('https://grainy-gradients.vercel.app/noise.svg');">
    </div>

    <!-- ✅ نفس عرض skills -->
    <div class="relative max-w-7xl mx-auto px-6">

        <!-- Title -->
        <div class="mb-16">
            <h2 class="text-4xl md:text-6xl font-black leading-[1.2] md:leading-[1.1] mb-4 pb-2
                       bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400
                       text-transparent bg-clip-text">
                الخبرات العملية
            </h2>

            <p class="text-slate-400 max-w-xl">
                مسار عملي في تطوير الأنظمة وبناء حلول برمجية احترافية.
            </p>
        </div>

        <!-- Timeline -->
        <div class="relative border-l border-white/10 ml-3 space-y-10">

            @foreach($experiences as $experience)

            <div class="relative pl-10 group">

                <!-- Dot -->
                <span class="absolute left-[-7px] top-2 w-3.5 h-3.5 rounded-full 
                             bg-cyan-400 shadow-lg shadow-cyan-500/30 
                             group-hover:scale-125 transition"></span>

                <!-- Glow -->
                <div class="absolute inset-0 -left-6 
                            bg-gradient-to-r from-cyan-500/10 to-blue-500/10 
                            blur-2xl rounded-2xl opacity-0 
                            group-hover:opacity-100 transition duration-500">
                </div>

                <!-- Card -->
                <div class="relative p-6 rounded-2xl 
                            bg-white/5 backdrop-blur-xl 
                            border border-white/10
                            transition duration-500 
                            group-hover:-translate-y-2 group-hover:scale-[1.02]">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">

                        <div>
                            <h3 class="text-2xl font-bold text-slate-100">
                                {{ $experience->job_title }}
                            </h3>

                            <p class="text-cyan-300 mt-1 flex items-center gap-2">
                                <i class="fa-solid fa-building"></i>
                                {{ $experience->company }}
                            </p>
                        </div>

                        <span class="text-slate-400 mt-3 md:mt-0 flex items-center gap-2">
                            <i class="fa-regular fa-calendar"></i>
                            {{ $experience->period }}
                        </span>

                    </div>

                    <!-- Description -->
                    <p class="text-slate-400 leading-8">
                        {{ $experience->description }}
                    </p>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>

<section id="projects" 
class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.10),transparent_55%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.10),transparent_55%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
         style="background-image:url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">

            <div>
                <h2 class="text-4xl md:text-6xl font-black 
                           leading-[1.2] md:leading-[1.1]
                           pb-2
                           bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400
                           text-transparent bg-clip-text">
                    المشاريع
                </h2>

                <p class="text-slate-400 mt-4 max-w-xl leading-7">
                    مجموعة أعمال تم تصميمها بأسلوب احترافي يعكس جودة هندسة البرمجيات الحديثة وتجربة مستخدم راقية.
                </p>
            </div>

            <!-- 🔥 FILTER (احترافي) -->
            <div class="relative w-full md:w-80" id="filterBox">

                <!-- BUTTON -->
                <button onclick="toggleDropdown()"
                    class="w-full flex items-center justify-between
                           bg-white/5 backdrop-blur-xl
                           border border-white/10
                           rounded-2xl px-5 py-3.5
                           text-slate-200
                           hover:border-cyan-400/50
                           transition">

                    <span id="selectedText">
                        {{ request('category') 
                            ? $categories->firstWhere('id', request('category'))->name 
                            : 'كل الفئات' }}
                    </span>

                    <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                </button>

                <!-- DROPDOWN -->
                <div id="dropdown"
                    class="absolute mt-3 w-full z-50 hidden
                           rounded-2xl overflow-hidden
                           bg-slate-900/95 backdrop-blur-xl
                           border border-white/10
                           shadow-2xl">

                    <!-- ALL -->
                    <a href="/#projects"
                       class="block px-5 py-3 text-slate-300 hover:bg-white/5 hover:text-cyan-300 transition">
                        كل الفئات
                    </a>

                    @foreach($categories as $category)
                    <a href="/?category={{ $category->id }}#projects"
                       class="block px-5 py-3 
                       {{ request('category') == $category->id ? 'text-cyan-400 bg-white/5' : 'text-slate-300' }}
                       hover:bg-white/5 hover:text-cyan-300 transition">

                        {{ $category->name }}
                    </a>
                    @endforeach

                </div>
            </div>

        </div>

        <!-- GRID -->
        <div class="grid md:grid-cols-3 gap-8">

            @forelse($projects as $project)

            <div class="group relative cursor-pointer">

                <!-- FULL CARD CLICK -->
                <a href="{{ route('projects.show', $project->slug) }}"
                   class="absolute inset-0 z-20"
                   aria-label="{{ $project->title }}">
                </a>

                <!-- glow -->
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 
                            blur-2xl rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>

                <!-- CARD -->
                <div class="relative rounded-3xl overflow-hidden
                            bg-white/5 backdrop-blur-xl
                            border border-white/10
                            transition duration-500
                            group-hover:-translate-y-2 group-hover:scale-[1.02]">

                    <!-- IMAGE -->
                    <div class="relative overflow-hidden">

                        @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}"
                             class="w-full h-56 object-cover transition duration-700 group-hover:scale-110">
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>

                        @if($project->category)
                        <div class="absolute bottom-4 left-4 z-30">
                            <span class="px-3 py-1 text-xs rounded-full
                                         bg-white/10 backdrop-blur-md
                                         border border-white/10
                                         text-cyan-300">
                                {{ $project->category->name }}
                            </span>
                        </div>
                        @endif

                    </div>

                    <!-- CONTENT -->
                    <div class="p-6 relative z-30">

                        <h3 class="text-xl font-bold mb-3 text-slate-100 group-hover:text-cyan-300 transition">
                            {{ $project->title }}
                        </h3>

                        <p class="text-slate-400 leading-7 mb-5 break-words">
                            {{ $project->description }}
                        </p>

                        <!-- TAG -->
                        @if(!empty($project->type))
                            <div class="mb-4">
                                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full
                                             bg-white/10 border border-white/10 backdrop-blur-md
                                             {{ strtolower($project->type) === 'frontend' ? 'text-cyan-300' : '' }}
                                             {{ strtolower($project->type) === 'backend' ? 'text-indigo-300' : '' }}
                                             {{ strtolower($project->type) === 'fullstack' ? 'text-emerald-300' : '' }}">
                                    {{ $project->type }}
                                </span>
                            </div>
                        @endif

                        <!-- LINKS -->
                        <div class="flex items-center gap-6 text-sm relative z-30">

                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank"
                               class="text-slate-400 hover:text-white transition flex items-center gap-2">
                                <i class="fa-brands fa-github"></i>
                                Code
                            </a>
                            @endif

                            @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank"
                               class="text-cyan-400 hover:text-cyan-300 transition flex items-center gap-2">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                Live
                            </a>
                            @endif

                        </div>

                    </div>

                </div>
            </div>

            @empty

            <div class="col-span-3 text-center py-20 text-slate-500">
                لا توجد مشاريع ضمن هذه الفئة
            </div>

            @endforelse

        </div>

    </div>
</section>

<!-- 🔥 JS -->
<script>
function toggleDropdown() {
    document.getElementById("dropdown").classList.toggle("hidden");
}

document.addEventListener("click", function(e) {
    const box = document.getElementById("filterBox");
    if (!box.contains(e.target)) {
        document.getElementById("dropdown").classList.add("hidden");
    }
});
</script>
<section id="services" 
class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.10),transparent_55%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.10),transparent_55%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
         style="background-image:url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="mb-14">
            <h2 class="text-4xl md:text-6xl font-black
                       bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400
                       text-transparent bg-clip-text">
                الخدمات
            </h2>

            <p class="text-slate-400 mt-4 max-w-xl leading-7">
                حلول برمجية متكاملة مصممة لتطوير الأعمال وبناء أنظمة احترافية عالية الجودة.
            </p>
        </div>

        <!-- GRID -->
        <div class="grid md:grid-cols-3 gap-8">

            @foreach($services as $service)

            <div class="group relative">

                <!-- glow -->
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 
                            blur-2xl rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>

                <!-- FULL CARD LINK -->
                <a href="{{ route('services.show', $service) }}"
                   class="absolute inset-0 z-20"
                   aria-label="{{ $service->title }}">
                </a>

                <!-- CARD -->
                <div class="relative rounded-3xl p-6
                            bg-white/5 backdrop-blur-xl
                            border border-white/10
                            transition duration-500
                            group-hover:-translate-y-2 group-hover:scale-[1.02]">

                    <!-- icon -->
                    <div class="w-12 h-12 mb-5 flex items-center justify-center rounded-2xl
                                bg-white/5 border border-white/10 text-cyan-300">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>

                    <!-- title -->
                    <h3 class="text-2xl font-bold mb-3 text-slate-100 group-hover:text-cyan-300 transition">
                        {{ $service->title }}
                    </h3>

                    <!-- description -->
                    <p class="text-slate-400 leading-7 line-clamp-3 mb-6">
                        {{ $service->description }}
                    </p>

                    <!-- CTA -->
                    <div class="flex items-center justify-between">

                        <span class="text-cyan-400 font-medium flex items-center gap-2">
                            عرض التفاصيل
                            <i class="fa-solid fa-arrow-left text-xs group-hover:translate-x-1 transition"></i>
                        </span>

                        <!-- subtle badge -->
                        <span class="text-xs text-slate-500">
                            Service
                        </span>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>

<section class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.10),transparent_55%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.10),transparent_55%)]"></div>

    <!-- ✅ نفس باقي السكاشن -->
    <div class="relative max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="mb-14">
            <h2 class="text-4xl md:text-6xl font-black 
                       leading-[1.2] md:leading-[1.1] 
                       pb-2
                       bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400 
                       text-transparent bg-clip-text">
                آراء العملاء
            </h2>

            <p class="text-slate-400 mt-4 max-w-xl">
                تجارب حقيقية من عملاء وثقوا بالحلول البرمجية.
            </p>
        </div>

        <!-- WRAPPER -->
        <div class="relative px-14">

            <!-- LEFT BUTTON -->
            <button id="prevBtn"
                class="absolute -left-6 top-1/2 -translate-y-1/2 z-10
                       w-14 h-14 rounded-full
                       bg-white/10 hover:bg-white/20 backdrop-blur
                       flex items-center justify-center
                       shadow-lg hover:scale-110 transition">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <!-- RIGHT BUTTON -->
            <button id="nextBtn"
                class="absolute -right-6 top-1/2 -translate-y-1/2 z-10
                       w-14 h-14 rounded-full
                       bg-white/10 hover:bg-white/20 backdrop-blur
                       flex items-center justify-center
                       shadow-lg hover:scale-110 transition">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <!-- TRACK -->
            <div id="track"
                 class="flex gap-8 overflow-x-auto scroll-smooth px-2 scrollbar-hide">

                @foreach($testimonials as $testimonial)

                <div class="min-w-full md:min-w-[50%] lg:min-w-[33.333%]">

                    <!-- CARD -->
                    <div class="group relative rounded-3xl p-7 bg-white/5 backdrop-blur-xl border border-white/10
                                transition-all duration-500 ease-out
                                hover:-translate-y-3 hover:border-cyan-400/40 hover:bg-white/10
                                hover:shadow-[0_20px_60px_-15px_rgba(34,211,238,0.25)]">

                        <!-- glow -->
                        <div class="absolute inset-0 rounded-3xl opacity-0 group-hover:opacity-100 transition
                                    bg-gradient-to-br from-cyan-500/10 via-transparent to-indigo-500/10 pointer-events-none"></div>

                        <!-- stars -->
                        <div class="relative flex gap-1 text-cyan-300 mb-5">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>

                        <!-- message -->
                        <p class="relative text-slate-300 leading-8 mb-6 italic break-words">
                            "{{ $testimonial->message }}"
                        </p>

                        <!-- footer -->
                        <div class="relative flex items-center justify-between">

                            <div>
                                <h3 class="font-bold text-lg">{{ $testimonial->name }}</h3>
                                <p class="text-slate-400 text-sm">
                                    {{ $testimonial->job_title }}
                                    @if($testimonial->company)
                                        — {{ $testimonial->company }}
                                    @endif
                                </p>
                            </div>

                            <div class="w-11 h-11 rounded-full bg-white/10 flex items-center justify-center text-cyan-300 group-hover:scale-110 transition">
                                <i class="fa-solid fa-user"></i>
                            </div>

                        </div>

                    </div>
                </div>

                @endforeach

            </div>
        </div>

    </div>
</section>

<section id="contact" class="relative py-28 border-t border-white/10 bg-slate-900 text-white overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(6,182,212,0.10),transparent_55%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.10),transparent_55%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
         style="background-image:url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <!-- ✅ نفس عرض باقي السكاشن -->
    <div class="relative max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-6xl font-black
                       leading-[1.2] md:leading-[1.1]
                       pb-2
                       bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-400
                       text-transparent bg-clip-text">
                تواصل معي
            </h2>

            <p class="text-slate-400 mt-4 flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane text-cyan-400"></i>
                خلينا نبني شي قوي سوا
            </p>
        </div>

        <!-- SUCCESS -->
        @if(session('success'))
            <div class="mb-10 rounded-2xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-emerald-300 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <!-- NAME -->
                <div class="group transition duration-300 hover:-translate-y-0.5">
                    <label class="text-sm text-slate-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-user text-cyan-400"></i> الاسم
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-3 rounded-2xl
                               bg-white/5 backdrop-blur-xl
                               border border-white/10
                               text-white placeholder:text-slate-500
                               outline-none transition duration-300
                               hover:bg-white/[0.07] hover:border-cyan-400/40
                               focus:border-cyan-400 focus:ring-0
                               focus:shadow-[0_0_0_1px_rgba(34,211,238,0.35)]
                               focus:-translate-y-0.5" />

                    @error('name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div class="group transition duration-300 hover:-translate-y-0.5">
                    <label class="text-sm text-slate-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-cyan-400"></i> الإيميل
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-2xl
                               bg-white/5 backdrop-blur-xl
                               border border-white/10
                               text-white placeholder:text-slate-500
                               outline-none transition duration-300
                               hover:bg-white/[0.07] hover:border-cyan-400/40
                               focus:border-cyan-400 focus:ring-0
                               focus:shadow-[0_0_0_1px_rgba(34,211,238,0.35)]
                               focus:-translate-y-0.5" />

                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- SUBJECT -->
            <div class="group transition duration-300 hover:-translate-y-0.5">
                <label class="text-sm text-slate-400 mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-tag text-cyan-400"></i> الموضوع
                </label>

                <input type="text" name="subject" value="{{ old('subject') }}"
                    class="w-full px-4 py-3 rounded-2xl
                           bg-white/5 backdrop-blur-xl
                           border border-white/10
                           text-white placeholder:text-slate-500
                           outline-none transition duration-300
                           hover:bg-white/[0.07] hover:border-cyan-400/40
                           focus:border-cyan-400 focus:ring-0
                           focus:shadow-[0_0_0_1px_rgba(34,211,238,0.35)]
                           focus:-translate-y-0.5" />

                @error('subject')
                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- MESSAGE -->
            <div class="group transition duration-300 hover:-translate-y-0.5">
                <label class="text-sm text-slate-400 mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-message text-cyan-400"></i> الرسالة
                </label>

                <textarea name="message" rows="6"
                    class="w-full px-4 py-3 rounded-2xl
                           bg-white/5 backdrop-blur-xl
                           border border-white/10
                           text-white placeholder:text-slate-500
                           outline-none transition duration-300
                           hover:bg-white/[0.07] hover:border-cyan-400/40
                           focus:border-cyan-400 focus:ring-0
                           focus:shadow-[0_0_0_1px_rgba(34,211,238,0.35)]
                           focus:-translate-y-0.5 resize-none">{{ old('message') }}</textarea>

                @error('message')
                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <button id="submitBtn" type="submit"
                class="group relative w-full md:w-auto px-10 py-3 rounded-2xl
                       bg-gradient-to-r from-cyan-500 to-blue-500
                       text-slate-950 font-bold overflow-hidden
                       transition duration-300 hover:scale-[1.02] active:scale-[0.98]
                       shadow-lg shadow-cyan-500/15 hover:shadow-cyan-500/30">

                <span id="btnNormal" class="relative z-10 flex items-center justify-center gap-2 transition duration-300">
                    <i class="fa-solid fa-paper-plane"></i>
                    إرسال الرسالة
                </span>

                <span id="btnSending" class="hidden relative z-10 items-center justify-center gap-3">
                    <span class="relative w-10 h-6">
                        <i class="fa-solid fa-envelope absolute left-0 top-1/2 -translate-y-1/2 text-slate-950 text-lg"></i>
                        <span class="letter-fly absolute left-1 top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-slate-950"></span>
                    </span>
                    <span>يتم الإرسال...</span>
                    <i class="fa-solid fa-inbox inbox-bounce text-slate-950"></i>
                </span>

                <span class="absolute inset-0 bg-white/20 translate-x-[-100%] group-hover:translate-x-[100%] transition duration-700"></span>
            </button>

        </form>

    </div>
</section>

<style>
@keyframes letterFly {
    0%   { transform: translateX(0) translateY(0) rotate(0deg); opacity: 1; }
    45%  { transform: translateX(18px) translateY(-8px) rotate(12deg); opacity: 1; }
    75%  { transform: translateX(34px) translateY(-4px) rotate(6deg); opacity: 1; }
    100% { transform: translateX(44px) translateY(0) rotate(0deg); opacity: 0; }
}

@keyframes inboxBounce {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-3px); }
}

.letter-fly {
    animation: letterFly 1.1s ease-in-out infinite;
}

.inbox-bounce {
    animation: inboxBounce 0.7s ease-in-out infinite;
}
</style>

<script>
const contactForm = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");
const btnNormal = document.getElementById("btnNormal");
const btnSending = document.getElementById("btnSending");

let submitLocked = false;

contactForm.addEventListener("submit", function (e) {
    if (submitLocked) {
        e.preventDefault();
        return;
    }

    if (!contactForm.checkValidity()) {
        return;
    }

    e.preventDefault();
    submitLocked = true;

    submitBtn.disabled = true;
    btnNormal.classList.add("hidden");
    btnSending.classList.remove("hidden");
    btnSending.classList.add("flex");

    setTimeout(() => {
        contactForm.submit();
    }, 1100);
});
</script>
<footer class="relative border-t border-white/10 bg-slate-900 text-white overflow-hidden py-10">

    <!-- Background glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(6,182,212,0.08),transparent_60%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(99,102,241,0.08),transparent_60%)]"></div>

    <!-- Noise -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
         style="background-image:url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <div class="flex flex-col md:flex-row items-center justify-between gap-6">

            <!-- LEFT -->
            <p class="text-slate-400 text-sm flex items-center gap-2">
                <i class="fa-regular fa-copyright text-cyan-400"></i>
                {{ date('Y') }} جميع الحقوق محفوظة
            </p>

            <!-- CENTER (optional branding vibe) -->
            <div class="text-slate-500 text-sm flex items-center gap-2">
                صنع بـ
                <i class="fa-solid fa-heart text-red-400 animate-pulse"></i>
                و شغف تقني
            </div>

            <!-- RIGHT LINKS -->
            <div class="flex items-center gap-6">

                @if($setting?->github)
                <a href="{{ $setting->github }}" target="_blank"
                   class="group flex items-center gap-2 text-slate-400 hover:text-white transition">

                    <i class="fa-brands fa-github text-lg group-hover:text-cyan-400 transition"></i>
                    <span class="text-sm">GitHub</span>

                    <span class="h-[1px] w-0 bg-cyan-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                @endif

                @if($setting?->linkedin)
                <a href="{{ $setting->linkedin }}" target="_blank"
                   class="group flex items-center gap-2 text-slate-400 hover:text-white transition">

                    <i class="fa-brands fa-linkedin text-lg group-hover:text-cyan-400 transition"></i>
                    <span class="text-sm">LinkedIn</span>

                    <span class="h-[1px] w-0 bg-cyan-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                @endif

            </div>

        </div>

        <!-- divider glow line -->
        <div class="mt-8 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

        <!-- bottom tiny note -->
        <div class="text-center mt-6 text-xs text-slate-600">
            Designed & Built with modern UI aesthetics ✨
        </div>

    </div>
</footer>

@endsection