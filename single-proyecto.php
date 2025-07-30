<?php get_header(); ?>

<div class="page-simple single">
    <?php while (have_posts()) : the_post(); 
        $featured = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $sub = get_field('subtitulo_obra');
        $categorias = get_the_terms(get_the_ID(), 'categoria_obra');
    ?>
        <section class="header" style="background-image: url('<?= esc_url($featured) ?>');">
            <div class="container">
                <div class="content-overlay">
                    <?php if (!empty($categorias) && !is_wp_error($categorias)): ?>
                        <div class="categorias">
                            <?php foreach ($categorias as $cat): ?>
                                <span class="badge"><?= esc_html($cat->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="titulo"><?php the_title(); ?></h1>

                    <?php if ($sub): ?>
                        <p class="subtitulo"><?= esc_html($sub); ?></p>
                    <?php endif; ?>

                    <a href="#contenido" class="btn-ver-mas">Ver más ↓</a>
                </div>
            </div>
        </section>
        <article>
            <div class="single-content contenido">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
