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

                            <div class="logoHeader">
                                <?php dynamic_sidebar('sidebar-1'); ?>
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

                                <div class="searchLanguage">
                                    <div class="language-selector" data-no-translation>
                                        <?php
                                        if (function_exists('trp_custom_language_switcher')) :
                                            $languages = trp_custom_language_switcher();
                                            $current_locale = get_locale();

                                            $current_lang = null;
                                            $other_langs = [];

                                            foreach ($languages as $lang) {
                                                if ($lang['language_code'] === $current_locale) {
                                                    $current_lang = $lang;
                                                } else {
                                                    $other_langs[] = $lang;
                                                }
                                            }
                                        ?>
                                            <?php if ($current_lang): ?>
                                                <div class="lang-select">
                                                    <div class="lang-toggle current" aria-expanded="false" aria-controls="lang-dropdown">
                                                        <?= esc_html($current_lang['short_language_name']); ?>
                                                    </div>

                                                    <?php if (!empty($other_langs)): ?>
                                                        <ul class="lang-dropdown" id="lang-dropdown">
                                                            <?php foreach ($other_langs as $lang): ?>
                                                                <li>
                                                                    <a href="<?= esc_url($lang['current_page_url']); ?>">
                                                                        <?= esc_html($lang['short_language_name']); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <a href="#" class="btnSearch">
                                    <svg class="searchIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                        <path d="M11.2162 10.8076L15 14.5M13.1081 6.40779C13.1081 9.67058 10.3976 12.3156 7.05405 12.3156C3.71049 12.3156 1 9.67058 1 6.40779C1 3.14501 3.71049 0.5 7.05405 0.5C10.3976 0.5 13.1081 3.14501 13.1081 6.40779Z" stroke="#0A1A2D" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </nav>
                        </div>

                        <div class="searchSection">
                            <form action="<?php echo home_url('/'); ?>" method="get">
                                <input type="text" name="s" id="search" placeholder="Buscar..." value="<?php the_search_query(); ?>">
                                <button type="submit">Que necesitas</button>
                            </form>
                            <div class="overlay"></div>
                        </div>
                    </div> <!-- cierra .col-12 -->
                </div> <!-- cierra .row -->
            </div> <!-- cierra .container -->
        </nav>
    </header>
