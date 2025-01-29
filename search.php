<?php get_header(); ?>
<main>
    <h1>Resultados de búsqueda</h1>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
        }
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
    ?>
</main>
<?php get_footer(); ?>
