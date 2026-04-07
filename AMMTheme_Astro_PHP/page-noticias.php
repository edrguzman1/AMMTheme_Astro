<?php 
/* Template Name: Listado de Noticias */
get_header(); 
?>

<main class="min-h-screen bg-slate-50 pt-32 pb-24 relative overflow-hidden">
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-sky-200/20 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-cyan-200/20 rounded-full blur-[150px] pointer-events-none"></div>
    
    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        <nav class="flex mb-10" aria-label="Breadcrumb">
            <ol class="inline-flex items-center uppercase tracking-[0.2em] font-black text-[10px] space-x-2 text-slate-400">
                <li class="inline-flex items-center">
                    <a href="<?php echo home_url('/'); ?>" class="hover:text-sky-600 transition-colors">Inicio</a>
                </li>
                <li class="flex items-center space-x-2">
                    <span>/</span>
                    <span class="text-sky-600 font-bold">Noticias</span>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl mb-16 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight">
                Noticias y <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-cyan-500">Novedades</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl">
                Mantente al día con los últimos artículos, actualizaciones tecnológicas y casos de estudio de AM&M.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            
            <?php
            // Consulta a la base de datos para extraer las Entradas (Noticias)
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1, // Muestra todas (puedes cambiarlo al número que desees)
                'post_status'    => 'publish'
            );
            $noticias_query = new WP_Query($args);

            if ( $noticias_query->have_posts() ) :
                while ( $noticias_query->have_posts() ) : $noticias_query->the_post();
                    
                    // Extraer imagen destacada
                    $imagen_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if(!$imagen_url) $imagen_url = get_template_directory_uri() . '/images/default.jpg'; // Imagen por defecto
            ?>
            
            <a href="<?php the_permalink(); ?>" class="group bg-white rounded-3xl border border-slate-200 overflow-hidden hover:border-sky-200 hover:shadow-[0_15px_40px_rgba(14,165,233,0.1)] transition-all duration-300 flex flex-col h-full transform hover:-translate-y-2">
                <div class="h-60 overflow-hidden relative bg-slate-100">
                    <img src="<?php echo esc_url($imagen_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex items-center text-sky-600 text-sm font-semibold mb-4 space-x-2">
                        <svg class="w-4 h-4 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 leading-tight group-hover:text-sky-600 transition-colors">
                        <?php the_title(); ?>
                    </h3>
                    <div class="text-slate-600 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="mt-auto flex items-center text-sky-600 font-bold transition-colors">
                        <span class="border-b-2 border-transparent group-hover:border-sky-300 pb-0.5 transition-colors uppercase text-xs tracking-wider">Leer artículo</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                </div>
            </a>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<div class="col-span-full"><p class="text-lg text-slate-500">Aún no hay noticias publicadas.</p></div>';
            endif;
            ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>