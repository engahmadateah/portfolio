@extends('layouts.app')

@section('title', '404')

@section('content')

<section class="min-h-screen flex items-center justify-center px-6 relative overflow-hidden bg-slate-950 text-white">

    <!-- BACKGROUND LAYERS -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.20),transparent_55%),radial-gradient(circle_at_bottom,rgba(99,102,241,0.18),transparent_60%)]"></div>

    <!-- floating lights -->
    <div class="absolute w-[700px] h-[700px] bg-cyan-500/10 blur-3xl rounded-full -top-60 -left-60 animate-pulse"></div>
    <div class="absolute w-[520px] h-[520px] bg-indigo-500/10 blur-3xl rounded-full bottom-0 right-0 animate-pulse"></div>

    <!-- noise texture -->
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
         style="background-image:url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <!-- MAIN CARD -->
    <div class="relative text-center max-w-2xl">

        <!-- ICON WRAPPER -->
        <div class="mx-auto w-24 h-24 mb-8 rounded-2xl
                    bg-white/5 border border-white/10
                    flex items-center justify-center
                    shadow-xl shadow-cyan-500/10
                    hover:scale-105 transition">

            <i class="fa-solid fa-circle-exclamation text-cyan-400 text-4xl"></i>
        </div>

        <!-- 404 NUMBER -->
        <h1 class="text-[140px] md:text-[180px] font-black leading-none tracking-tight
                   bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-400
                   text-transparent bg-clip-text">
            404
        </h1>

        <!-- TITLE -->
        <p class="text-2xl md:text-3xl font-semibold text-slate-200 mt-6 flex items-center justify-center gap-2">
            <i class="fa-solid fa-ban text-red-400"></i>
            الصفحة غير موجودة
        </p>

        <!-- DESCRIPTION -->
        <p class="text-slate-400 leading-7 mt-4 mb-10">
            يبدو أن الرابط غير صحيح أو تم حذف الصفحة.<br>
            لا تقلق، نرجعك مباشرة للمسار الصحيح 🚀
        </p>

        <!-- ACTIONS -->
        <div class="flex items-center justify-center gap-4">

            <!-- HOME BUTTON -->
            <a href="/"
               class="group relative px-8 py-3 rounded-2xl font-bold
                      bg-gradient-to-r from-cyan-500 to-blue-600
                      text-slate-950 hover:scale-105 transition
                      shadow-xl shadow-cyan-500/20 overflow-hidden">

                <span class="relative z-10 flex items-center gap-2">
                    <i class="fa-solid fa-house"></i>
                    العودة للرئيسية
                </span>

                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-20 transition"></div>
            </a>

            <!-- BACK BUTTON -->
            <button onclick="goBackSmart()"
               class="px-8 py-3 rounded-2xl border border-white/10
                      hover:border-cyan-400/50 hover:bg-white/5
                      transition text-slate-300 flex items-center gap-2">

                <i class="fa-solid fa-arrow-left"></i>
                رجوع
            </button>

        </div>

        <!-- SMALL HELP TEXT -->
        <div class="mt-10 text-xs text-slate-500 flex items-center justify-center gap-2">
            <i class="fa-solid fa-shield-halved"></i>
            خطأ 404 - الصفحة غير متاحة حالياً
        </div>

    </div>

</section>

<script>
function goBackSmart() {
    if (window.history.length > 1) {
        window.history.back();
    } else {
        window.location.href = "/";
    }
}
</script>

@endsection