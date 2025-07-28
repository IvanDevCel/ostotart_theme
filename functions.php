<?php
function my_theme_setup() {
    add_theme_support('widgets');
    add_theme_support('align-wide');
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'my_theme_setup');


/*Widgets*/
add_action( 'widgets_init', 'my_theme_widgets_init' );

function my_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer', 'ostotart' ),
            'id'            => 'footer-rrss',
            'description'   => esc_html__( 'Add widgets here.', 'ostotart' ),
            'before_widget' => '',
            'after_widget'  => '',
        ),
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Header SearchBar', 'ostotart' ),
            'id'            => 'header-searchbar',
            'description'   => esc_html__( 'Add widgets here.', 'ostotart' ),
            'before_widget' => '',
            'after_widget'  => '',
        ),
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Header Color Changer', 'ostotart' ),
            'id'            => 'color-changer',
            'description'   => esc_html__( 'Add widgets here.', 'ostotart' ),
            'before_widget' => '',
            'after_widget'  => '',
        ),
    );
}

add_action('wp_head', function() {
    global $template;
    echo '<!-- Archivo de plantilla en uso: ' . basename($template) . ' -->';
});



function my_custom_theme_assets() {
    wp_enqueue_style('my-theme-root-style', get_stylesheet_uri(), [], '1.0');
    // Estilos principales
    wp_enqueue_style('my-theme-style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0');

    // Estilos adicionales
    wp_enqueue_style('my-theme-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce_css.css', [], '1.0');
    wp_enqueue_style('my-theme-fonts', get_template_directory_uri() . '/assets/css/fonts.css', [], '1.0');
    wp_enqueue_style('my-theme-footer', get_template_directory_uri() . '/assets/css/footer.css', [], '1.0');
    wp_enqueue_style('my-theme-header', get_template_directory_uri() . '/assets/css/header.css', [], '1.0');
    wp_enqueue_style('my-theme-variables', get_template_directory_uri() . '/assets/css/variables.css', [], '1.0');

    // Scripts
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/script.js', [], '1.0', true);
    wp_enqueue_script('my-theme-ajax', get_template_directory_uri() . '/assets/js/ajax-search.js', [], '1.0', true);
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

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Opciones del tema',
        'menu_title' => 'Opciones del tema',
        'menu_slug'  => 'opciones-tema',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}


function my_enqueue_ajax_script() {
    wp_enqueue_script('ajax-search', get_template_directory_uri() . '/blocks/SearchBar/ajax.js', array('jquery'), '1.0', true);

    wp_localize_script('ajax-search', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'my_enqueue_ajax_script');

require_once get_template_directory() . '/ajax-search.php';


/*Woocommerce*/
add_theme_support( 'woocommerce' );

// Ocultar botón "Añadir al carrito"
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// Ocultar precios
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

add_filter('woocommerce_product_tabs', 'custom_remove_product_tabs', 98);
function custom_remove_product_tabs($tabs) {
    unset($tabs['description']);              // Quita la pestaña de Descripción
    unset($tabs['reviews']);                  // Quita la pestaña de Valoraciones
    unset($tabs['additional_information']);   // Quita Información adicional, por si acaso
    return $tabs;
}

?>
