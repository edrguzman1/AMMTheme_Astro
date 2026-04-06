<?php
function ammtheme_scripts() {
    // Cargar el CSS principal of Astro
    wp_enqueue_style('amm-astro-style', get_template_directory_uri() . '/_astro/Footer.COI5Y6L1.css', array(), '1.0');
    
    // Cargar el style.css of WordPress
    wp_enqueue_style('amm-main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ammtheme_scripts');
?>