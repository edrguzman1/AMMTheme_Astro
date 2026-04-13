<?php 
/* Template Name: Página General (Legal/Avisos) */
get_header(); 
?>

<style>
/* Estilos for limpiar el HTML antiguo and adaptarlo al nuevo ecosistema visual */
.wp-content-legal {
    color: #334155; /* text-slate-700 */
    font-family: 'Inter', sans-serif;
}
.wp-content-legal h1, .wp-content-legal h2, .wp-content-legal h3 {
    font-family: 'Outfit', sans-serif;
    font-weight: 800;
    color: #0f172a; /* text-slate-900 */
    margin-top: 2rem;
    margin-bottom: 1rem;
}
.wp-content-legal h2 { font-size: 2rem; }
.wp-content-legal p {
    margin-bottom: 1.5rem;
    line-height: 1.8;
    font-size: 1.125rem;
    text-align: justify; /* Mantiene la justificación that tenías */
}
.wp-content-legal strong, .wp-content-legal b {
    font-weight: 800;
    color: #0ea5e9; /* text-sky-500 for resaltar palabras clave */
}
.wp-content-legal a {
    color: #0284c7;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s ease;
}
.wp-content-legal a:hover {
    text-decoration: underline;
    color: #0369a1;
}

/* Neutralizamos las clases the Bootstrap that traes from the database */
.wp-content-legal .row { display: block; margin: 0; }
.wp-content-legal .col-md-12 { padding: 0; }
.wp-content-legal .heading-section { display: none; } /* Ocultamos el título duplicado viejo */
</style>

<main class="min-h-screen bg-slate-50 pt-32 pb-24 relative overflow-hidden text-slate-800">
    <div class="absolute top-0 left-0 w-full h-[300px] bg-gradient-to-b from-sky-100/50 to-transparent pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-100/30 rounded-full blur-[120px] pointer-events-none"></div>
    
    <div class="container mx-auto px-6 max-w-5xl relative z-10">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <nav class="flex mb-10" aria-label="Breadcrumb">
            <ol class="inline-flex items-center uppercase tracking-[0.2em] font-black text-[10px] space-x-2 text-slate-400">
                <li class="inline-flex items-center">
                    <a href="<?php echo home_url('/'); ?>" class="hover:text-sky-600 transition-colors">Inicio</a>
                </li>
                <li class="flex items-center space-x-2" aria-current="page">
                    <span>/</span>
                    <span class="text-sky-600 font-bold max-w-[300px] truncate"><?php the_title(); ?></span>
                </li>
            </ol>
        </nav>

        <article class="bg-white border border-slate-200 rounded-3xl p-8 md:p-14 shadow-xl shadow-slate-200/50 relative overflow-hidden">
            <header class="mb-10 text-center border-b border-slate-100 pb-8">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-cyan-100 bg-cyan-50/50 mb-6 group">
                    <span class="w-2 h-2 rounded-full bg-cyan-500 mr-2.5 animate-pulse"></span>
                    <span class="text-[11px] font-black font-['Outfit'] text-cyan-900 tracking-widest uppercase">Legal & Corporativo</span>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold font-['Outfit'] text-slate-900 leading-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <div class="wp-content-legal">
                <?php the_content(); ?>
            </div>
        </article>

        <?php endwhile; endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>