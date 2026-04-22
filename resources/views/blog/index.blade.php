@extends('layouts.app')

@section('title', 'المدونة')

@section('content')

<section class="relative py-36 bg-slate-950 text-white overflow-hidden">

    <!-- 🌌 ULTRA BACKGROUND ENGINE -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.25),transparent_60%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.25),transparent_60%)]"></div>

        <!-- moving grid -->
        <div class="absolute inset-0 opacity-10 bg-[linear-gradient(to_right,#0ea5e9_1px,transparent_1px),linear-gradient(to_bottom,#0ea5e9_1px,transparent_1px)] bg-[size:60px_60px] animate-[gridMove_12s_linear_infinite]"></div>

        <!-- energy waves -->
        <div class="absolute -top-60 -left-60 w-[900px] h-[900px] bg-cyan-400/20 blur-[200px] rounded-full animate-[pulse_4s_ease-in-out_infinite]"></div>
        <div class="absolute -bottom-60 -right-60 w-[900px] h-[900px] bg-indigo-500/20 blur-[200px] rounded-full animate-[pulse_5s_ease-in-out_infinite]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <!-- HEADER -->
        <div class="text-center mb-24">
            <h1 class="text-7xl md:text-8xl font-black tracking-tight">
                المدونة
                <span class="text-cyan-400 animate-pulse">✦</span>
            </h1>

            <p class="text-slate-400 mt-5 text-lg">
                أفكار، شفرات، وتجارب تطوير بمستوى أعلى 🚀
            </p>
        </div>

        <!-- GRID -->
        <div class="grid md:grid-cols-3 gap-12">

            @foreach($posts as $post)
            <a href="{{ route('blog.show', $post->slug) }}"
               class="group relative rounded-[2rem] overflow-hidden border border-white/10
                      bg-white/5 backdrop-blur-xl
                      hover:-translate-y-6 hover:scale-[1.02]
                      transition duration-700">

                <!-- 💥 MAIN HOLOGRAPHIC GLOW -->
                <div class="absolute -inset-2 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500
                            opacity-0 group-hover:opacity-90 blur-3xl transition duration-700
                            animate-[spin_8s_linear_infinite]"></div>

                <!-- IMAGE -->
                @if($post->image)
                <div class="relative h-64 overflow-hidden">

                    <img src="{{ asset('storage/' . $post->image) }}"
                         class="w-full h-full object-cover
                                group-hover:scale-125 transition duration-1000 ease-out">

                    <!-- cinematic overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>

                    <!-- floating badge -->
                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs bg-cyan-500/20 border border-cyan-400/30 backdrop-blur">
                        Article
                    </div>

                    <!-- icon burst -->
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition duration-500">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center
                                    animate-[pulse_1.5s_ease-in-out_infinite]">
                            <i class="fa-solid fa-book-open text-cyan-300"></i>
                        </div>
                    </div>

                </div>
                @endif

                <!-- CONTENT -->
                <div class="p-8">

                    <h2 class="text-2xl font-bold group-hover:text-cyan-300 transition mb-4">
                        {{ $post->title }}
                    </h2>

                    <p class="text-slate-400 text-sm leading-7">
                        {{ $post->excerpt }}
                    </p>

                    <!-- CTA -->
                    <div class="mt-7 flex items-center gap-2 text-cyan-400 text-sm">
                        <span class="group-hover:translate-x-2 transition duration-300">
                            قراءة المقال
                        </span>

                        <i class="fa-solid fa-arrow-left group-hover:-translate-x-3 transition duration-300"></i>
                    </div>

                </div>

                <!-- hologram sweep -->
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-700
                            bg-[linear-gradient(120deg,transparent,rgba(34,211,238,0.15),transparent)]
                            animate-[sweep_2.5s_linear_infinite]"></div>

            </a>
            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="mt-24 flex justify-center">
            <div class="px-8 py-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
</section>

<!-- ⚡ ULTRA ANIMATIONS -->
<style>
@keyframes gridMove {
    0% { transform: translateY(0); }
    100% { transform: translateY(60px); }
}

@keyframes sweep {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
</style>

@endsection