@extends('layouts.app')

@section('title', 'السيرة الذاتية')

@section('content')
<section class="py-20 min-h-screen">
    <div class="max-w-4xl mx-auto px-6">

        <div class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-5xl font-black mb-3">
                    {{ $setting?->hero_title }}
                </h1>

                <p class="text-slate-400 text-xl">
                    {{ $setting?->hero_subtitle }}
                </p>
            </div>

            @if($setting?->cv_file)
                <a
                    href="{{ asset('storage/' . $setting->cv_file) }}"
                    target="_blank"
                    class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 px-6 py-3 rounded-2xl font-bold"
                >
                    تحميل PDF
                </a>
            @endif
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 mb-10">
            <h2 class="text-3xl font-bold mb-6">الخبرات</h2>

            <div class="space-y-6">
                @foreach($experiences as $experience)
                    <div class="border-r-2 border-cyan-400 pr-4">
                        <h3 class="text-2xl font-bold">{{ $experience->job_title }}</h3>
                        <p class="text-cyan-400">{{ $experience->company }}</p>
                        <p class="text-slate-500 mb-2">{{ $experience->period }}</p>
                        <p class="text-slate-300">{{ $experience->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8">
            <h2 class="text-3xl font-bold mb-6">المهارات</h2>

            <div class="grid md:grid-cols-2 gap-5">
                @foreach($skills as $skill)
                    <div>
                        <div class="flex justify-between mb-2">
                            <span>{{ $skill->name }}</span>
                            <span>{{ $skill->percentage }}%</span>
                        </div>

                        <div class="w-full bg-slate-800 h-3 rounded-full">
                            <div class="bg-cyan-400 h-3 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection