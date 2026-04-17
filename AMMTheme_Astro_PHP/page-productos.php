<?php 
/* Template Name: Catálogo de Productos Dinámico */
get_header(); 
?>
<style>
        .slide-item.active .slide-text{opacity:1!important;transform:translateY(0)!important}
        @keyframes kenBurnsOut{0%{transform:scale(1.1)}to{transform:scale(1)}}
        .slide-item.active .zoom-bg{animation:kenBurnsOut 8s ease-out forwards;will-change:transform}
        .active-service{box-shadow:0 10px 30px #06b6d41a}
        .clients-simple-marquee{animation:marquee 40s linear infinite}
        @keyframes marquee{0%{transform:translate(0)}to{transform:translate(-50%)}}

        /* ANIMACIÓN DINÁMICA DE TÍTULOS LARGOS */
        @keyframes scroll-oscillation {
            0%, 15% { transform: translateX(0); }
            45%, 55% { transform: translateX(var(--scroll-dist)); }
            85%, 100% { transform: translateX(0); }
        }
        .animate-scroll-title {
            animation: scroll-oscillation var(--scroll-duration) ease-in-out infinite;
        }
        /* Máscara de desvanecimiento for los bordes del título */
        .title-mask-edges {
            -webkit-mask-image: linear-gradient(to right, black 90%, transparent 100%);
            mask-image: linear-gradient(to right, black 90%, transparent 100%);
        }

        /* FIX GENERAL: Ajuste for el Admin Bar de WordPress */
        body.admin-bar #main-navbar { top: 32px; }
        body.admin-bar .sticky.top-20 { top: 112px !important; }
        .filter-pill.active-pill {
            color: #076d7b !important; 
            border-color: #54a6b6 !important; 
            background-color: #ffffff !important;
            box-shadow: 0 0 0 1px #54a6b6 !important; 
            transition: all 0.3s ease;
        }
        
        @media screen and (max-width: 782px) {
            body.admin-bar #main-navbar { top: 46px; }
            body.admin-bar .sticky.top-20 { top: 126px !important; }
        }
    </style>

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

    <section id="main-filter-bar" class="sticky top-20 z-40 bg-white/90 backdrop-blur-xl border-y border-slate-100 shadow-sm" data-astro-cid-d326op7z>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4" data-astro-cid-d326op7z>
            <div class="flex flex-col lg:grid lg:grid-cols-[1fr_320px] items-center gap-8 lg:gap-12" data-astro-cid-d326op7z>
                <div class="w-full min-w-0 relative group order-1" data-astro-cid-d326op7z>
                    <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-hide pr-16 w-full" id="brand-filters" data-astro-cid-d326op7z>
                        <button class="filter-pill active-pill px-6 py-2.5 rounded-full border-2 border-slate-100 text-[11px] font-black uppercase tracking-widest text-slate-500 bg-white hover:border-sky-400 hover:text-sky-600 whitespace-nowrap transition-all shadow-sm" data-brand="*" data-astro-cid-d326op7z> Todas las Marcas </button>
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
                        <option value="Consumibles" data-astro-cid-d326op7z>Consumibles</option>
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

    <section class="pt-10 pb-20 relative bg-slate-50/50" data-astro-cid-d326op7z>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-astro-cid-d326op7z>
            
            <div id="counter-bar" class="sticky z-30 flex items-center mb-8 py-3 transition-all duration-200 -mx-4 px-4 sm:mx-0 sm:px-0" data-astro-cid-d326op7z>
                <div class="bg-white border border-slate-200 shadow-sm rounded-full px-4 py-1.5 text-[10px] sm:text-[11px] font-bold text-slate-500 uppercase tracking-widest flex items-center gap-2" data-astro-cid-d326op7z>
                    <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.5)]" data-astro-cid-d326op7z></div>
                    Productos Encontrados <span id="results-count" class="text-sky-600 font-black text-sm ml-1" data-astro-cid-d326op7z>0</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="product-grid" data-astro-cid-d326op7z>
                
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        
                        $html_content = apply_filters('the_content', get_the_content());
                        
                        $dom = new DOMDocument();
                        libxml_use_internal_errors(true);
                        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html_content);
                        libxml_clear_errors();
                        $xpath = new DOMXPath($dom);

                        $productos = $xpath->query("//div[contains(@class, 'product-item')]");

                        if ($productos->length > 0) {
                            foreach ($productos as $prod) {
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
                                    'Accesorios' => 'Accesorios', 'Consumibles' => 'Consumibles', 'Personal' => 'Escáneres Personales',
                                    'Oficina' => 'Escáneres de Oficina', 'Departamental' => 'Escáneres Departamentales',
                                    'Produccion' => 'Escáneres de Producción', 'Alimentacion' => 'Alimentación crítica',
                                    'Racks' => 'Racks y gabinetes'
                                ];
                                foreach ($cat_map as $key => $val) {
                                    if (strpos($clases, $key) !== false) { $categoria = $val; break; }
                                }

                                $a = $xpath->query(".//a", $prod)->item(0);
                                $has_link = false;
                                $link = '#';
                                $descripcion_tarjeta = 'Ver especificaciones operativas.'; 
                                
                                if ($a) {
                                    $link_href = $a->getAttribute('href');
                                    if (!empty($link_href) && $link_href !== '#') {
                                        $has_link = true;
                                        $link = str_replace('[url_sitio]', home_url(), $link_href);
                                    }
                                } 
                                
                                if (!$has_link) {
                                    $spans = $xpath->query(".//p/span", $prod);
                                    if ($spans->length > 0) {
                                        $descripcion_tarjeta = '';
                                        foreach ($spans as $index => $span) {
                                            $descripcion_tarjeta .= esc_html(trim($span->nodeValue));
                                            if ($index < $spans->length - 1) {
                                                $descripcion_tarjeta .= '<br/>';
                                            }
                                        }
                                    }
                                }

                                $img = $xpath->query(".//img", $prod)->item(0);
                                $img_src = $img ? $img->getAttribute('src') : get_template_directory_uri().'/images/default.jpg';
                                $img_src = str_replace('[url_tema]', get_template_directory_uri(), $img_src);
                                $img_src = str_replace('[url_sitio]', home_url(), $img_src);

                                $b = $xpath->query(".//p/b", $prod)->item(0);
                                $titulo = $b ? $b->nodeValue : 'Equipo Empresarial';

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
                                            
                                            <div class="overflow-hidden w-full mb-2 title-mask-edges" data-astro-cid-tjdfhdqb>
                                                <h3 class="product-title-anim text-xl font-black font-['Outfit'] text-slate-900 group-hover:text-sky-600 transition-colors inline-block whitespace-nowrap" data-astro-cid-tjdfhdqb>
                                                    <?php echo esc_html($titulo); ?>
                                                </h3>
                                            </div>
                                            
                                            <p class="text-sm text-slate-500 font-medium leading-relaxed line-clamp-3 mb-6" data-astro-cid-tjdfhdqb>
                                                <?php echo $descripcion_tarjeta; ?>
                                            </p>
                                            
                                            <div class="flex items-center justify-between border-t border-gray-100 pt-5" data-astro-cid-tjdfhdqb>
                                                <?php if($has_link): ?>
                                                    <a href="<?php echo esc_url($link); ?>" class="group/btn inline-flex items-center text-sm font-bold text-sky-600 hover:text-sky-700 transition-colors" data-astro-cid-tjdfhdqb> DETALLES </a>
                                                <?php else: ?>
                                                    <span class="inline-flex items-center text-sm font-bold opacity-0 pointer-events-none" data-astro-cid-tjdfhdqb> DETALLES </span>
                                                <?php endif; ?>
                                                
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
    const resultsCountEl = document.getElementById('results-count'); 

    // --- LÓGICA DE APILAMIENTO DINÁMICO (CONTADOR DEBAJO DEL FILTRO) ---
    const syncStickyCounter = () => {
        const filterBar = document.getElementById('main-filter-bar');
        const counterBar = document.getElementById('counter-bar');
        if (filterBar && counterBar) {
            // Obtenemos la posición 'top' dinámica de la barra de filtros (incluyendo margen de WordPress si existe)
            const filterTop = parseInt(window.getComputedStyle(filterBar).top, 10) || 0;
            // Sumamos la altura de la barra para que el contador quede exactamente debajo
            counterBar.style.top = (filterTop + filterBar.offsetHeight - 1) + 'px';
        }
    };
    window.addEventListener('resize', syncStickyCounter);
    
    // Verificamos cambios de tamaño durante el scroll (por barras de navegadores móviles)
    let lastFilterHeight = 0;
    window.addEventListener('scroll', () => {
        const filterBar = document.getElementById('main-filter-bar');
        if(filterBar && filterBar.offsetHeight !== lastFilterHeight) {
            syncStickyCounter();
            lastFilterHeight = filterBar.offsetHeight;
        }
    }, { passive: true });

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

        if (resultsCountEl) {
            resultsCountEl.textContent = visibleCount;
        }

        if (visibleCount === 0) {
            noResults?.classList.remove('hidden');
        } else {
            noResults?.classList.add('hidden');
        }
    };

    brandPills.forEach(btn => {
        btn.addEventListener('click', () => {
            activeBrand = btn.getAttribute('data-brand');
            brandPills.forEach(p => {
                p.classList.remove('active-pill');
                p.classList.add('text-slate-500', 'border-slate-100', 'bg-white');
            });
            btn.classList.add('active-pill');
            btn.classList.remove('text-slate-500', 'border-slate-100');
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
            const decodedHash = decodeURIComponent(hash).replace(/\s+/g, '-');
            const targetPill = Array.from(brandPills).find(p => 
                p.getAttribute('data-brand').toLowerCase() === decodedHash.toLowerCase()
            );

            if (targetPill) {
                targetPill.click();
                document.getElementById('product-grid')?.scrollIntoView({ behavior: 'smooth' });
            } else {
                filterProducts();
            }
        } else {
            filterProducts();
        }
    };

    const initTitleScroll = () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const title = entry.target.querySelector('.product-title-anim');
                if(!title) return;
                
                const container = title.parentElement;
                const scrollDist = container.clientWidth - title.scrollWidth;
                
                if (scrollDist < -2) { 
                    if (entry.isIntersecting) {
                        title.style.setProperty('--scroll-dist', scrollDist + 'px');
                        const duration = Math.max(5, Math.abs(scrollDist) / 20) + 's';
                        title.style.setProperty('--scroll-duration', duration);
                        title.classList.add('animate-scroll-title');
                    } else {
                        title.classList.remove('animate-scroll-title');
                    }
                } else {
                    title.style.textOverflow = 'ellipsis';
                    title.style.overflow = 'hidden';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.product-card').forEach(card => observer.observe(card));
    };

    filterProducts();

    setTimeout(() => {
        handleUrlHash();
        initTitleScroll(); 
        syncStickyCounter(); // Aseguramos el cálculo inicial del apilamiento
    }, 300);

});
</script>

<?php get_footer(); ?>