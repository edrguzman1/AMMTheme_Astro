<?php
/**
 * Plantilla para mostrar el Error 404 (Página no encontrada)
 */
get_header();
?>

<main class="relative min-h-screen flex items-center justify-center pt-32 lg:pt-40 pb-16 bg-[#002129] overflow-hidden font-['Inter']">
    
    <div class="absolute top-[50%] left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] sm:w-[800px] h-[600px] sm:h-[800px] bg-sky-500/20 rounded-full blur-[100px] sm:blur-[120px] pointer-events-none mix-blend-screen"></div>
    <div class="absolute top-[50%] left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] sm:w-[400px] h-[300px] sm:h-[400px] bg-cyan-400/20 rounded-full blur-[60px] sm:blur-[80px] pointer-events-none mix-blend-screen"></div>

    <div class="relative z-10 px-6 max-w-3xl mx-auto text-center">
        
        <div class="inline-flex items-center px-4 py-2 rounded-full border border-cyan-500/30 bg-cyan-500/10 mb-8 backdrop-blur-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 mr-2.5 animate-pulse"></span>
            <span class="text-[11px] font-black font-['Outfit'] text-cyan-100 tracking-widest uppercase">Error 404</span>
        </div>

        <h1 class="text-[7rem] sm:text-[10rem] lg:text-[12rem] leading-none font-black font-['Outfit'] text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-cyan-400 drop-shadow-2xl mb-2 select-none">
            404
        </h1>

        <h2 class="text-2xl sm:text-4xl font-bold font-['Outfit'] text-white tracking-tight mb-6 uppercase">
            Ruta <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-cyan-400">Desconocida</span>
        </h2>

        <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-10 font-medium italic opacity-90 max-w-xl mx-auto">
            Parece que la página que buscas ha sido movida, eliminada o nunca existió en nuestra infraestructura digital.
        </p>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center px-10 py-5 bg-gradient-to-r from-cyan-600 to-cyan-500 text-white text-[11px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-cyan-900/40 hover:-translate-y-1 hover:shadow-cyan-500/50 transition-all duration-400 group">
            <svg class="w-4 h-4 mr-3 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver al Inicio
        </a>
        
    </div>
</main>

<?php get_footer(); ?>