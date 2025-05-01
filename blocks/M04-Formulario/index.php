<?php
/**
 * Title text template.
 *
 * @param array $block The block settings and attributes.
 */
$block_def = "Formulario";
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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className);?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode($fields["formulario_contacto"]); ?>
            </div>
        </div>
    </div>
</div>