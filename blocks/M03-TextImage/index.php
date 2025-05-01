<?php
/**
 * Title text template.
 *
 * @param array $block The block settings and attributes.
 */
$block_def = "TitleImagen";
// Create id attribute allowing for custom "anchor" value.
$id = $block_def.'-'.$block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = $block_def;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$fields = get_fields();
?>
<?php $fields = get_fields(); ?>

<?php $fields = get_fields(); ?>

<div id="<?php echo esc_attr($id ?? ''); ?>" class="<?php echo esc_attr($className ?? ''); ?> <?php echo esc_attr($fields['posicion_imagen'] ?? ''); ?>">
    <div data-aos="fade-<?php echo ($fields['posicion_imagen'] ?? '') === 'right' ? 'left' : 'right'; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contData">
                        <?php if (!empty($fields['imagen']['url'])): ?>
                            <div class="contImg">
                                <img src="<?php echo esc_url($fields['imagen']['url']); ?>" alt="<?php echo esc_attr($fields['imagen']['alt'] ?? ''); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($fields['titulo']) || !empty($fields['texto'])): ?>
                            <div class="textData">
                                <?php if (!empty($fields['titulo'])): ?>
                                    <div class="title"><?php echo esc_html($fields['titulo']); ?></div>
                                <?php endif; ?>

                                <?php if (!empty($fields['texto'])): ?>
                                    <div class="text"><?php echo esc_html($fields['texto']); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
