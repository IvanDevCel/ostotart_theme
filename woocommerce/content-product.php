<?php
defined( 'ABSPATH' ) || exit;
global $product;

if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class( 'product-card', $product ); ?>>
	<a href="<?php the_permalink(); ?>" class="product-link">
		<div class="product-image">
			<?php echo $product->get_image( 'woocommerce_thumbnail', ['class' => 'img-fluid'] ); ?>
			<?php if ( $product->is_on_sale() ) : ?>
				<span class="product-sale-badge">¡Oferta!</span>
			<?php endif; ?>
		</div>

		<div class="product-info">
			<h3 class="product-title"><?php echo get_the_title(); ?></h3>

			<?php if ( $product->get_rating_count() > 0 ) : ?>
				<div class="product-rating">
					<?php echo wc_get_rating_html( $product ); ?>
				</div>
			<?php endif; ?>
		</div>
	</a>

</li>
