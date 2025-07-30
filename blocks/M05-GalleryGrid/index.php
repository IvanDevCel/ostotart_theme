<?php
$block_def = "GridImages";
$id = !empty($block['anchor']) ? $block['anchor'] : $block_def . '-' . $block['id'];
$className = $block_def;
if (!empty($block['className'])) $className .= ' ' . $block['className'];
if (!empty($block['align'])) $className .= ' align' . $block['align'];

$fields = get_fields();
$imagenes = $fields['galeria_de_imagenes'] ?? [];
$color_fondo = $fields['color_de_fondo'] ?? 'white';
$pantalla_completa = $fields['pantalla_completa'] ?? 'normal';

$clase_fondo = ($color_fondo === 'darkBlue') ? 'darkBlue' : 'white';
$grid_cols_class = 'cols-' . count($imagenes);
$container_class = ($pantalla_completa === 'fullWidth') ? 'container-fluid' : 'container';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr("$className $clase_fondo"); ?>">
    <div class="<?= esc_attr($container_class); ?>">
        <div class="grid-imagenes <?= esc_attr($grid_cols_class); ?>">
            <?php foreach ($imagenes as $imagen): ?>
                <div class="item-img">
                    <img src="<?= esc_url($imagen['url']); ?>" alt="<?= esc_attr($imagen['alt']); ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
