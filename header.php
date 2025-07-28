<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
function rgba_array_to_string($color) {
    if (!is_array($color)) return '#030121';
    $r = $color['red'] ?? 0;
    $g = $color['green'] ?? 0;
    $b = $color['blue'] ?? 0;
    $a = $color['alpha'] ?? 1;
    return "rgba($r, $g, $b, $a)";
}

$color1 = get_field('color_degradado_1', 'option');
$color2 = get_field('color_degradado_2', 'option');

$gradient = 'linear-gradient(180deg, ' . rgba_array_to_string($color1) . ' 0%, ' . rgba_array_to_string($color2) . ' 100%)';
?>

<header>
    <nav class="mainMenu" style="background: <?= esc_attr($gradient); ?>;">
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

                            <div class="logoHeader">
                                <?php the_custom_logo(); ?>
                            </div>

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

                                <div class="iconsBtn">
                                    <a href="#" class="btnSearch">
                                        <svg class="searchIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                            <path d="M11.2162 10.8076L15 14.5M13.1081 6.40779C13.1081 9.67058 10.3976 12.3156 7.05405 12.3156C3.71049 12.3156 1 9.67058 1 6.40779C1 3.14501 3.71049 0.5 7.05405 0.5C10.3976 0.5 13.1081 3.14501 13.1081 6.40779Z" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>

                                    <a href="#" class="offCanvasIcon">
                                    <svg class="iconOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                        <path d="M2 2H22" stroke="#E9D9B8" stroke-width="2.5" stroke-linecap="square"/>
                                        <path d="M2 9H22" stroke="#E9D9B8" stroke-width="2.5" stroke-linecap="square"/>
                                        <path d="M2 16H22" stroke="#E9D9B8" stroke-width="2.5" stroke-linecap="square"/>
                                    </svg>

                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
        </nav>
        <div class="menuCont">
            <div class="overlay"></div>
            <div class="offCanvasMenu">
                <div id="site-navigation" class="contentNavigation">
                    <img class="closeOffCanvas" alt="icon" src="<?= get_template_directory_uri().'/assets/images/icons/close-btn.svg';?>" />
                    <div class="dataMenus">
                    <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'menu-header-left',
                                            'container'       => 'div',
                                            'container_class' => 'menu-container-left',
                                            'menu_class'      => 'menu-ul-left',
                                            'fallback_cb'     => false
                                        ));
                                        ?>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'menu-header-right',
                                            'container'       => 'div',
                                            'container_class' => 'menu-container-right',
                                            'menu_class'      => 'menu-ul-right',
                                            'fallback_cb'     => false
                                        ));
                                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="searchCont">
            <?php dynamic_sidebar('header-searchbar'); ?>
        </div>
    </header>
