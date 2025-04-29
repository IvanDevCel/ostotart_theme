<?php 

function menus_header() {
    register_nav_menus(array(
        'menu-header-left' => __('Menú Header Izquierdo', 'mi-tema'),
        'menu-header-right' => __('Menú Header Derecho', 'mi-tema'),
    ));
}
add_action('after_setup_theme', 'menus_header');
function cargar_bootstrap() {
    $bootstrap_css = get_template_directory_uri() . '/lib/bootstrap-5.3.3/css/bootstrap.min.css';
    $bootstrap_js = get_template_directory_uri() . '/lib/bootstrap-5.3.3/js/bootstrap.bundle.min.js';
    wp_enqueue_style('bootstrap-css', $bootstrap_css, array(), '5.3.3', 'all');

    wp_enqueue_script('bootstrap-js', $bootstrap_js, array('jquery'), '5.3.3', true);
}
add_action('wp_enqueue_scripts', 'cargar_bootstrap');


?>