<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav class="mainMenu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contentHeader">
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
                                <a href="#" class="btnSearch">
                                    <svg class="searchIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                        <path d="M11.2162 10.8076L15 14.5M13.1081 6.40779C13.1081 9.67058 10.3976 12.3156 7.05405 12.3156C3.71049 12.3156 1 9.67058 1 6.40779C1 3.14501 3.71049 0.5 7.05405 0.5C10.3976 0.5 13.1081 3.14501 13.1081 6.40779Z" stroke="#0A1A2D" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </nav>
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    <div>
                </div>
            </div>
        </nav>
    </header>
