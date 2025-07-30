<?php get_header(); ?>

<main class="archivo-obras">
    <section class="cabecera-archivo">
        <div class="container">
            <h1>Todas las obras</h1>
        </div>
    </section>

    <section class="listado-obras">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="grid-obras">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="obra-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php endif; ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p>No hay obras publicadas todavía.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
