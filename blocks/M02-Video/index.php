<?php
/**
 * Title text template.
 *
 * @param array $block The block settings and attributes.
 */
$block_def = "VideoUrl";
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
    <div class="title"><?= $fields["titulo"] ?? ""; ?></div>
    <div class="text"><?= $fields["texto"] ?? ""; ?></div>
</div>