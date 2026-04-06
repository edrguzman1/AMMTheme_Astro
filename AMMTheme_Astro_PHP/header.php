<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="AM&M S.A. DE C.V. - Integración Tecnológica Radical">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/favicon.svg">
    <meta name="generator" content="Astro v6.0.8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <style>
        .slide-item.active .slide-text{opacity:1!important;transform:translateY(0)!important}
        @keyframes kenBurnsOut{0%{transform:scale(1.1)}to{transform:scale(1)}}
        .slide-item.active .zoom-bg{animation:kenBurnsOut 8s ease-out forwards;will-change:transform}
        .active-service{box-shadow:0 10px 30px #06b6d41a}
        .clients-simple-marquee{animation:marquee 40s linear infinite}
        @keyframes marquee{0%{transform:translate(0)}to{transform:translate(-50%)}}
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class("bg-white text-slate-700 font-sans antialiased selection:bg-cyan-500 selection:text-white relative"); ?>>
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-[-1]">
        <div class="absolute -top-[40%] text-slate-900 opacity-[0.02]">
            <svg width="100vw" height="100vh" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse">
                        <path d="M 100 0 L 0 0 0 100" fill="none" stroke="currentColor" stroke-width="1"></path>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"></rect>
            </svg>
        </div>
        <div class="absolute top-0 left-1/4 w-[60vw] h-[60vw] rounded-full bg-sky-300/20 mix-blend-multiply blur-[120px] animate-[pulse_8s_ease-in-out_infinite]"></div>
        <div class="absolute bottom-0 right-1/4 w-[50vw] h-[50vw] rounded-full bg-teal-200/30 mix-blend-multiply blur-[120px] animate-[pulse_10s_ease-in-out_infinite_reverse]"></div>
    </div>

    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white border-b border-slate-200" id="main-navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="<?php echo home_url('/'); ?>" class="flex items-center group relative z-10 h-full py-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="AM&M Logo" class="h-10 md:h-12 w-auto object-contain group-hover:opacity-80 transition-opacity">
                </a>
                <nav class="hidden lg:flex space-x-6 xl:space-x-8 items-center ml-auto mr-8 xl:mr-12" id="desktop-nav">
                    <a href="#nosotros" class="nav-link text-[12px] xl:text-[13px] font-bold text-slate-600 hover:text-sky-600 transition-colors relative group py-2 flex flex-col items-center" data-href="#nosotros"> <span class="relative z-10 uppercase tracking-wider">Nosotros</span> <span class="nav-underline"></span> </a>
                    <a href="#productos" class="nav-link text-[12px] xl:text-[13px] font-bold text-slate-600 hover:text-sky-600 transition-colors relative group py-2 flex flex-col items-center" data-href="#productos"> <span class="relative z-10 uppercase tracking-wider">Productos</span> <span class="nav-underline"></span> </a>
                    <a href="#soluciones" class="nav-link text-[12px] xl:text-[13px] font-bold text-slate-600 hover:text-sky-600 transition-colors relative group py-2 flex flex-col items-center" data-href="#soluciones"> <span class="relative z-10 uppercase tracking-wider">Soluciones</span> <span class="nav-underline"></span> </a>
                    <a href="#servicios" class="nav-link text-[12px] xl:text-[13px] font-bold text-slate-600 hover:text-sky-600 transition-colors relative group py-2 flex flex-col items-center" data-href="#servicios"> <span class="relative z-10 uppercase tracking-wider">Consultoría</span> <span class="nav-underline"></span> </a>
                    <a href="noticias" class="nav-link text-[12px] xl:text-[13px] font-bold text-slate-600 hover:text-sky-600 transition-colors relative group py-2 flex flex-col items-center" data-href="noticias"> <span class="relative z-10 uppercase tracking-wider">Noticias</span> <span class="nav-underline"></span> </a>
                    <a href="#contacto" class="nav-link text-[12px] xl:text-[13px] font-bold text-slate-600 hover:text-sky-600 transition-colors relative group py-2 flex flex-col items-center" data-href="#contacto"> <span class="relative z-10 uppercase tracking-wider">Contacto</span> <span class="nav-underline"></span> </a>
                </nav>
                <div class="hidden lg:flex items-center justify-end animate-on-scroll delay-300">
                    <a href="https://ammstore.com.mx" target="_blank" rel="noopener noreferrer" class="relative inline-flex items-center justify-center px-6 py-2.5 overflow-hidden font-bold text-white bg-sky-500 hover:bg-cyan-500 rounded-lg shadow-[0_4px_15px_rgba(14,165,233,0.3)] hover:shadow-[0_6px_20px_rgba(6,182,212,0.4)] transition-all group">
                        <span class="relative flex items-center whitespace-nowrap text-[12px] uppercase tracking-widest">Tienda En Línea <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg> </span>
                    </a>
                </div>
                <button id="mobile-menu-btn" class="lg:hidden flex flex-col items-center justify-center w-8 h-8 focus:outline-none z-50">
                    <span class="block w-6 h-0.5 bg-slate-900 mb-1.5 transition-transform duration-300 origin-center"></span>
                    <span class="block w-6 h-0.5 bg-slate-900 mb-1.5 transition-transform duration-300 origin-center"></span>
                    <span class="block w-6 h-0.5 bg-slate-900 transition-transform duration-300 origin-center"></span>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="lg:hidden fixed inset-x-0 top-[72px] bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-2xl transition-all duration-300 ease-in-out opacity-0 translate-y-[-10px] pointer-events-none z-40 overflow-hidden">
            <div class="px-6 py-8 flex flex-col space-y-6">
                <a href="#nosotros" class="mobile-link text-slate-700 font-bold uppercase tracking-widest text-sm hover:text-sky-600 transition-colors flex items-center justify-between group"> Nosotros <svg class="w-4 h-4 text-slate-300 group-hover:text-sky-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path> </svg> </a>
                <a href="#productos" class="mobile-link text-slate-700 font-bold uppercase tracking-widest text-sm hover:text-sky-600 transition-colors flex items-center justify-between group"> Productos <svg class="w-4 h-4 text-slate-300 group-hover:text-sky-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path> </svg> </a>
                <a href="#soluciones" class="mobile-link text-slate-700 font-bold uppercase tracking-widest text-sm hover:text-sky-600 transition-colors flex items-center justify-between group"> Soluciones <svg class="w-4 h-4 text-slate-300 group-hover:text-sky-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path> </svg> </a>
                <a href="#servicios" class="mobile-link text-slate-700 font-bold uppercase tracking-widest text-sm hover:text-sky-600 transition-colors flex items-center justify-between group"> Consultoría <svg class="w-4 h-4 text-slate-300 group-hover:text-sky-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path> </svg> </a>
                <a href="noticias" class="mobile-link text-slate-700 font-bold uppercase tracking-widest text-sm hover:text-sky-600 transition-colors flex items-center justify-between group"> Noticias <svg class="w-4 h-4 text-slate-300 group-hover:text-sky-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path> </svg> </a>
                <a href="#contacto" class="mobile-link text-slate-700 font-bold uppercase tracking-widest text-sm hover:text-sky-600 transition-colors flex items-center justify-between group"> Contacto <svg class="w-4 h-4 text-slate-300 group-hover:text-sky-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path> </svg> </a>
                <div class="pt-6 border-t border-slate-100">
                    <a href="https://ammstore.com.mx" target="_blank" class="flex items-center justify-center w-full py-4 bg-sky-500 text-white font-black rounded-xl uppercase tracking-widest text-[11px] shadow-lg shadow-sky-500/20 active:scale-95 transition-all"> Tienda en Línea </a>
                </div>
            </div>
        </div>
        <script type="module">const r=document.getElementById("main-navbar");window.addEventListener("scroll",()=>{window.scrollY>20?(r?.classList.remove("bg-white"),r?.classList.add("bg-white/80","backdrop-blur-xl","shadow-sm","border-slate-200/60")):(r?.classList.add("bg-white"),r?.classList.remove("bg-white/80","backdrop-blur-xl","shadow-sm","border-slate-200/60"))});const c=document.getElementById("mobile-menu-btn"),a=document.getElementById("mobile-menu"),e=c?.querySelectorAll("span");let l=!1;c?.addEventListener("click",()=>{l=!l,l?(a?.classList.remove("opacity-0","translate-y-[-10px]","pointer-events-none"),document.body.style.overflow="hidden",e&&e.length===3&&(e[0].style.transform="translateY(8px) rotate(45deg)",e[1].style.opacity="0",e[2].style.transform="translateY(-8px) rotate(-45deg)")):(a?.classList.add("opacity-0","translate-y-[-10px]","pointer-events-none"),document.body.style.overflow="",e&&e.length===3&&(e[0].style.transform="none",e[1].style.opacity="1",e[2].style.transform="none"))});a?.querySelectorAll("a").forEach(i=>{i.addEventListener("click",()=>{l=!1,a?.classList.add("opacity-0","translate-y-[-10px]","pointer-events-none"),document.body.style.overflow="",e&&e.length===3&&(e[0].style.transform="none",e[1].style.opacity="1",e[2].style.transform="none")})});const b=window.location.pathname==="/";if(b){const i=document.querySelectorAll(".nav-link"),d=Array.from(i).map(s=>{const n=s.getAttribute("href");if(!n)return null;const o=n.split("#")[1];return o?document.getElementById(o):null}),m={root:null,threshold:.1,rootMargin:"-20% 0px -40% 0px"},y=new IntersectionObserver(s=>{s.forEach(n=>{const o=n.target.getAttribute("id");if(!o)return;document.querySelectorAll(".nav-link, .mobile-link").forEach(t=>{t.getAttribute("href")?.includes(`#${o}`)&&(n.isIntersecting?(t.classList.add("text-sky-600","active"),t.classList.contains("mobile-link")&&t.classList.add("border-l-4","border-sky-500","pl-4","bg-sky-50/50")):(t.classList.remove("text-sky-600","active"),t.classList.contains("mobile-link")&&t.classList.remove("border-l-4","border-sky-500","pl-4","bg-sky-50/50")))})})},m);d.forEach(s=>{s&&y.observe(s)})}</script>
    </header>

    <main id="top" class="relative pt-20">