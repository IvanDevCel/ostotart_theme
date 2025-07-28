<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="page_woocommerce">
<?php
get_header( 'shop' );
?>
	<div class="container">
		<div class="row">
			<div class="col-12">
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>
<div class="mi-header-tienda">
	<h1 class="shop-title">Obras y Trabajos</h1>
</div>
<?php
if ( woocommerce_product_loop() ) {

	

	// Categorías personalizadas
	$categorias = array(
		'obras' => 'Obras',
		'trabajo' => 'Trabajos'
	);

	foreach ( $categorias as $slug => $titulo ) {
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => array( $slug )
				)
			)
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			echo '<section class="categoria-bloque categoria-' . esc_attr( $slug ) . '">';
			echo '<h2 class="titulo-categoria">' . esc_html( $titulo ) . '</h2>';
			woocommerce_product_loop_start();
			while ( $query->have_posts() ) {
				$query->the_post();
				do_action( 'woocommerce_shop_loop' );
				wc_get_template_part( 'content', 'product' );
			}
			woocommerce_product_loop_end();
			echo '<div class="pagination pagination-'.esc_html( $titulo ).'"></div>';
			echo '</section>';
			wp_reset_postdata();
		}
	}

	// Miscelánea: productos que no están en obras ni trabajos
	$excluir_terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'slug' => array_keys( $categorias ),
		'fields' => 'ids',
		'hide_empty' => false
	) );

	if ( ! is_wp_error( $excluir_terms ) && ! empty( $excluir_terms ) ) {

		$args_miscelanea = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'term_id',
					'terms' => $excluir_terms,
					'operator' => 'NOT IN'
				)
			)
		);

		$query_miscelanea = new WP_Query( $args_miscelanea );

		if ( $query_miscelanea->have_posts() ) {
			echo '<section class="categoria-bloque categoria-miscelanea">';
			echo '<h2 class="titulo-categoria">Miscelánea</h2>';
			woocommerce_product_loop_start();
			while ( $query_miscelanea->have_posts() ) {
				$query_miscelanea->the_post();
				do_action( 'woocommerce_shop_loop' );
				wc_get_template_part( 'content', 'product' );
			}
			woocommerce_product_loop_end();
			echo '</section>';
			wp_reset_postdata();
		}
	}

	do_action( 'woocommerce_after_shop_loop' );

} else {
	do_action( 'woocommerce_no_products_found' );
}

// Cierre de contenedor principal
do_action( 'woocommerce_after_main_content' );

// Sidebar
?>
		</div>
	</div>
<?php
get_footer( 'shop' );
?>
</div>
</div>
