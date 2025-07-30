<?php
/**
 * Template part for displaying evento
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Database_Elafrios_Light
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <?php
                montero_aramburu_posted_on();
                montero_aramburu_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php dynamic_sidebar('evento-top') ?>
        <div class="evento-unique">
            <div class="text-body">
                <div class="container">
                    <div class="row dataContents">
                        <div class="col-12 col-lg-3 sideBar">
                            <div class="sidebarLeft">
                                <?php dynamic_sidebar('sidebar-single-media') ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 contents">
                            <?php
                            the_content(
                                sprintf(
                                    wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'monteroaramburu' ),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    wp_kses_post( get_the_title() )
                                )
                            );

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-top: clamp(56px, 10vw,80px);">
            <?php dynamic_sidebar('evento-bottom') ?>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->