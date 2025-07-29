<?php
/**
 * Reemplazo de la galería por Swiper.js
 *
 * @package WooCommerce\Templates
 * @version personalizado
 */

defined('ABSPATH') || exit;

global $product;

$main_image_id = $product->get_image_id();
$gallery_ids   = $product->get_gallery_image_ids();
$total_gallery = count($gallery_ids);
?>

<?php if (!$main_image_id): ?>
	<p>No hay imagen del producto.</p>
<?php elseif ($total_gallery === 0): ?>
	<!-- Solo imagen destacada, sin slider -->
	<div class="producto-imagen-unica">
		<?php echo wp_get_attachment_image($main_image_id, 'large'); ?>
	</div>
<?php else: ?>
	<!-- Swiper Slider -->
	<div class="swiper mySwiper">
		<div class="swiper-wrapper">
			<!-- Imagen destacada -->
			<div class="swiper-slide">
				<?php echo wp_get_attachment_image($main_image_id, 'large'); ?>
			</div>

			<!-- Imágenes de galería -->
			<?php foreach ($gallery_ids as $id): ?>
				<div class="swiper-slide">
					<?php echo wp_get_attachment_image($id, 'large'); ?>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Flechas de navegación -->
		<div class="swipperArrows">
			<div class="swiperArrow swiper-button-next">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/arrow-left.svg" alt="Siguiente">
			</div>
			<div class="swiperArrow swiper-button-prev">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/arrow-left.svg" alt="Anterior">
			</div>
		</div>

	</div>
<?php endif; ?>
