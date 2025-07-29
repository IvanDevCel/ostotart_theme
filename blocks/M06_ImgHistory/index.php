<?php
/**
 * ImgHistory template con ACF (versión grid).
 *
 * @param array $block The block settings and attributes.
 */
$block_def = "ImgHistory";

$id = $block_def . '-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = $block_def;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$fields = get_fields();

$imagen           = $fields['imagen']['url'] ?? '';
$titulo           = $fields['titulo'] ?? '';
$texto            = $fields['texto'] ?? '';
$posicion_imagen  = $fields['posicion_imagen'] ?? 'left';
$tamano_imagen    = $fields['tamano_imagen'] ?? 50;
$selector_version = $fields['selector_de_version'] ?? 'normal';

$container_class = $selector_version === 'fullWidth' ? 'container-fluid' : 'container';
$style_img     = 'width:' . intval($tamano_imagen) . '%;';
?>
<div id="<?= esc_attr($id); ?>" class="<?= esc_attr("$className"); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="ImgHistory-grid <?= $posicion_imagen === 'right' ? 'image-right' : 'image-left' ?>">
            <div class="contImg">
                <?php if ($imagen): ?>
                    <img src="<?= esc_url($imagen); ?>" alt="<?= esc_attr($titulo); ?>">
                <?php endif; ?>
            </div>
            <div class="contText">
                <h2 class="subtitle"><?= esc_html($titulo); ?></h2>
                <div class="text"><?= wp_kses_post($texto); ?></div>
            </div>
        </div>
    </div>
</div>
<style>
    .ImgHistory .contImg{
        <?= esc_attr($style_img); ?>;
        margin: 0 auto;
    }

    @media screen and (max-width: 768px) {
        .ImgHistory .contImg {
            width: 100%;
            text-align: center;
        }
    }
</style>
