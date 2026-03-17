<?php
// Pachamama Travel Theme Functions

// ── THEME SETUP ──
function pachamama_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'pachamama_setup');

// ── ENQUEUE ──
function pachamama_enqueue_styles() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=DM+Sans:wght@300;400;500;600&display=swap', array(), null);
    wp_enqueue_style('pachamama-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'pachamama_enqueue_styles');

function pachamama_enqueue_scripts() {
    wp_enqueue_script('pachamama-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'pachamama_enqueue_scripts');

// ── CLEAN UP ──
add_filter('show_admin_bar', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// ── CUSTOM POST TYPES ──

// Paquetes
function pachamama_register_paquetes() {
    register_post_type('paquete', array(
        'labels' => array(
            'name' => 'Paquetes',
            'singular_name' => 'Paquete',
            'add_new' => 'Agregar Paquete',
            'add_new_item' => 'Agregar Nuevo Paquete',
            'edit_item' => 'Editar Paquete',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-airplane',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'pachamama_register_paquetes');

// Testimonios
function pachamama_register_testimonios() {
    register_post_type('testimonio', array(
        'labels' => array(
            'name' => 'Testimonios',
            'singular_name' => 'Testimonio',
            'add_new' => 'Agregar Testimonio',
            'add_new_item' => 'Agregar Nuevo Testimonio',
            'edit_item' => 'Editar Testimonio',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'pachamama_register_testimonios');

// Destinos
function pachamama_register_destinos() {
    register_post_type('destino', array(
        'labels' => array(
            'name' => 'Destinos',
            'singular_name' => 'Destino',
            'add_new' => 'Agregar Destino',
            'add_new_item' => 'Agregar Nuevo Destino',
            'edit_item' => 'Editar Destino',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'pachamama_register_destinos');

// FAQs
function pachamama_register_faqs() {
    register_post_type('faq', array(
        'labels' => array(
            'name' => 'FAQs',
            'singular_name' => 'FAQ',
            'add_new' => 'Agregar FAQ',
            'add_new_item' => 'Agregar Nueva FAQ',
            'edit_item' => 'Editar FAQ',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => array('title', 'editor'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'pachamama_register_faqs');

// ── META BOXES (campos editables sin plugin) ──

// Paquete meta box
function pachamama_paquete_meta_boxes() {
    add_meta_box('paquete_detalles', 'Detalles del Paquete', 'pachamama_paquete_meta_html', 'paquete', 'normal', 'high');
}
add_action('add_meta_boxes', 'pachamama_paquete_meta_boxes');

function pachamama_paquete_meta_html($post) {
    wp_nonce_field('pachamama_paquete_nonce', 'pachamama_paquete_nonce');
    $duracion = get_post_meta($post->ID, '_paquete_duracion', true);
    $precio = get_post_meta($post->ID, '_paquete_precio', true);
    $features = get_post_meta($post->ID, '_paquete_features', true);
    $destacado = get_post_meta($post->ID, '_paquete_destacado', true);
    $orden = get_post_meta($post->ID, '_paquete_orden', true);
    ?>
    <table class="form-table">
        <tr><th><label for="duracion">Duracion</label></th>
            <td><input type="text" id="duracion" name="paquete_duracion" value="<?php echo esc_attr($duracion); ?>" placeholder="5 dias / 4 noches" class="regular-text"></td></tr>
        <tr><th><label for="precio">Precio (USD)</label></th>
            <td><input type="text" id="precio" name="paquete_precio" value="<?php echo esc_attr($precio); ?>" placeholder="1290" class="regular-text"></td></tr>
        <tr><th><label for="features">Incluye (uno por linea)</label></th>
            <td><textarea id="features" name="paquete_features" rows="6" class="large-text"><?php echo esc_textarea($features); ?></textarea></td></tr>
        <tr><th><label for="destacado">Destacado</label></th>
            <td><input type="checkbox" id="destacado" name="paquete_destacado" value="1" <?php checked($destacado, '1'); ?>> Marcar como "Mas popular"</td></tr>
        <tr><th><label for="orden">Orden</label></th>
            <td><input type="number" id="orden" name="paquete_orden" value="<?php echo esc_attr($orden ?: '0'); ?>" class="small-text"></td></tr>
    </table>
    <?php
}

function pachamama_save_paquete_meta($post_id) {
    if (!isset($_POST['pachamama_paquete_nonce']) || !wp_verify_nonce($_POST['pachamama_paquete_nonce'], 'pachamama_paquete_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    $fields = array('duracion', 'precio', 'features', 'orden');
    foreach ($fields as $f) {
        if (isset($_POST['paquete_' . $f])) {
            update_post_meta($post_id, '_paquete_' . $f, sanitize_textarea_field($_POST['paquete_' . $f]));
        }
    }
    update_post_meta($post_id, '_paquete_destacado', isset($_POST['paquete_destacado']) ? '1' : '0');
}
add_action('save_post_paquete', 'pachamama_save_paquete_meta');

// Testimonio meta box
function pachamama_testimonio_meta_boxes() {
    add_meta_box('testimonio_detalles', 'Detalles del Testimonio', 'pachamama_testimonio_meta_html', 'testimonio', 'normal', 'high');
}
add_action('add_meta_boxes', 'pachamama_testimonio_meta_boxes');

function pachamama_testimonio_meta_html($post) {
    wp_nonce_field('pachamama_testimonio_nonce', 'pachamama_testimonio_nonce');
    $ubicacion = get_post_meta($post->ID, '_testimonio_ubicacion', true);
    $estrellas = get_post_meta($post->ID, '_testimonio_estrellas', true) ?: '5';
    ?>
    <table class="form-table">
        <tr><th><label for="ubicacion">Ubicacion</label></th>
            <td><input type="text" id="ubicacion" name="testimonio_ubicacion" value="<?php echo esc_attr($ubicacion); ?>" placeholder="Madrid, Espana" class="regular-text"></td></tr>
        <tr><th><label for="estrellas">Estrellas</label></th>
            <td><select id="estrellas" name="testimonio_estrellas">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php selected($estrellas, $i); ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select></td></tr>
    </table>
    <p><em>Usa la "Imagen destacada" para la foto del avatar. El titulo es el nombre. El contenido es la cita.</em></p>
    <?php
}

function pachamama_save_testimonio_meta($post_id) {
    if (!isset($_POST['pachamama_testimonio_nonce']) || !wp_verify_nonce($_POST['pachamama_testimonio_nonce'], 'pachamama_testimonio_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['testimonio_ubicacion'])) update_post_meta($post_id, '_testimonio_ubicacion', sanitize_text_field($_POST['testimonio_ubicacion']));
    if (isset($_POST['testimonio_estrellas'])) update_post_meta($post_id, '_testimonio_estrellas', sanitize_text_field($_POST['testimonio_estrellas']));
}
add_action('save_post_testimonio', 'pachamama_save_testimonio_meta');

// Destino meta box
function pachamama_destino_meta_boxes() {
    add_meta_box('destino_detalles', 'Detalles del Destino', 'pachamama_destino_meta_html', 'destino', 'normal', 'high');
}
add_action('add_meta_boxes', 'pachamama_destino_meta_boxes');

function pachamama_destino_meta_html($post) {
    wp_nonce_field('pachamama_destino_nonce', 'pachamama_destino_nonce');
    $tag = get_post_meta($post->ID, '_destino_tag', true);
    $orden = get_post_meta($post->ID, '_destino_orden', true);
    ?>
    <table class="form-table">
        <tr><th><label for="tag">Etiqueta</label></th>
            <td><input type="text" id="tag" name="destino_tag" value="<?php echo esc_attr($tag); ?>" placeholder="Maravilla del mundo" class="regular-text"></td></tr>
        <tr><th><label for="orden">Orden</label></th>
            <td><input type="number" id="orden" name="destino_orden" value="<?php echo esc_attr($orden ?: '0'); ?>" class="small-text"></td></tr>
    </table>
    <p><em>Usa la "Imagen destacada" para la foto del destino. El titulo es el nombre. El contenido es la descripcion corta.</em></p>
    <?php
}

function pachamama_save_destino_meta($post_id) {
    if (!isset($_POST['pachamama_destino_nonce']) || !wp_verify_nonce($_POST['pachamama_destino_nonce'], 'pachamama_destino_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['destino_tag'])) update_post_meta($post_id, '_destino_tag', sanitize_text_field($_POST['destino_tag']));
    if (isset($_POST['destino_orden'])) update_post_meta($post_id, '_destino_orden', sanitize_text_field($_POST['destino_orden']));
}
add_action('save_post_destino', 'pachamama_save_destino_meta');

// ── THEME OPTIONS PAGE (textos editables del hero, contacto, etc.) ──
function pachamama_options_page() {
    add_menu_page('Pachamama Config', 'Pachamama', 'manage_options', 'pachamama-config', 'pachamama_options_html', 'dashicons-palmtree', 2);
}
add_action('admin_menu', 'pachamama_options_page');

function pachamama_register_settings() {
    register_setting('pachamama_options', 'pachamama_hero_titulo');
    register_setting('pachamama_options', 'pachamama_hero_subtitulo');
    register_setting('pachamama_options', 'pachamama_hero_badge');
    register_setting('pachamama_options', 'pachamama_stat_viajeros');
    register_setting('pachamama_options', 'pachamama_stat_anos');
    register_setting('pachamama_options', 'pachamama_stat_valoracion');
    register_setting('pachamama_options', 'pachamama_stat_recomiendan');
    register_setting('pachamama_options', 'pachamama_email');
    register_setting('pachamama_options', 'pachamama_whatsapp');
    register_setting('pachamama_options', 'pachamama_oficina');
    register_setting('pachamama_options', 'pachamama_instagram');
    register_setting('pachamama_options', 'pachamama_facebook');
    register_setting('pachamama_options', 'pachamama_youtube');
    register_setting('pachamama_options', 'pachamama_tiktok');
}
add_action('admin_init', 'pachamama_register_settings');

function pachamama_options_html() {
    ?>
    <div class="wrap">
        <h1>Configuracion Pachamama Travel</h1>
        <form method="post" action="options.php">
            <?php settings_fields('pachamama_options'); ?>
            <h2>Hero</h2>
            <table class="form-table">
                <tr><th>Badge</th><td><input type="text" name="pachamama_hero_badge" value="<?php echo esc_attr(get_option('pachamama_hero_badge', 'Viajes que transforman')); ?>" class="regular-text"></td></tr>
                <tr><th>Titulo (usar &lt;em&gt; para cursiva dorada)</th><td><input type="text" name="pachamama_hero_titulo" value="<?php echo esc_attr(get_option('pachamama_hero_titulo', 'Descubre la<br><em>magia ancestral</em><br>de Peru')); ?>" class="large-text"></td></tr>
                <tr><th>Subtitulo</th><td><textarea name="pachamama_hero_subtitulo" rows="3" class="large-text"><?php echo esc_textarea(get_option('pachamama_hero_subtitulo', 'Tours espirituales y culturales que te conectan con la sabiduria milenaria de los Andes, la selva amazonica y las civilizaciones mas antiguas de America.')); ?></textarea></td></tr>
            </table>
            <h2>Estadisticas</h2>
            <table class="form-table">
                <tr><th>Viajeros</th><td><input type="text" name="pachamama_stat_viajeros" value="<?php echo esc_attr(get_option('pachamama_stat_viajeros', '2,500+')); ?>" class="small-text"></td></tr>
                <tr><th>Anos</th><td><input type="text" name="pachamama_stat_anos" value="<?php echo esc_attr(get_option('pachamama_stat_anos', '12')); ?>" class="small-text"></td></tr>
                <tr><th>Valoracion</th><td><input type="text" name="pachamama_stat_valoracion" value="<?php echo esc_attr(get_option('pachamama_stat_valoracion', '4.9')); ?>" class="small-text"></td></tr>
                <tr><th>% Recomiendan</th><td><input type="text" name="pachamama_stat_recomiendan" value="<?php echo esc_attr(get_option('pachamama_stat_recomiendan', '98%')); ?>" class="small-text"></td></tr>
            </table>
            <h2>Contacto</h2>
            <table class="form-table">
                <tr><th>Email</th><td><input type="email" name="pachamama_email" value="<?php echo esc_attr(get_option('pachamama_email', 'info@pachamamatravel.com')); ?>" class="regular-text"></td></tr>
                <tr><th>WhatsApp</th><td><input type="text" name="pachamama_whatsapp" value="<?php echo esc_attr(get_option('pachamama_whatsapp', '+51 984 123 456')); ?>" class="regular-text"></td></tr>
                <tr><th>Oficina</th><td><input type="text" name="pachamama_oficina" value="<?php echo esc_attr(get_option('pachamama_oficina', 'Cusco, Peru')); ?>" class="regular-text"></td></tr>
            </table>
            <h2>Redes Sociales (URLs)</h2>
            <table class="form-table">
                <tr><th>Instagram</th><td><input type="url" name="pachamama_instagram" value="<?php echo esc_attr(get_option('pachamama_instagram', '#')); ?>" class="regular-text"></td></tr>
                <tr><th>Facebook</th><td><input type="url" name="pachamama_facebook" value="<?php echo esc_attr(get_option('pachamama_facebook', '#')); ?>" class="regular-text"></td></tr>
                <tr><th>YouTube</th><td><input type="url" name="pachamama_youtube" value="<?php echo esc_attr(get_option('pachamama_youtube', '#')); ?>" class="regular-text"></td></tr>
                <tr><th>TikTok</th><td><input type="url" name="pachamama_tiktok" value="<?php echo esc_attr(get_option('pachamama_tiktok', '#')); ?>" class="regular-text"></td></tr>
            </table>
            <?php submit_button('Guardar Cambios'); ?>
        </form>
    </div>
    <?php
}

// ── HELPER: get option with default ──
function pm($key, $default = '') {
    return get_option('pachamama_' . $key, $default);
}
