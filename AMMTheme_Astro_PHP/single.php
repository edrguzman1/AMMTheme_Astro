<?php 
/* Template Name: Detalle de Noticia */
get_header(); 
?>

<?php 
get_header(); 
?>

<style>
.wp-content{color:#334155;font-family:inherit}
.wp-content p{margin-bottom:2rem;line-height:1.8;font-size:1.125rem}
.wp-content h1,.wp-content h2,.wp-content h3,.wp-content h4{font-weight:800;color:#0f172a;margin-top:3rem;margin-bottom:1.5rem;line-height:1.3}
.wp-content h2{font-size:1.875rem}
.wp-content h3{font-size:1.5rem}
.wp-content ul{list-style-type:disc!important;padding-left:2rem!important;margin-bottom:2rem}
.wp-content ol{list-style-type:decimal!important;padding-left:2rem!important;margin-bottom:2rem}
.wp-content li{margin-bottom:.75rem;line-height:1.8;font-size:1.125rem}
.wp-content a{color:#0284c7;text-decoration:none;font-weight:600;transition:color .2s ease}
.wp-content a:hover{text-decoration:underline;color:#0369a1}
.wp-content strong,.wp-content b{font-weight:800;color:#1e293b}
.wp-content img{border-radius:1rem;margin-top:2rem;margin-bottom:2rem;box-shadow:0 4px 6px -1px #0000001a,0 2px 4px -1px #0000000f}
</style>

<main class="min-h-screen bg-slate-50 pt-32 pb-24 relative overflow-hidden text-slate-800">
    <div class="absolute top-0 left-0 w-full h-[300px] bg-gradient-to-b from-sky-100/50 to-transparent pointer-events-none"></div>
    
    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            // Extraer datos del post actual
            $imagen_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $categorias = get_the_category();
            $nombre_categoria = !empty($categorias) ? $categorias[0]->name : 'Actualidad';
        ?>

        <nav class="flex mb-10" aria-label="Breadcrumb">
            <ol class="inline-flex items-center uppercase tracking-[0.2em] font-black text-[10px] space-x-2 text-slate-400">
                <li class="inline-flex items-center">
                    <a href="<?php echo home_url('/'); ?>" class="hover:text-sky-600 transition-colors">Inicio</a>
                </li>
                <li class="flex items-center space-x-2">
                    <span>/</span>
                    <a href="<?php echo home_url('/noticias/'); ?>" class="hover:text-sky-600 transition-colors">Noticias</a>
                </li>
                <li class="flex items-center space-x-2 hidden md:flex" aria-current="page">
                    <span>/</span>
                    <span class="text-sky-600 font-bold max-w-[300px] truncate"><?php the_title(); ?></span>
                </li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-12">
            <article class="flex-grow lg:w-2/3 bg-white border border-slate-200 rounded-3xl p-8 md:p-12 shadow-sm relative overflow-hidden">
                <header class="mb-10">
                    <div class="flex items-center text-sky-600 text-sm font-semibold mb-6 space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="inline-block px-3 py-1 rounded-full bg-sky-50 text-sky-600 border border-sky-100 text-xs font-bold tracking-wider">
                            <?php echo esc_html($nombre_categoria); ?>
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-5xl font-bold text-slate-900 leading-tight mb-8">
                        <?php the_title(); ?>
                    </h1>
                    
                    <?php if($imagen_url): ?>
                    <div class="rounded-2xl overflow-hidden shadow-md border border-slate-100 mb-10 bg-slate-50">
                        <img src="<?php echo esc_url($imagen_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto max-h-[500px] object-cover">
                    </div>
                    <?php endif; ?>
                </header>

                <div class="wp-content">
                    <?php the_content(); ?>
                </div>
            </article>

            <aside class="lg:w-1/3">
                <div class="sticky top-32 bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center border-b border-slate-100 pb-4">
                        <span class="w-1.5 h-6 bg-sky-500 rounded-full mr-3"></span>
                        Últimas Noticias
                    </h3>
                    <div class="space-y-6">
                        
                        <?php
                        // Consulta para traer las 3 noticias más recientes, excluyendo la que estamos leyendo
                        $sidebar_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post__not_in'   => array(get_the_ID()),
                            'post_status'    => 'publish'
                        );
                        $sidebar_query = new WP_Query($sidebar_args);

                        if ($sidebar_query->have_posts()) :
                            while ($sidebar_query->have_posts()) : $sidebar_query->the_post();
                                $side_img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                if(!$side_img) $side_img = get_template_directory_uri() . '/images/default.jpg';
                        ?>
                        
                        <a href="<?php the_permalink(); ?>" class="group flex gap-4 items-start pb-6 border-b border-slate-100 last:border-0 last:pb-0">
                            <div class="w-20 h-20 flex-shrink-0 bg-slate-50 rounded-xl overflow-hidden border border-slate-100 relative">
                                <img src="<?php echo esc_url($side_img); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-sm font-bold text-slate-800 line-clamp-2 leading-snug group-hover:text-sky-600 transition-colors mb-2">
                                    <?php the_title(); ?>
                                </h4>
                                <div class="text-xs text-slate-500 font-medium">
                                    <?php echo get_the_date(); ?>
                                </div>
                            </div>
                        </a>
                        
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>

                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                        <a href="<?php echo home_url('/noticias/'); ?>" class="inline-flex items-center text-sm font-bold tracking-wider text-sky-600 hover:text-sky-700 uppercase transition-colors">
                            Ver todas las Noticias
                            <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
        
        <?php endwhile; endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>