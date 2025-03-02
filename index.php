<?php
// Silence is golden. This file is the entry point of the theme.
get_header();
?>

<main>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>No content available.</p>';
    endif;
    ?>
</main>

<?php
get_footer();
?>
