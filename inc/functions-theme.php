<?php 

function menus_header() {
    register_nav_menus(array(
        'menu-header-left' => __('Menú Header Izquierdo', 'mi-tema'),
        'menu-header-right' => __('Menú Header Derecho', 'mi-tema'),
    ));
}
add_action('after_setup_theme', 'menus_header');

?>