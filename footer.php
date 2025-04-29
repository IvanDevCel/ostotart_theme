<footer>
    <div class="container">
        <div class="upperFooter">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="logoHeader">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="langAndMenus">
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
                                            <span class="current"><?= esc_html($current_lang['short_language_name']); ?></span>
                                            <?php if (!empty($other_langs)): ?>
                                                <?php foreach ($other_langs as $lang): ?>
                                                    <a href="<?= esc_url($lang['current_page_url']); ?>">
                                                        <?= esc_html($lang['short_language_name']); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                        </div>

                        <div class="menus">
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
        </div>
    </div>
    <div class="marquee-container" id="marquee-container">
        <span class="base-phrase">ÓSCAR TORRES VICEDO</span>
    </div>
    <div class="container">
        <div class="downFooter">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="socialMedia">
                        <?= get_sidebar('footer'); ?>
                    </div>
                </div>
                <div class="col-12 col-md-7 offset-md-2">
                    <div class="legals">
                        <a href="#">Copyright</a>
                        <a href="#">Copyright</a>
                        <a href="#">Copyright</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
