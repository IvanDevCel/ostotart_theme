<?php get_header(); ?>

<main class="single-obra">
    <?php while (have_posts()) : the_post(); ?>
        <section class="header-obra">
            <div class="container">
                <h1 class="titulo-obra"><?php the_title(); ?></h1>
                <?php if ($sub = get_field('subtitulo_obra')): ?>
                    <p class="subtitulo"><?php echo esc_html($sub); ?></p>
                <?php endif; ?>
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
