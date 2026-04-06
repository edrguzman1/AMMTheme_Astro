<?php 
/* Template Name: Catálogo de Productos Dinámico */
get_header(); 
?>

<main class="pt-24 lg:pt-32" data-astro-cid-d326op7z>
    <section class="relative py-16 overflow-hidden" data-astro-cid-d326op7z>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-gradient-to-b from-sky-50 to-white -z-10 opacity-60" data-astro-cid-d326op7z></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left relative z-10" data-astro-cid-d326op7z>
            <div class="flex flex-col md:flex-row items-end justify-between gap-8 animate-on-scroll" data-astro-cid-d326op7z>
                <div class="max-w-2xl" data-astro-cid-d326op7z>
                    <nav class="flex items-center space-x-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-6" data-astro-cid-d326op7z>
                        <a href="<?php echo home_url('/'); ?>" class="hover:text-sky-600 transition-colors" data-astro-cid-d326op7z>Inicio</a>
                        <span data-astro-cid-d326op7z>/</span>
                        <span class="text-sky-600" data-astro-cid-d326op7z>Catálogo Hardware</span>
                    </nav>
                    <h1 class="text-5xl lg:text-7xl font-black font-['Outfit'] text-slate-900 mb-6 tracking-tight leading-none uppercase" data-astro-cid-d326op7z> 
                        Hardware <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-cyan-500" data-astro-cid-d326op7z>Corporativo</span>
                    </h1>
                    <p class="text-lg text-slate-600 font-medium leading-relaxed max-w-xl" data-astro-cid-d326op7z> Contamos con las mejores marcas y equipos especializados para asegurar la continuidad y éxito operativo de su negocio. </p>
                </div>
                <div class="w-full md:w-80 group" data-astro-cid-d326op7z>
                    <div class="relative bg-white rounded-2xl border-2 border-slate-100 p-1 flex items-center shadow-lg group-hover:border-sky-400 transition-all focus-within:border-sky-500 focus-within:ring-4 focus-within:ring-sky-500/10" data-astro-cid-d326op7z>
                        <div class="pl-4 text-slate-400 group-focus-within:text-sky-500 transition-colors" data-astro-cid-d326op7z>
                            <svg class="w-5 h-5 transform group-focus-within:scale-110 group-focus-within:-rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-d326op7z>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" data-astro-cid-d326op7z></path>
                            </svg>
                        </div>
                        <input type="text" id="product-search" placeholder="Buscar equipo por nombre..." class="w-full px-4 py-3 outline-none text-slate-700 font-bold placeholder:text-slate-300 bg-transparent text-sm" data-astro-cid-d326op7z>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sticky top-20 z-40 bg-white/90 backdrop-blur-xl border-y border-slate-100 shadow-sm" data-astro-cid-d326op7z>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4" data-astro-cid-d326op7z>
            <div class="flex flex-col lg:grid lg:grid-cols-[1fr_320px] items-center gap-8 lg:gap-12" data-astro-cid-d326op7z>
                <div class="w-full min-w-0 relative group order-1" data-astro-cid-d326op7z>
                    <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-hide pr-16 w-full" id="brand-filters" data-astro-cid-d326op7z>
                        <button class="filter-pill active px-6 py-2.5 rounded-full border-2 border-slate-100 text-[11px] font-black uppercase tracking-widest text-slate-500 bg-white hover:border-sky-400 hover:text-sky-600 whitespace-nowrap transition-all shadow-sm" data-brand="*" data-astro-cid-d326op7z> Todas las Marcas </button>
                        <button class="filter-pill px-6 py-2.5 rounded-full border-2 border-slate-100 text-[11px] font-black uppercase tracking-widest text-slate-500 bg-white hover:border-sky-400 hover:text-sky-600 whitespace-nowrap transition-all shadow-sm" data-brand="Alaris" data-astro-cid-d326op7z> Alaris </button>
                        <button class="filter-pill px-6 py-2.5 rounded-full border-2 border-slate-100 text-[11px] font-black uppercase tracking-widest text-slate-500 bg-white hover:border-sky-400 hover:text-sky-600 whitespace-nowrap transition-all shadow-sm" data-brand="Digital-Check" data-astro-cid-d326op7z> Digital Check </button>
                        <button class="filter-pill px-6 py-2.5 rounded-full border-2 border-slate-100 text-[11px] font-black uppercase tracking-widest text-slate-500 bg-white hover:border-sky-400 hover:text-sky-600 whitespace-nowrap transition-all shadow-sm" data-brand="Vertiv" data-astro-cid-d326op7z> Vertiv </button>
                    </div>
                </div>
                <div class="w-full lg:w-auto flex items-center justify-between lg:justify-end gap-3 border-t lg:border-t-0 pt-4 lg:pt-0 border-slate-100 order-2" data-astro-cid-d326op7z>
                    <label for="category-filter" class="text-[10px] font-black uppercase tracking-widest text-slate-400 whitespace-nowrap" data-astro-cid-d326op7z>Categoría:</label>
                    <select id="category-select" class="px-5 py-2.5 rounded-xl border-2 border-slate-100 bg-white text-[11px] font-black uppercase tracking-widest text-slate-700 outline-none focus:border-sky-500 transition-all cursor-pointer w-full lg:min-w-[200px] shadow-sm" data-astro-cid-d326op7z>
                        <option value="*" data-astro-cid-d326op7z>Todas las Categorías</option>
                        <option value="Accesorios" data-astro-cid-d326op7z>Accesorios</option>
                        <option value="Alimentación crítica" data-astro-cid-d326op7z>Alimentación crítica</option>
                        <option value="CheXpress" data-astro-cid-d326op7z>CheXpress</option>
                        <option value="Escáneres Departamentales" data-astro-cid-d326op7z>Escáneres Departamentales</option>
                        <option value="Escáneres Personales" data-astro-cid-d326op7z>Escáneres Personales</option>
                        <option value="Escáneres UV" data-astro-cid-d326op7z>Escáneres UV</option>
                        <option value="Escáneres de Oficina" data-astro-cid-d326op7z>Escáneres de Oficina</option>
                        <option value="Escáneres de Producción" data-astro-cid-d326op7z>Escáneres de Producción</option>
                        <option value="Especializados" data-astro-cid-d326op7z>Especializados</option>
                        <option value="Racks y gabinetes" data-astro-cid-d326op7z>Racks y gabinetes</option>
                        <option value="SmartSource Elite USB" data-astro-cid-d326op7z>SmartSource Elite USB</option>
                        <option value="SmartSource Professional" data-astro-cid-d326op7z>SmartSource Professional</option>
                        <option value="SmartSource Red" data-astro-cid-d326op7z>SmartSource Red</option>
                        <option value="TellerScan" data-astro-cid-d326op7z>TellerScan</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 relative bg-slate-50/50" data-astro-cid-d326op7z>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-astro-cid-d326op7z>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="product-grid" data-astro-cid-d326op7z>
                
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        
                        // Extraemos el HTML crudo
                        $html_content = apply_filters('the_content', get_the_content());
                        
                        // Creamos un DOM Document para leer el HTML viejo
                        $dom = new DOMDocument();
                        libxml_use_internal_errors(true);
                        // Aseguramos formato UTF-8
                        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html_content);
                        libxml_clear_errors();
                        $xpath = new DOMXPath($dom);

                        // Buscamos todas las tarjetas viejas (tienen la clase 'product-item')
                        $productos = $xpath->query("//div[contains(@class, 'product-item')]");

                        if ($productos->length > 0) {
                            foreach ($productos as $prod) {
                                // 1. Extraer las clases for adivinar la marca and categoría
                                $clases = $prod->getAttribute('class');
                                
                                $marca = 'General';
                                if (strpos($clases, 'DigitalCheck') !== false) $marca = 'Digital-Check';
                                if (strpos($clases, 'Kodak') !== false) $marca = 'Alaris';
                                if (strpos($clases, 'Vertiv') !== false) $marca = 'Vertiv';

                                $categoria = 'Hardware';
                                $cat_map = [
                                    'CheXpress' => 'CheXpress', 'TellerScan' => 'TellerScan', 'UVCheck' => 'Escáneres UV',
                                    'SmartNetwork' => 'SmartSource Red', 'SmartElite' => 'SmartSource Elite USB',
                                    'SmartPro' => 'SmartSource Professional', 'Specialty' => 'Especializados',
                                    'Accesorios' => 'Accesorios', 'Personal' => 'Escáneres Personales',
                                    'Oficina' => 'Escáneres de Oficina', 'Departamental' => 'Escáneres Departamentales',
                                    'Produccion' => 'Escáneres de Producción', 'Alimentacion' => 'Alimentación crítica',
                                    'Racks' => 'Racks y gabinetes'
                                ];
                                foreach ($cat_map as $key => $val) {
                                    if (strpos($clases, $key) !== false) { $categoria = $val; break; }
                                }

                                // 2. Extraer Enlace
                                $a = $xpath->query(".//a", $prod)->item(0);
                                $link = $a ? $a->getAttribute('href') : '#';
                                $link = str_replace('[url_sitio]', home_url(), $link);

                                // 3. Extraer Imagen
                                $img = $xpath->query(".//img", $prod)->item(0);
                                $img_src = $img ? $img->getAttribute('src') : get_template_directory_uri().'/images/default.jpg';
                                $img_src = str_replace('[url_tema]', get_template_directory_uri(), $img_src);
                                $img_src = str_replace('[url_sitio]', home_url(), $img_src);

                                // 4. Extraer Título (Está in una etiqueta <b> dentro del <p>)
                                $b = $xpath->query(".//p/b", $prod)->item(0);
                                $titulo = $b ? $b->nodeValue : 'Equipo Empresarial';

                                // Imprimimos la tarjeta nueva of Tailwind CSS combinada with los datos viejos
                                ?>
                                <div data-brand="<?php echo esc_attr($marca); ?>" data-category="<?php echo esc_attr($categoria); ?>" data-name="<?php echo esc_attr(strtolower($titulo)); ?>" class="product-item transition-all duration-500" data-astro-cid-d326op7z>
                                    <div class="product-card group relative flex flex-col bg-white rounded-3xl border border-slate-100 shadow-md hover:shadow-2xl hover:border-sky-400/30 transition-all duration-500 overflow-hidden animate-on-scroll h-full" data-astro-cid-tjdfhdqb>
                                        <div class="p-6 pb-2 flex justify-between items-start z-10" data-astro-cid-tjdfhdqb>
                                            <div class="flex flex-col gap-1" data-astro-cid-tjdfhdqb>
                                                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-sky-600/60 leading-none" data-astro-cid-tjdfhdqb><?php echo esc_html($categoria); ?></span>
                                                <h4 class="text-xs font-black text-slate-400 uppercase tracking-tighter" data-astro-cid-tjdfhdqb><?php echo esc_html($marca); ?></h4>
                                            </div>
                                            <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.5)]" data-astro-cid-tjdfhdqb></div>
                                        </div>
                                        <div class="relative flex-1 flex items-center justify-center p-8 pt-4 overflow-hidden min-h-[220px]" data-astro-cid-tjdfhdqb>
                                            <div class="absolute inset-0 bg-gradient-to-br from-sky-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700" data-astro-cid-tjdfhdqb></div>
                                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($titulo); ?>" class="max-w-full max-h-48 object-contain transform group-hover:scale-110 group-hover:-rotate-2 transition-transform duration-700 drop-shadow-xl p-4" data-astro-cid-tjdfhdqb>
                                        </div>
                                        <div class="p-6 pt-0 bg-gradient-to-t from-slate-50/80 to-transparent" data-astro-cid-tjdfhdqb>
                                            <h3 class="text-xl font-black font-['Outfit'] text-slate-900 mb-2 truncate group-hover:text-sky-600 transition-colors" data-astro-cid-tjdfhdqb><?php echo esc_html($titulo); ?></h3>
                                            <p class="text-sm text-slate-500 font-medium leading-relaxed line-clamp-2 mb-6" data-astro-cid-tjdfhdqb>
                                                Ver especificaciones operativas.
                                            </p>
                                            <div class="flex items-center justify-between border-t border-gray-100 pt-5" data-astro-cid-tjdfhdqb>
                                                <a href="<?php echo esc_url($link); ?>" class="group/btn inline-flex items-center text-sm font-bold text-sky-600 hover:text-sky-700 transition-colors" data-astro-cid-tjdfhdqb> DETALLES </a>
                                                <a href="<?php echo home_url('/#contacto'); ?>" class="text-[10px] font-extrabold text-gray-300 hover:text-cyan-500 tracking-widest uppercase transition-colors" data-astro-cid-tjdfhdqb> COTIZAR </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo '<div class="col-span-full text-center py-12"><p class="text-slate-500">Formato de HTML incorrecto in el editor.</p></div>';
                        }
                    endwhile;
                endif; 
                ?>
                
            </div>
            
            <div id="no-results" class="hidden text-center py-12">
                <i class="fas fa-search text-4xl text-slate-300 mb-4 block"></i>
                <h3 class="text-xl font-bold text-slate-700 mb-2">No se encontraron equipos</h3>
                <p class="text-slate-500">Intenta ajustar los filtros o el término de búsqueda.</p>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById('product-search');
    const categorySelect = document.getElementById('category-select');
    const brandPills = document.querySelectorAll('.filter-pill');
    const products = document.querySelectorAll('.product-item');
    const noResults = document.getElementById('no-results');

    let activeBrand = '*';
    let activeCategory = '*';
    let searchQuery = '';

    const filterProducts = () => {
        let visibleCount = 0;

        products.forEach(product => {
            const productBrand = product.getAttribute('data-brand');
            const productCategory = product.getAttribute('data-category');
            const productText = product.getAttribute('data-name');

            const matchBrand = activeBrand === '*' || activeBrand === productBrand;
            const matchCategory = activeCategory === '*' || activeCategory === productCategory;
            const matchSearch = searchQuery === '' || productText?.includes(searchQuery);

            if (matchBrand && matchCategory && matchSearch) {
                product.style.display = 'block';
                visibleCount++;
            } else {
                product.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResults?.classList.remove('hidden');
        } else {
            noResults?.classList.add('hidden');
        }
    };

    brandPills.forEach(pill => {
        pill.addEventListener('click', () => {
            brandPills.forEach(p => p.classList.remove('active', 'border-sky-400', 'text-sky-600'));
            pill.classList.add('active', 'border-sky-400', 'text-sky-600');
            activeBrand = pill.getAttribute('data-brand');
            activeCategory = '*';
            if(categorySelect) categorySelect.value = '*';
            filterProducts();
        });
    });

    if(categorySelect) {
        categorySelect.addEventListener('change', (e) => {
            activeCategory = e.target.value;
            filterProducts();
        });
    }

    if(searchInput) {
        searchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value.toLowerCase();
            filterProducts();
        });
    }

    const handleUrlHash = () => {
        const hash = window.location.hash.substring(1);
        if (hash) {
            // Decodificamos y normalizamos el hash (quitamos espacios or %20)
            const decodedHash = decodeURIComponent(hash).replace(/\s+/g, '-');
            
            // Buscamos el botón que coincida con el data-brand
            const targetPill = Array.from(brandPills).find(p => 
                p.getAttribute('data-brand').toLowerCase() === decodedHash.toLowerCase()
            );

            if (targetPill) {
                // Simulamos el clic para activar el filtro de Astro/Tailwind
                targetPill.click();
                // Scroll suave hacia los productos
                document.getElementById('product-grid')?.scrollIntoView({ behavior: 'smooth' });
            }
        }
    };

    // Ejecutamos con un pequeño delay para asegurar la carga completa
    setTimeout(handleUrlHash, 300);

});
</script>

<?php get_footer(); ?>