<?php
// AM&M Theme Functions
// -----------------------------------------------------------------------------

// Soporte básico del tema (thumbnails)
add_theme_support('post-thumbnails');

// 1. CARGAR ESTILOS Y SCRIPTS DEL TEMA
function ammtheme_scripts() {
    // Cargar el CSS compilado of Astro (Revisar that la ruta coincida in /_astro/)
    // Reemplaza 'Footer.COI5Y6L1.css' con el nombre exacto of tu archivo CSS generado
    wp_enqueue_style('amm-astro-style', get_template_directory_uri() . '/_astro/Footer.COI5Y6L1.css', array(), '1.0');
    
    // Cargar SweetAlert2 (desde CDN for garantizar that cargue without conflictos locales)
    wp_enqueue_style('amm-sweetalert-style', 'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css', array(), null);

    // Cargar el style.css principal of WordPress
    wp_enqueue_style('amm-main-style', get_stylesheet_uri());

    // Cargar SweetAlert2 JS (desde CDN)
    wp_enqueue_script('amm-sweetalert-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array(), null, true);

    // Cargar mailer.js original with FETCH (Asegúrate of that esté in la carpeta /js/)
    // Lo ponemos in el footer (true) and dependency with sweetalert for orden correcto
    wp_enqueue_script('amm-mailer', get_template_directory_uri() . '/js/mailer.js', array('jquery', 'amm-sweetalert-js'), time(), true);

    // Pasar la variable ammData with la URL of AJAX to mailer.js
    wp_localize_script('amm-mailer', 'ammData', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'ammtheme_scripts');

// -----------------------------------------------------------------------------
// 2. LOGICA DE PROCESAMIENTO DEL FORMULARIO DE CONTACTO (AJAX)
// -----------------------------------------------------------------------------

// Registrar la acción for usuarios logueados and no logueados
add_action('wp_ajax_enviar_contacto_amm', 'procesar_formulario_contacto');
add_action('wp_ajax_nopriv_enviar_contacto_amm', 'procesar_formulario_contacto');

function procesar_formulario_contacto() {
    // Sanitización exhaustiva of datos recibidos from the network
    $nombre   = sanitize_text_field($_POST['nombre']);
    $email    = sanitize_email($_POST['email']);
    $telefono = sanitize_text_field($_POST['telefono']);
    // 'interes' usually es un array if hay múltiples checkboxes
    $interes  = isset($_POST['interes']) ? sanitize_text_field($_POST['interes']) : 'No especificado';
    $mensaje  = sanitize_textarea_field($_POST['mensaje']);
    
    // Validación básica
    if(empty($nombre) || empty($email) || empty($mensaje)) {
        wp_send_json_error('Por favor, completa los campos requeridos (Nombre, Email y Mensaje).');
    }

    // Ruta to the email template (ContactTemplate.txt)
    // Asegúrate of that el archivo ContactTemplate.txt exista in /template/Contact/
    $template_path = get_template_directory() . '/template/Contact/ContactTemplate.txt';
    
    if ( ! file_exists($template_path) ) {
        wp_send_json_error('Error del servidor: No se encontró la plantilla of correo.');
    }

    // Leer el contenido of la plantilla
    $body = file_get_contents($template_path);
    $fecha_actual = wp_date('Y/m/d h:i A');

    // Reemplazar marcadores with datos reales
    $body = str_replace('{{nombre}}', $nombre, $body);
    $body = str_replace('{{correo}}', $email, $body);
    $body = str_replace('{{telefono}}', $telefono, $body);
    $body = str_replace('{{asunto}}', $interes, $body); 
    $body = str_replace('{{mensaje}}', nl2br($mensaje), $body); // Preservar saltos of línea
    $body = str_replace('{{fecha}}', $fecha_actual, $body);

    // Configuración of envío
    $to = 'cgarcia@amm.com.mx';
    $subject = 'Nueva Solicitud de Información: ' . $interes;

    // Cabeceras of correo (HTML format)
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: AM&M, S.A. DE C.V. <info@amm.com.mx>',
        'Cc: info@amm.com.mx', // Copia oculta opcional
        'Reply-To: ' . $nombre . ' <' . $email . '>'
    ];

    // Envío of correo
    $enviado = wp_mail($to, $subject, $body, $headers);

    // UPDATE TEMPORAL FOR XAMPP/LOCALHOST (No hay servidor of correo)
    // Comenta this línea when subas el Web site to hosting real
    $enviado = true; 

    // Responder with JSON according to success or failure
    if ($enviado) {
        wp_send_json_success('Tu mensaje ha sido enviado con éxito. Pronto nos pondremos in contacto contigo.');
    } else {
        wp_send_json_error('Hubo un error al enviar el correo. Por favor, intenta más tarde.');
    }
}

// -----------------------------------------------------------------------------
// 3. INYECCIÓN DE CSS EXCLUSIVO FOR SWEETALERT2 IN WP_HEAD
// -----------------------------------------------------------------------------
add_action('wp_head', 'amm_estilos_alerta_contacto');
function amm_estilos_alerta_contacto() {
    echo '<style>
        /* Blindaje total for SweetAlert2, ensuring alignment with Astro palette */
        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
            overflow: hidden !important;
        }
        /* Popup container custom styling */
        div:where(.swal2-container) div:where(.swal2-popup) {
            border-radius: 1.5rem !important;
            padding: 2.5rem 2rem !important;
            border: 1px solid #e2e8f0 !important; /* slate-200 */
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
            font-family: "Inter", sans-serif !important;
            background-color: #ffffff !important;
        }
        /* Title styling with Outfit font */
        div:where(.swal2-container) h2:where(.swal2-title) {
            font-family: "Outfit", sans-serif !important;
            font-weight: 900 !important;
            color: #0f172a !important; /* slate-900 */
            font-size: 2rem !important;
            margin-top: 1rem !important;
            line-height: 1.2 !important;
        }
        /* Text styling with Inter font */
        div:where(.swal2-container) div:where(.swal2-html-container) {
            color: #475569 !important; /* slate-600 */
            font-size: 1.125rem !important;
            margin-top: 0.5rem !important;
            font-weight: 500 !important;
        }
        /* UPDATE: "OK" Button custom styling matching corporate links */
        div:where(.swal2-container) button:where(.swal2-confirm) {
            background-color: #0284c7 !important; /* Sky 600 - Matches blog links for better palette integration */
            color: #ffffff !important;
            width: 100% !important;
            padding: 1rem !important;
            font-weight: 700 !important;
            border-radius: 0.75rem !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 1.125rem !important;
            letter-spacing: 0.025em !important;
            transition: all 0.3s ease !important;
            margin-top: 2rem !important;
            border: none !important;
            box-shadow: 0 10px 20px rgba(2, 132, 199, 0.2) !important; /* Sky 600 shadow */
        }
        /* UPDATE: Hover effect matching cyan accent palette */
        div:where(.swal2-container) button:where(.swal2-confirm):hover {
            background-color: #0891b2 !important; /* Cyan 600 for subtle hover distinction */
            transform: translateY(-4px) !important;
            box-shadow: 0 15px 30px rgba(8, 145, 178, 0.3) !important; /* Cyan 600 hover shadow */
        }
        /* Icon adjustment for proper centering and scaling */
        div:where(.swal2-icon) {
            width: 5em !important;
            height: 5em !important;
            margin: 0 auto !important;
        }
    </style>';
}
?>