@extends('layouts.app')

@section('title', $post->title)

@php
    $readingMinutes = max(1, (int) ceil(str_word_count(strip_tags((string) $post->content)) / 200));
@endphp

@section('content')

<!-- READING PROGRESS -->
<div class="fixed top-0 inset-x-0 h-1 bg-white/5 z-[60]">
    <div id="reading-progress" class="h-full bg-gradient-to-r from-cyan-400 to-indigo-400"></div>
</div>

<!-- ARTICLE WRAPPER -->
<section id="article-content" class="relative py-32 bg-slate-950 text-white overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.15),transparent_60%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom,rgba(99,102,241,0.15),transparent_60%)]"></div>
    </div>

    <!-- ORBS -->
    <div class="absolute -top-60 -left-60 w-[700px] h-[700px] bg-cyan-500/20 blur-[160px] rounded-full animate-pulse"></div>
    <div class="absolute -bottom-60 -right-60 w-[700px] h-[700px] bg-indigo-500/20 blur-[160px] rounded-full animate-pulse"></div>

    <div class="max-w-4xl mx-auto px-6 relative z-10">

        <!-- BACK -->
        <a data-hero-in href="{{ route('blog.index') }}"
           class="inline-flex items-center gap-2 text-slate-400 hover:text-cyan-400 transition mb-12">
            <i class="fa-solid fa-arrow-left rtl:rotate-0 rotate-180"></i>
            {{ __('Back to blog') }}
        </a>

        <!-- TITLE -->
        <div data-hero-in class="relative mb-6">

            <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 to-indigo-500/20 blur-2xl rounded-2xl"></div>

            <h1 class="relative text-4xl md:text-5xl font-black leading-tight tracking-tight">
                {{ $post->title }}
            </h1>

            <div class="mt-4 h-[2px] w-40 bg-gradient-to-r from-cyan-400 to-transparent underline-flow"></div>
        </div>

        <!-- META -->
        <div data-hero-in class="flex flex-wrap items-center gap-5 text-sm text-slate-400 mb-14">
            <span class="flex items-center gap-2">
                <i class="fa-regular fa-calendar text-cyan-400"></i>
                {{ $post->created_at->translatedFormat('M d, Y') }}
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-regular fa-clock text-cyan-400"></i>
                {{ $readingMinutes }} {{ __('min read') }}
            </span>
            <button
                type="button"
                onclick="navigator.clipboard.writeText(window.location.href).then(() => { this.querySelector('span').textContent = '{{ __('Copied!') }}' })"
                class="flex items-center gap-2 hover:text-cyan-400 transition"
            >
                <i class="fa-solid fa-link"></i>
                <span>{{ __('Copy link') }}</span>
            </button>
        </div>

        <!-- IMAGE -->
        @if($post->image)
        <div data-aos="zoom-in" class="relative mb-14 rounded-3xl overflow-hidden border border-white/10">

            <div class="absolute -inset-2 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500
                        opacity-30 blur-2xl"></div>

            <img src="{{ asset('storage/' . $post->image) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-[420px] object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>

        </div>
        @endif

        <!-- CONTENT CARD -->
        <div data-aos="fade-up" class="relative">

            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 via-indigo-500 to-cyan-500
                        opacity-30 blur-xl rounded-3xl animate-pulse"></div>

            <article class="relative bg-white/5 border border-white/10 rounded-3xl p-8 md:p-12 backdrop-blur-xl
                            shadow-2xl overflow-hidden">

                <div class="prose prose-invert max-w-none
                            prose-p:text-slate-300 prose-p:leading-8
                            prose-p:break-words
                            prose-headings:text-white
                            prose-strong:text-white
                            prose-a:text-cyan-400 prose-a:no-underline hover:prose-a:underline
                            prose-img:rounded-2xl
                            prose-blockquote:border-cyan-400 prose-blockquote:text-slate-300
                            prose-code:text-cyan-300
                            break-words">

                    {!! $post->content !!}

                </div>

            </article>

        </div>

        <!-- AUTHOR -->
        @if($setting)
        <div data-aos="fade-up" class="mt-14 flex items-center gap-5 p-6 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl">
            @if($setting->profile_image)
                <img src="{{ asset('storage/' . $setting->profile_image) }}"
                     class="w-16 h-16 rounded-2xl object-cover border border-white/10">
            @else
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-500 flex items-center justify-center font-black text-xl">
                    {{ mb_substr($setting->hero_title ?? 'A', 0, 1) }}
                </div>
            @endif

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">{{ __('Written by') }}</p>
                <h3 class="font-bold text-lg">{{ $setting->hero_title ?? __('Portfolio') }}</h3>
            </div>

            <a href="{{ url('/#contact') }}"
               class="magnetic ms-auto shrink-0 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                      border border-white/10 hover:border-cyan-400/40 hover:text-cyan-300 transition text-sm font-semibold">
                {{ __('Contact me') }}
            </a>
        </div>
        @endif

    </div>
</section>

<!-- RELATED -->
@if($relatedPosts->count())
<section class="py-28 border-t border-white/10 bg-slate-950 relative overflow-hidden">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.10),transparent_60%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.10),transparent_60%)]"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        <h2 data-aos="fade-up" class="text-3xl font-black mb-12">{{ __('Related articles') }}</h2>

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($relatedPosts as $item)
            <a data-aos="fade-up" href="{{ route('blog.show', $item->slug) }}"
               class="group relative rounded-3xl overflow-hidden border border-white/10
                      bg-white/5 hover:-translate-y-3 transition duration-500 tilt-card">

                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-indigo-500
                            opacity-0 group-hover:opacity-40 blur-xl transition -z-10"></div>

                @if($item->image)
                <div class="h-40 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                @else
                <div class="h-40 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                    <i class="fa-solid fa-book-open text-3xl text-slate-700"></i>
                </div>
                @endif

                <div class="p-5 relative">

                    <h3 class="font-bold group-hover:text-cyan-400 transition line-clamp-1">
                        {{ $item->title }}
                    </h3>

                    <p class="text-sm text-slate-400 mt-2 line-clamp-2">
                        {{ $item->excerpt }}
                    </p>

                </div>

            </a>
            @endforeach

        </div>

    </div>
</section>
@endif

@endsection
