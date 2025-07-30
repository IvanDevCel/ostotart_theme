<footer>
    <div class="container">
        <div class="upperFooter">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="logoFooter">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="langAndMenus">
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
                        <?php dynamic_sidebar('footer-rrss'); ?>
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
