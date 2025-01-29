<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <nav class="menu-left">
        <?php
        wp_nav_menu(array(
            'theme_location'  => 'menu-header-left',
            'container'       => 'div',
            'container_class' => 'menu-container-left',
            'menu_class'      => 'menu-ul-left',
            'fallback_cb'     => false
        ));
        ?>
    </nav>
    <nav></nav>

    <!-- Menú Derecho -->
    <nav class="menu-right">
        <?php
        wp_nav_menu(array(
            'theme_location'  => 'menu-header-right',
            'container'       => 'div',
            'container_class' => 'menu-container-right',
            'menu_class'      => 'menu-ul-right',
            'fallback_cb'     => false
        ));
        ?>
    </nav>
    <nav>
    <?php dynamic_sidebar('sidebar-1'); ?>
    </nav>
</header>
