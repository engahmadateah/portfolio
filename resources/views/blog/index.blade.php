@extends('layouts.app')

@section('title', __('Blog'))

@php
    $isFirstPage = $posts->currentPage() === 1;
    $search = request('search');
    $featured = ($isFirstPage && ! $search) ? $posts->first() : null;
    $gridPosts = $featured ? $posts->getCollection()->skip(1) : $posts;

    $readingTime = function ($post) {
        $words = str_word_count(strip_tags((string) $post->content));
        return max(1, (int) ceil($words / 200));
    };
@endphp

@section('content')

<section class="relative py-36 bg-slate-950 text-white overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.25),transparent_60%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.25),transparent_60%)]"></div>
        <div class="absolute inset-0 opacity-10 bg-grid-drift"></div>
        <div class="absolute -top-60 -left-60 w-[900px] h-[900px] bg-cyan-400/20 blur-[200px] rounded-full animate-pulse"></div>
        <div class="absolute -bottom-60 -right-60 w-[900px] h-[900px] bg-indigo-500/20 blur-[200px] rounded-full animate-pulse"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <!-- HEADER -->
        <div class="text-center mb-16">
            <p data-hero-in class="inline-flex items-center gap-2 px-5 py-2 mb-6 rounded-full
                        border border-white/10 bg-white/5 backdrop-blur-xl
                        text-cyan-300 text-sm">
                <i class="fa-solid fa-feather"></i>
                {{ __('Blog') }}
            </p>

            <h1 data-hero-in class="text-6xl md:text-8xl font-black tracking-tight">
                {{ __('Blog') }}
                <span class="text-cyan-400 animate-pulse">✦</span>
            </h1>

            <p data-hero-in class="text-slate-400 mt-5 text-lg max-w-2xl mx-auto">
                {{ __('Ideas, code, and development experiences at a higher level 🚀') }}
            </p>

            <!-- SEARCH -->
            <form data-hero-in method="GET" class="mt-10 max-w-xl mx-auto relative">
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="{{ __('Search articles') }}"
                    class="w-full rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl
                           py-4 ps-14 pe-5 text-white placeholder:text-slate-500
                           focus:outline-none focus:border-cyan-400/50 focus:ring-2 focus:ring-cyan-400/20
                           transition"
                >
                <i class="fa-solid fa-magnifying-glass absolute top-1/2 -translate-y-1/2 start-5 text-slate-500"></i>

                @if($search)
                    <a href="{{ route('blog.index') }}"
                       class="absolute top-1/2 -translate-y-1/2 end-5 text-slate-500 hover:text-cyan-300 transition">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif
            </form>
        </div>

        @if($posts->isEmpty())

            <!-- EMPTY STATE -->
            <div data-aos="fade-up" class="max-w-lg mx-auto text-center py-20">
                <div class="w-20 h-20 mx-auto mb-6 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass text-3xl text-slate-500"></i>
                </div>
                <h2 class="text-2xl font-bold mb-2">{{ __('No articles found') }}</h2>
                <p class="text-slate-400">{{ __('Try a different search term.') }}</p>
            </div>

        @else

            @if($featured)
            <!-- FEATURED POST -->
            <a data-aos="fade-up" href="{{ route('blog.show', $featured->slug) }}"
               class="group relative grid md:grid-cols-2 gap-0 mb-14 rounded-[2rem] overflow-hidden
                      border border-white/10 bg-white/5 backdrop-blur-xl tilt-card">

                <div class="absolute -inset-2 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500
                            opacity-0 group-hover:opacity-70 blur-3xl transition duration-700"></div>

                <div class="relative h-72 md:h-full overflow-hidden">
                    @if($featured->image)
                        <img src="{{ asset('storage/' . $featured->image) }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-1000 ease-out">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                            <i class="fa-solid fa-book-open text-5xl text-slate-700"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-black/90 via-black/20 to-transparent md:to-transparent"></div>

                    <div class="absolute top-6 start-6 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider
                                bg-cyan-500/20 border border-cyan-400/40 backdrop-blur text-cyan-200">
                        {{ __('Latest') }}
                    </div>
                </div>

                <div class="relative p-10 flex flex-col justify-center">
                    <div class="flex items-center gap-4 text-xs text-slate-500 mb-4">
                        <span><i class="fa-regular fa-calendar me-1.5"></i>{{ $featured->created_at->translatedFormat('M d, Y') }}</span>
                        <span><i class="fa-regular fa-clock me-1.5"></i>{{ $readingTime($featured) }} {{ __('min read') }}</span>
                    </div>

                    <h2 class="text-3xl md:text-4xl font-black group-hover:text-cyan-300 transition mb-4 leading-tight">
                        {{ $featured->title }}
                    </h2>

                    <p class="text-slate-400 leading-7 mb-8 line-clamp-3">
                        {{ $featured->excerpt }}
                    </p>

                    <span class="inline-flex items-center gap-2 text-cyan-400 font-semibold w-fit">
                        {{ __('Read article') }}
                        <i class="fa-solid fa-arrow-left rtl:rotate-0 rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition"></i>
                    </span>
                </div>
            </a>
            @endif

            <!-- GRID -->
            <div class="grid md:grid-cols-3 gap-10">

                @foreach($gridPosts as $post)
                <a data-aos="fade-up" href="{{ route('blog.show', $post->slug) }}"
                   class="group relative rounded-[2rem] overflow-hidden border border-white/10
                          bg-white/5 backdrop-blur-xl tilt-card
                          hover:-translate-y-3 transition duration-500">

                    <div class="absolute -inset-2 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500
                                opacity-0 group-hover:opacity-60 blur-3xl transition duration-700"></div>

                    <!-- IMAGE -->
                    <div class="relative h-56 overflow-hidden">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-1000 ease-out">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                                <i class="fa-solid fa-book-open text-4xl text-slate-700"></i>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>

                        <div class="absolute top-4 start-4 px-3 py-1 rounded-full text-xs bg-cyan-500/20 border border-cyan-400/30 backdrop-blur text-cyan-200">
                            {{ __('Article') }}
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div class="relative p-7">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                            <span><i class="fa-regular fa-calendar me-1"></i>{{ $post->created_at->translatedFormat('M d, Y') }}</span>
                            <span>·</span>
                            <span>{{ $readingTime($post) }} {{ __('min read') }}</span>
                        </div>

                        <h2 class="text-xl font-bold group-hover:text-cyan-300 transition mb-3 leading-snug line-clamp-2">
                            {{ $post->title }}
                        </h2>

                        <p class="text-slate-400 text-sm leading-7 line-clamp-2">
                            {{ $post->excerpt }}
                        </p>

                        <div class="mt-6 flex items-center gap-2 text-cyan-400 text-sm">
                            <span class="group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition">
                                {{ __('Read article') }}
                            </span>
                            <i class="fa-solid fa-arrow-left rtl:rotate-0 rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition"></i>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>

            <!-- PAGINATION -->
            @if($posts->hasPages())
            <div class="mt-20 flex justify-center [&_a]:text-slate-300 [&_a]:hover:text-cyan-300 [&_span]:text-slate-600">
                <div class="px-6 py-3 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl">
                    {{ $posts->links() }}
                </div>
            </div>
            @endif

        @endif

    </div>
</section>

@endsection
