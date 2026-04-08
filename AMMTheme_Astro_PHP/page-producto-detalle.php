<?php 
/* Template Name: Detalle de Producto Dinámico */
get_header(); 
?>

<style>
.product-gallery{position:relative;top:0}
@media(min-width:1024px){.product-gallery{position:sticky;top:120px}}
.custom-scrollbar::-webkit-scrollbar{height:6px}
.custom-scrollbar::-webkit-scrollbar-track{background:transparent;border-radius:8px}
.custom-scrollbar::-webkit-scrollbar-thumb{background:#e2e8f0;border-radius:8px}
.custom-scrollbar::-webkit-scrollbar-thumb:hover{background:#cbd5e1}
.custom-scrollbar{scrollbar-width:thin;scrollbar-color:#e2e8f0 transparent}
</style>

<main class="pt-32 pb-20 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                
                $html_content = apply_filters('the_content', get_the_content());
                
                $dom = new DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html_content);
                libxml_clear_errors();
                $xpath = new DOMXPath($dom);

                // 1. Extraer Título y Descripción
                $title_node = $xpath->query("//h1[contains(@class, 'product-title')]")->item(0);
                $titulo = $title_node ? $title_node->nodeValue : get_the_title();

                $desc_node = $xpath->query("//p[contains(@class, 'product-description')]")->item(0);
                $descripcion = $desc_node ? $desc_node->nodeValue : '';

                // 2. Extraer Galería de Imágenes
                $img_main_node = $xpath->query("//div[contains(@class, 'main-image-container')]//img")->item(0);
                $img_main = $img_main_node ? $img_main_node->getAttribute('src') : get_template_directory_uri().'/images/default.jpg';
                $img_main = str_replace(['[url_sitio]', '[url_tema]'], [home_url(), get_template_directory_uri()], $img_main);

                $thumbs_nodes = $xpath->query("//div[contains(@class, 'thumbnail-grid')]//img");
                
                // 3. Extraer PDF
                $pdf_node = $xpath->query("//div[contains(@class, 'resource-section')]//a")->item(0);
                $pdf_link = $pdf_node ? $pdf_node->getAttribute('href') : '#';
                $pdf_link = str_replace(['[url_sitio]', '[url_tema]'], [home_url(), get_template_directory_uri()], $pdf_link);

                // 4. Extraer Secciones de Contenido (Características, etc.)
                $content_sections = $xpath->query("//div[contains(@class, 'content-section')]");

                // 5. Extraer Especificaciones
                $specs_cards = $xpath->query("//div[contains(@class, 'spec-card')]");
        ?>

        <nav class="flex mb-12" aria-label="Breadcrumb">
            <ol class="inline-flex items-center uppercase tracking-[0.2em] font-black text-[10px] space-x-2 text-slate-400">
                <li class="inline-flex items-center"><a href="<?php echo home_url('/'); ?>" class="hover:text-sky-600 transition-colors">Inicio</a></li>
                <li class="flex items-center space-x-2"><span>/</span><a href="<?php echo home_url('/productos/'); ?>" class="hover:text-sky-600 transition-colors">Catálogo Hardware</a></li>
                <li class="flex items-center space-x-2" aria-current="page"><span>/</span><span class="text-sky-600 font-bold"><?php echo esc_html($titulo); ?></span></li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            <div class="product-gallery group">
                <div class="relative aspect-square overflow-hidden rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-center p-8 group/main">
                    <img id="main-product-image" src="<?php echo esc_url($img_main); ?>" alt="<?php echo esc_attr($titulo); ?>" class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover/main:scale-105">
                </div>
                
                <?php if($thumbs_nodes->length > 0): ?>
                <div class="relative mt-6">
                    <div class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory custom-scrollbar">
                        <?php 
                        $first = true;
                        foreach($thumbs_nodes as $thumb): 
                            $t_src = $thumb->getAttribute('src');
                            $t_src = str_replace(['[url_sitio]', '[url_tema]'], [home_url(), get_template_directory_uri()], $t_src);
                            $border_class = $first ? 'border-sky-600 bg-blue-50/30 shadow-inner' : 'border-slate-100 hover:border-slate-300';
                        ?>
                        <button class="thumb-btn flex-shrink-0 w-20 sm:w-24 aspect-square snap-start relative rounded-xl border-2 transition-all duration-300 overflow-hidden bg-white p-2 <?php echo $border_class; ?>" data-image-url="<?php echo esc_url($t_src); ?>">
                            <img src="<?php echo esc_url($t_src); ?>" alt="Vista miniatura" class="w-full h-full object-contain">
                        </button>
                        <?php $first = false; endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="space-y-8">
                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-sky-50 text-sky-600 text-xs font-bold tracking-wider uppercase mb-4">Equipo Empresarial</span>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4"><?php echo esc_html($titulo); ?></h1>
                    <div class="text-lg text-gray-600 leading-relaxed italic"><p class="mb-4"><?php echo esc_html($descripcion); ?></p></div>
                </div>

                <div class="space-y-8 pt-4 border-t border-gray-100 mt-8">
                    <?php 
                    if($content_sections->length > 0) {
                        foreach($content_sections as $section) {
                            $sec_title = $xpath->query(".//h3", $section)->item(0);
                            $title_text = $sec_title ? $sec_title->nodeValue : 'Información';
                            
                            echo '<div class="mb-4">';
                            echo '<h3 class="text-xl font-bold text-gray-900 flex items-center gap-2 mb-4"><i class="fas fa-layer-group text-sky-600 text-lg"></i> ' . esc_html($title_text) . '</h3>';
                            
                            $sec_ul = $xpath->query(".//ul", $section)->item(0);
                            $sec_p = $xpath->query(".//p", $section)->item(0);

                            if ($sec_ul) {
                                echo '<ul class="grid grid-cols-1 md:grid-cols-2 gap-4">';
                                $lis = $xpath->query(".//li", $sec_ul);
                                foreach($lis as $li) {
                                    $li_text = trim(strip_tags($li->nodeValue));
                                    if(!empty($li_text)){
                                        echo '<li class="flex items-start gap-3 text-gray-600 bg-gray-50/50 p-2 rounded-lg hover:bg-sky-50/50 transition-colors"><i class="fas fa-check-circle text-[#00a651] mt-1"></i> <span class="text-sm">'.esc_html($li_text).'</span></li>';
                                    }
                                }
                                echo '</ul>';
                            } elseif ($sec_p) {
                                $p_html = '';
                                foreach($sec_p->childNodes as $child) { $p_html .= $dom->saveHTML($child); }
                                echo '<div class="prose prose-slate text-gray-600 leading-relaxed max-w-none mb-6"><p>' . wp_kses_post($p_html) . '</p></div>';
                            }
                            echo '</div>';
                        }
                    }
                    ?>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-100">
                    <a href="<?php echo home_url('/#contacto'); ?>" class="flex-1 text-center bg-sky-600 hover:bg-sky-700 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform hover:-translate-y-1">SOLICITAR COTIZACIÓN</a>
                    <?php if($pdf_link != '#'): ?>
                    <a href="<?php echo esc_url($pdf_link); ?>" target="_blank" rel="noopener noreferrer" class="flex-1 text-center flex justify-center items-center gap-2 bg-gray-50 hover:bg-gray-100 text-gray-700 font-bold px-4 py-4 rounded-xl border border-gray-200 transition-all font-['Outfit']">
                        <i class="fas fa-file-pdf text-red-500 text-xl"></i> VER FICHA TÉCNICA
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if($specs_cards->length > 0): ?>
        <section class="mt-20 pt-20 border-t border-gray-100">
            <div class="max-w-3xl mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Especificaciones Técnicas</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                foreach($specs_cards as $card): 
                    $h4 = $xpath->query(".//h4", $card)->item(0);
                    $spec_title = $h4 ? trim(strip_tags($h4->nodeValue)) : 'Detalle';
                    $icon_node = $xpath->query(".//i", $card)->item(0);
                    $icon_class = $icon_node ? $icon_node->getAttribute('class') : 'fas fa-cogs';
                ?>
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-sky-100 transition-colors">
                    <p class="text-xs font-bold text-sky-600 uppercase tracking-widest mb-4 border-b border-sky-50 pb-2 flex items-center gap-2">
                        <i class="<?php echo esc_attr($icon_class); ?>"></i> <?php echo esc_html($spec_title); ?>
                    </p>
                    <ul class="space-y-3 text-sm text-gray-700">
                        <?php 
                        $lis = $xpath->query(".//li", $card);
                        foreach($lis as $li): 
                            $li_html = '';
                            foreach($li->childNodes as $child) { 
                                // Omitir iconos viejos
                                if($child->nodeName != 'i') $li_html .= $dom->saveHTML($child); 
                            }
                        ?>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-cyan-400 mt-1 flex-shrink-0"></i>
                            <span class="leading-relaxed"><?php echo wp_kses_post($li_html); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <section class="mt-32 p-12 bg-blue-50 rounded-3xl text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">¿Buscas una solución a medida?</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Somos expertos en la integración de hardware corporativo. Contáctanos para recibir asesoría personalizada sobre qué equipo se adapta mejor a tu flujo operativo.</p>
            <a href="<?php echo home_url('/#contacto'); ?>" class="inline-block bg-sky-600 text-white px-10 py-4 rounded-2xl font-bold hover:shadow-xl transition-all shadow-lg transform hover:-translate-y-0.5">Escríbenos hoy mismo</a>
        </section>

        <?php
            endwhile;
        else:
            echo '<p class="text-center py-20 text-xl">No se encontró información para este equipo.</p>';
        endif; 
        ?>
    </div>
</main>

<script>
function setupGallery() {
    const mainImg = document.getElementById('main-product-image');
    const buttons = document.querySelectorAll('.thumb-btn');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            const newSrc = btn.getAttribute('data-image-url');
            
            // 1. Cambio of imagen principal with transición
            if (mainImg) {
                mainImg.style.opacity = '0';
                setTimeout(() => {
                    mainImg.src = newSrc;
                    mainImg.style.opacity = '1';
                }, 150);
            }

            // 2. Gestión of clases visuales (border and background)
            buttons.forEach(b => {
                b.classList.remove('border-sky-600', 'bg-blue-50/30', 'shadow-inner');
                b.classList.add('border-slate-100');
            });
            btn.classList.add('border-sky-600', 'bg-blue-50/30', 'shadow-inner');
            btn.classList.remove('border-slate-100');

            // 3. CENTRADO AUTOMÁTICO: Desplazar la fila to centrar el botón seleccionado
            btn.scrollIntoView({
                behavior: 'smooth', // Animación fluida
                block: 'nearest',   // Evita saltos verticales in la página
                inline: 'center'    // Centra el elemento horizontalmente in su contenedor
            });
        });
    });
}
setupGallery();
</script>

<?php get_footer(); ?>