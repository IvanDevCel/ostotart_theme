<?php

/**
 *
 * @package Ostotart
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			if ( !empty( get_the_content() ) ) {
				the_content();
			} else {
				error_log('No hay contenido disponible.');
			}

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
	else :
		error_log('No hay páginas disponible.');
	endif;
	?>

	</main>

<?php
get_footer();
?>
