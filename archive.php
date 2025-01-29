<?php get_header(); ?>
<main>
    <h1><?php the_archive_title(); ?></h1>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
        }
    }
    ?>
</main>
<?php get_footer(); ?>
