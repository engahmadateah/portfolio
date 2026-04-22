@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $service->title)
@section('meta_description', Str::limit($service->description, 150))
@section('meta_keywords', $service->title . ', Laravel, PHP, Web Development')

@section('content')

<section class="relative py-28 min-h-screen overflow-hidden bg-slate-950 text-white">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.18),transparent_55%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.18),transparent_60%)]"></div>

    <!-- GLOW -->
    <div class="absolute w-[700px] h-[700px] bg-cyan-500/10 blur-3xl rounded-full -top-60 -left-60 animate-pulse"></div>
    <div class="absolute w-[500px] h-[500px] bg-indigo-500/10 blur-3xl rounded-full bottom-0 right-0 animate-pulse"></div>

    <!-- NOISE -->
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
         style="background-image:url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <div class="relative max-w-5xl mx-auto px-6">

        <!-- BACK LINK -->
        <a href="/#services"
           class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 mb-10 transition">
            <i class="fa-solid fa-arrow-left"></i>
            العودة للخدمات
        </a>

        <!-- CARD -->
        <div class="relative rounded-3xl p-10
                    bg-white/5 backdrop-blur-xl
                    border border-white/10
                    shadow-2xl shadow-cyan-500/10">

            <!-- ICON -->
            <div class="w-14 h-14 mb-6 rounded-xl
                        bg-white/5 border border-white/10
                        flex items-center justify-center">

                <i class="fa-solid fa-gear text-cyan-400 text-xl"></i>
            </div>

            <!-- TITLE -->
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight
                       bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-400
                       text-transparent bg-clip-text">

                {{ $service->title }}

            </h1>

            <!-- DESCRIPTION -->
            <p class="text-lg md:text-xl leading-9 text-slate-300 max-w-3xl">
                {{ $service->description }}
            </p>

            <!-- FEATURES (fake SaaS feel) -->
            <div class="grid md:grid-cols-3 gap-6 mt-10">

                <div class="p-5 rounded-2xl bg-white/5 border border-white/10">
                    <i class="fa-solid fa-bolt text-cyan-400 mb-3 text-xl"></i>
                    <p class="font-semibold">أداء عالي</p>
                    <p class="text-sm text-slate-400 mt-1">حلول سريعة ومبنية باحتراف</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/10">
                    <i class="fa-solid fa-shield-halved text-cyan-400 mb-3 text-xl"></i>
                    <p class="font-semibold">أمان قوي</p>
                    <p class="text-sm text-slate-400 mt-1">حماية متقدمة للأنظمة</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/10">
                    <i class="fa-solid fa-wand-magic-sparkles text-cyan-400 mb-3 text-xl"></i>
                    <p class="font-semibold">تصميم حديث</p>
                    <p class="text-sm text-slate-400 mt-1">UI/UX مستوحى من أفضل الشركات</p>
                </div>

            </div>

            <!-- ACTIONS -->
            <div class="mt-10 flex flex-wrap gap-4">

                <a href="/#contact"
                   class="group relative px-7 py-3 rounded-2xl font-bold
                          bg-gradient-to-r from-cyan-500 to-blue-600
                          text-slate-950 hover:scale-105 transition
                          shadow-xl shadow-cyan-500/20 overflow-hidden">

                    <span class="relative z-10 flex items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        اطلب هذه الخدمة
                    </span>

                    <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-20 transition"></div>
                </a>

                <a href="/#projects"
                   class="px-7 py-3 rounded-2xl border border-white/10
                          hover:border-cyan-400/50 hover:bg-white/5
                          transition flex items-center gap-2 text-slate-300">

                    <i class="fa-solid fa-layer-group"></i>
                    شاهد المشاريع
                </a>

            </div>

        </div>

    </div>

</section>

@endsection