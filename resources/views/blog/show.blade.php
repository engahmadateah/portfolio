@extends('layouts.app')

@section('title', $post->title)

@section('content')

<!-- ARTICLE WRAPPER -->
<section class="relative py-32 bg-slate-950 text-white overflow-hidden">

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
        <a href="/blog"
           class="inline-flex items-center gap-2 text-slate-400 hover:text-cyan-400 transition mb-12">
            <i class="fa-solid fa-arrow-left"></i>
            العودة للمدونة
        </a>

        <!-- TITLE -->
        <div class="relative mb-14">

            <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 to-indigo-500/20 blur-2xl rounded-2xl"></div>

            <h1 class="relative text-4xl md:text-5xl font-black leading-tight tracking-tight">
                {{ $post->title }}
            </h1>

            <div class="mt-4 h-[2px] w-40 bg-gradient-to-r from-cyan-400 to-transparent
                        animate-[move_4s_linear_infinite]"></div>
        </div>

        <!-- IMAGE (FIXED - NO HOVER SCALE) -->
        @if($post->image)
        <div class="relative mb-14 rounded-3xl overflow-hidden border border-white/10">

            <!-- glow frame -->
            <div class="absolute -inset-2 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500
                        opacity-30 blur-2xl"></div>

            <img src="{{ asset('storage/' . $post->image) }}"
                 class="w-full h-[420px] object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>

        </div>
        @endif

        <!-- CONTENT CARD (FIXED OVERFLOW + WORLD STYLE) -->
        <div class="relative">

            <!-- glowing border -->
            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 via-indigo-500 to-cyan-500
                        opacity-30 blur-xl rounded-3xl animate-pulse"></div>

            <article class="relative bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-xl
                            shadow-2xl overflow-hidden">

                <!-- TEXT SAFE WRAPPER -->
                <div class="prose prose-invert max-w-none
                            prose-p:text-slate-300 prose-p:leading-8
                            prose-p:break-words
                            prose-headings:text-white
                            prose-strong:text-white
                            prose-a:text-cyan-400
                            break-words overflow-wrap-anywhere">

                    {!! $post->content !!}

                </div>

            </article>

        </div>

    </div>
</section>

<!-- RELATED -->
@if($relatedPosts->count())
<section class="py-28 border-t border-white/10 bg-slate-950 relative overflow-hidden">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.10),transparent_60%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.10),transparent_60%)]"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        <h2 class="text-3xl font-black mb-12">مقالات مشابهة</h2>

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($relatedPosts as $item)
            <a href="{{ route('blog.show', $item->slug) }}"
               class="group rounded-3xl overflow-hidden border border-white/10
                      bg-white/5 hover:-translate-y-3 transition duration-500">

                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-indigo-500
                            opacity-0 group-hover:opacity-40 blur-xl transition"></div>

                @if($item->image)
                <div class="h-40 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                @endif

                <div class="p-5 relative">

                    <h3 class="font-bold group-hover:text-cyan-400 transition">
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

<!-- ANIMATION -->
<style>
@keyframes move {
    0% { transform: translateX(-30%); }
    50% { transform: translateX(30%); }
    100% { transform: translateX(-30%); }
}
</style>

@endsection