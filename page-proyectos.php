<?php get_header(); ?>

<div class="page-content archivo-obras">
    <section class="cabecera-archivo">
        <div class="container">
            <h1>Todos los proyectos</h1>
        </div>
    </section>

    <section class="listado">
        <div class="container">
            <?php
            $obras = new WP_Query([
                'post_type' => 'proyecto',
                'posts_per_page' => 9,
                'post_status' => 'publish',
            ]);

            if ($obras->have_posts()) : ?>
                <div class="grid-content">
                    <?php while ($obras->have_posts()) : $obras->the_post();
                        $fields = get_fields();

                        // Reemplaza 'categoria_obra' por el nombre real de tu taxonomía si es diferente
                        $categorias = get_the_terms(get_the_ID(), 'categoria_proyecto');

                        ?>
                        <article class="obra">
                            <a href="<?php the_permalink(); ?>">

                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="thumb">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="contDown">
                                    <div class="categorias">
                                         <?php if (!empty($categorias) && !is_wp_error($categorias)) :
                                            foreach ($categorias as $cat) : ?>
                                                <span class="categoria"><?= esc_html($cat->name) ?></span>
                                            <?php endforeach;
                                        endif; ?>
                                    </div>

                                    <h2><?php the_title(); ?></h2>

                                    <?php if (!empty($fields['subtitulo'])) : ?>
                                        <p class="subtitulo"><?= esc_html($fields['subtitulo']) ?></p>
                                    <?php endif; ?>

                                    <?php if (has_excerpt()) : ?>
                                        <div class="resumen"><?php the_excerpt(); ?></div>
                                    <?php elseif (!empty($fields['resumen'])) : ?>
                                        <div class="resumen"><?= wp_kses_post($fields['resumen']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <h2 class="noDataAvi">No hay proyectos publicados todavía.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
