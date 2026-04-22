<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'My Portfolio')</title>

<meta name="description" content="@yield('meta_description', 'مطور Laravel و PHP متخصص ببناء مواقع ولوحات تحكم وأنظمة احترافية.')">
<meta name="keywords" content="@yield('meta_keywords', 'Laravel, PHP, Web Developer, Portfolio, مشاريع, برمجة')">
<meta name="author" content="{{ $setting?->hero_title ?? 'My Portfolio' }}">

<meta property="og:title" content="@yield('title', 'My Portfolio')">
<meta property="og:description" content="@yield('meta_description', 'مطور Laravel و PHP متخصص ببناء مواقع ولوحات تحكم وأنظمة احترافية.')">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">

@if(!empty($setting?->profile_image))
<meta property="og:image" content="{{ asset('storage/' . $setting->profile_image) }}">
@endif

    <meta name="description" content="موقع بورتفوليو لمهندس برمجيات متخصص في Laravel و PHP و MySQL">
    <meta name="keywords" content="Laravel, PHP, MySQL, Portfolio, Software Engineer">
    <meta name="author" content="اسمك">

    <meta property="og:title" content="اسمك - Software Engineer">
    <meta property="og:description" content="مطور Laravel و PHP أقوم ببناء مواقع ولوحات تحكم احترافية">
    <meta property="og:image" content="{{ asset('images/profile.png') }}">
    <meta property="og:type" content="website">

    <link rel="icon" type="image/png" href="{{ asset('images/profile.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
    $setting = \App\Models\Setting::first();
@endphp

@if($setting?->favicon)
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<a
    href="https://wa.me/+963983614598?text=مرحباً، أريد الاستفسار عن خدماتك"
    target="_blank"
    class="fixed bottom-6 left-6 z-50 flex items-center justify-center w-16 h-16 rounded-full bg-green-500 hover:bg-green-600 shadow-2xl transition hover:scale-110"
>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-8 h-8 text-white"
         fill="currentColor"
         viewBox="0 0 24 24">
        <path d="M20.52 3.48A11.82 11.82 0 0 0 12.06 0C5.46 0 .09 5.37.09 11.97c0 2.1.55 4.16 1.59 5.98L0 24l6.22-1.63a11.94 11.94 0 0 0 5.84 1.49h.01c6.6 0 11.97-5.37 11.97-11.97 0-3.2-1.25-6.21-3.52-8.41ZM12.07 21.8h-.01a9.88 9.88 0 0 1-5.04-1.38l-.36-.21-3.69.97.99-3.6-.23-.37a9.86 9.86 0 0 1-1.52-5.24c0-5.45 4.43-9.88 9.88-9.88 2.64 0 5.11 1.03 6.97 2.9a9.8 9.8 0 0 1 2.89 6.98c0 5.45-4.43 9.88-9.88 9.88Zm5.42-7.4c-.3-.15-1.77-.87-2.05-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.25-.46-2.39-1.47-.88-.78-1.47-1.74-1.64-2.04-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.8.37-.27.3-1.05 1.03-1.05 2.5s1.08 2.9 1.23 3.1c.15.2 2.12 3.24 5.13 4.54.72.31 1.28.5 1.72.64.72.23 1.37.2 1.89.12.58-.09 1.77-.72 2.02-1.41.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/>
    </svg>
</a>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script>
window.addEventListener('load', () => {
    const loader = document.getElementById('page-loader');

    setTimeout(() => {
        loader.classList.add('opacity-0', 'scale-110');

        setTimeout(() => {
            loader.remove();
        }, 700);
    }, 1200);
});
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 900,
    once: true,
    easing: 'ease-out-cubic'
  });
</script>
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<!-- Lightbox (simple + clean) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/css/glightbox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/js/glightbox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

<body class="bg-slate-950 text-white">

<div id="page-loader"
     class="fixed inset-0 z-[9999] overflow-hidden bg-slate-950 flex items-center justify-center transition-all duration-700">

    <!-- Glow background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_rgba(34,211,238,0.18),_transparent_55%)]"></div>
    <div class="absolute w-[500px] h-[500px] rounded-full bg-cyan-500/10 blur-3xl animate-pulse"></div>

    <!-- Animated rings -->
    <div class="absolute w-56 h-56 rounded-full border border-cyan-400/10"></div>

    <div class="absolute w-56 h-56 rounded-full border-2 border-transparent border-t-cyan-400 border-r-cyan-300 animate-[spin_3s_linear_infinite]"></div>

    <div class="absolute w-44 h-44 rounded-full border border-purple-500/20 animate-pulse"></div>

    <div class="absolute w-44 h-44 rounded-full border-2 border-transparent border-b-purple-400 animate-[spin_2s_linear_infinite_reverse]"></div>

    <!-- Center logo -->
    <div class="relative flex flex-col items-center z-10">

        <div class="relative flex items-center justify-center w-28 h-28 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-[0_0_50px_rgba(34,211,238,0.25)]">

            <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-cyan-400/10 via-transparent to-purple-500/20"></div>

            <span class="text-4xl font-black tracking-[0.2em] text-white drop-shadow-[0_0_20px_rgba(34,211,238,0.8)]">
                AA
            </span>
        </div>

        <div class="mt-8 text-center">
            <h2 class="text-white text-xl md:text-2xl font-bold tracking-[0.35em] uppercase">
                Ahmad Ateah
            </h2>

            <p class="mt-3 text-slate-400 text-sm tracking-[0.5em] uppercase animate-pulse">
                Loading Experience
            </p>
        </div>
    </div>
</div>





    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

</body>
</html>