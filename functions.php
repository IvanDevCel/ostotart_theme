<?php
function my_theme_setup() {
    add_theme_support('widgets');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'my_theme_setup');


/*Widgets*/
function my_theme_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar Principal', 'textdomain'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widgetTest %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'my_theme_widgets_init');

add_action('wp_head', function() {
    global $template;
    echo '<!-- Archivo de plantilla en uso: ' . basename($template) . ' -->';
});



function my_custom_theme_assets() {
    wp_enqueue_style('my-theme-root-style', get_stylesheet_uri(), [], '1.0');
    wp_enqueue_style('my-theme-assets-style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0');
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/script.js', [], '1.0', true);
    // Estilos principales
    wp_enqueue_style('my-theme-style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0');

    // Estilos adicionales
    wp_enqueue_style('my-theme-fonts', get_template_directory_uri() . '/assets/css/fonts.css', [], '1.0');
    wp_enqueue_style('my-theme-footer', get_template_directory_uri() . '/assets/css/footer.css', [], '1.0');
    wp_enqueue_style('my-theme-header', get_template_directory_uri() . '/assets/css/header.css', [], '1.0');
    wp_enqueue_style('my-theme-variables', get_template_directory_uri() . '/assets/css/variables.css', [], '1.0');

    // Scripts
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/script.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_custom_theme_assets');



function mi_tema_soporte_basico() {
    add_theme_support('menus');
}
add_action('after_setup_theme', 'mi_tema_soporte_basico');


function registrar_bloques_acf() {
    $ruta_bloques = get_template_directory() . '/blocks/';

    foreach (glob($ruta_bloques . '*', GLOB_ONLYDIR) as $bloque_dir) {
        $block_json = $bloque_dir . '/block.json';

        if (file_exists($block_json)) {
            register_block_type($bloque_dir);
        }
    }
}
add_action('init', 'registrar_bloques_acf');

require get_stylesheet_directory() . '/inc/functions-theme.php';

function crear_usuario_admin_forzado() {
    $username = 'admin';
    $password = 'admin'; // Cambia esto por una contraseña fuerte
    $email = 'admin@example.com'; // Cambia esto por un correo válido

    if (!username_exists($username) && !email_exists($email)) {
        $user_id = wp_create_user($username, $password, $email);
        $user = new WP_User($user_id);
        $user->set_role('administrator');
    }
}
add_action('init', 'crear_usuario_admin_forzado');

?>