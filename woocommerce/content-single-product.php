<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
<div id="productInfo" <?php wc_product_class( 'producto-contenido', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>

		<?php
		$product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');
		?>
		<div class="categories">
		<?php
		if (!empty($product_cats) && !is_wp_error($product_cats)) {
			foreach ($product_cats as $cat) {
				$cat_link = get_term_link($cat);
				echo '<span class="categoria-producto">' . esc_html($cat->name) . '</span> ';
			}
		}
		?>
		</div>


		<?php
		$campo_descripcion = get_field('texto_descripcion');
		if ($campo_descripcion) {
			echo '<div class="acf-campos-extra">';
			echo  wp_kses_post($campo_descripcion);
			echo '</div>';

		}
		?>

		<?php
			$telefono = get_field('numero_de_telefono', 'option');

			if ($telefono) {
				$titulo = get_the_title();
				$url = get_permalink();
				
				$mensaje = rawurlencode(
					"Hola! estoy interesado en el producto \"$titulo\".\n\nPuedes verlo aquí: $url"
				);

				echo '<a class="whatsapp-button" href="https://wa.me/34' . $telefono . '?text=' . $mensaje . '" target="_blank" rel="noopener noreferrer">';
				echo 'Contactar Obra';
				echo '</a>';
			}
		?>





	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
