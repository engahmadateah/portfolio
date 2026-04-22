@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $project->title)
@section('meta_description', Str::limit($project->description, 150))
@section('meta_keywords', $project->technologies)

@section('content')

<!-- PAGE WRAPPER -->
<section class="relative py-28 bg-slate-950 text-white overflow-hidden">

    <!-- BACKGROUND GLOW -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.12),transparent_60%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.12),transparent_60%)]"></div>

    <div class="max-w-5xl mx-auto px-6 relative z-10">

        <!-- BACK -->
        <a href="/#projects"
           class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 mb-10 transition">
            <i class="fa-solid fa-arrow-left"></i>
            العودة للمشاريع
        </a>

        <!-- HERO IMAGE WITH STRONG ANIMATED GLOW -->
        @if($project->image)
        <div class="relative group rounded-3xl overflow-hidden mb-10">

            <!-- 💥 BIG MOVING WIDE GLOW -->
            <div class="absolute -inset-28 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500
                        opacity-40 blur-[120px]
                        animate-[glowMove_6s_ease-in-out_infinite]"></div>

            <!-- 🌊 EXTRA SOFT PULSE GLOW -->
            <div class="absolute -inset-32 bg-cyan-400/10 rounded-full blur-[140px]
                        animate-pulse"></div>

            <!-- 🔄 SUBTLE ROTATING RING -->
            <div class="absolute -inset-16 border border-cyan-400/20 rounded-3xl
                        animate-[spin_14s_linear_infinite] opacity-60"></div>

            <!-- IMAGE WRAPPER -->
            <div class="relative rounded-3xl overflow-hidden border border-white/10">

                <img src="{{ asset('storage/' . $project->image) }}"
                     class="w-full h-[420px] object-cover
                            group-hover:scale-105 transition duration-700">

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                <div class="absolute bottom-5 left-5 flex items-center gap-2 text-sm text-white/80">
                    <i class="fa-solid fa-bolt text-cyan-400"></i>
                    Featured Project
                </div>

            </div>

        </div>
        @endif

        <!-- TITLE -->
        <h1 class="text-4xl md:text-5xl font-black mb-6 leading-tight">
            {{ $project->title }}
        </h1>

        <!-- DESCRIPTION -->
        <p class="text-slate-300 leading-9 text-lg mb-10">
            {{ $project->description }}
        </p>

        <!-- TECH STACK -->
        @if($project->technologies)
        <div class="mb-12">

            <div class="flex items-center gap-2 mb-4 text-slate-200">
                <i class="fa-solid fa-code text-cyan-400"></i>
                <h2 class="text-xl font-bold">Tech Stack</h2>
            </div>

            <div class="flex flex-wrap gap-3">
                @foreach(explode(',', $project->technologies) as $tech)
                <span class="px-4 py-2 rounded-full text-sm
                             bg-white/5 border border-white/10
                             text-cyan-300 hover:border-cyan-400/40 transition">
                    {{ trim($tech) }}
                </span>
                @endforeach
            </div>

        </div>
        @endif

        <!-- GALLERY -->
        @if($project->images->count())
        <div class="mb-14">

            <div class="flex items-center gap-2 mb-6 text-slate-200">
                <i class="fa-solid fa-images text-cyan-400"></i>
                <h2 class="text-xl font-bold">صور المشروع</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                @foreach($project->images as $image)
                <a href="{{ asset('storage/' . $image->image) }}"
                   class="glightbox group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5">

                    <img src="{{ asset('storage/' . $image->image) }}"
                         class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <i class="fa-solid fa-expand text-2xl text-cyan-300"></i>
                    </div>

                </a>
                @endforeach

            </div>

        </div>
        @endif

        <!-- ACTIONS -->
        <div class="flex flex-wrap gap-4">

            @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank"
               class="flex items-center gap-2 px-6 py-3 rounded-2xl
                      bg-white/5 border border-white/10
                      hover:border-cyan-400/40 hover:bg-white/10 transition">

                <i class="fa-brands fa-github"></i>
                GitHub
            </a>
            @endif

            @if($project->live_url)
            <a href="{{ $project->live_url }}" target="_blank"
               class="flex items-center gap-2 px-6 py-3 rounded-2xl
                      bg-gradient-to-r from-cyan-500 to-blue-600
                      text-slate-950 font-bold hover:scale-105 transition">

                <i class="fa-solid fa-rocket"></i>
                Live Demo
            </a>
            @endif

        </div>

    </div>
</section>

<!-- RELATED PROJECTS -->
@if($relatedProjects->count())
<section class="py-28 border-t border-white/10 bg-slate-950 relative overflow-hidden">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.10),transparent_60%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.10),transparent_60%)]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="flex items-center gap-2 mb-12 text-white">
            <i class="fa-solid fa-layer-group text-cyan-400"></i>
            <h2 class="text-3xl font-black">مشاريع أخرى</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($relatedProjects as $item)
            <a href="{{ route('projects.show', $item->slug) }}"
               class="group rounded-3xl overflow-hidden border border-white/10
                      bg-white/5 hover:-translate-y-2 hover:border-cyan-400/40
                      transition duration-500">

                <div class="relative h-52 overflow-hidden">

                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                </div>

                <div class="p-5">

                    <h3 class="font-bold group-hover:text-cyan-400 transition">
                        {{ $item->title }}
                    </h3>

                    <p class="text-sm text-slate-400 mt-2 line-clamp-2">
                        {{ Str::limit($item->description, 80) }}
                    </p>

                </div>

            </a>
            @endforeach

        </div>

    </div>

</section>
@endif

<!-- LIGHTBOX -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/css/glightbox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/js/glightbox.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        zoomable: true,
        openEffect: 'zoom',
        closeEffect: 'fade'
    });
});
</script>

@endsection