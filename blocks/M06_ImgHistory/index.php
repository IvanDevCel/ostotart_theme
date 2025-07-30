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
$background_color = $fields['color_de_fondo'] ?? '#ffffff';
$boton = $fields['boton_ver_mas'];
$color_class = strtolower($background_color) === '#1c1b38' ? 'darkBlue' : 'white';
$margenes =$fields['margenes'] ?? 'noMargin';

$textos_rejilla = $fields['textos_en_rejilla'];

$container_class = $selector_version === 'fullWidth' ? 'container-fluid px-0' : 'container';
$style_img     = 'width:' . intval($tamano_imagen) . '%;';
?>
<div id="<?= esc_attr($id); ?>" class="<?= esc_attr("$className $color_class $margenes"); ?>" style="background-color: <?= $background_color; ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="ImgHistory-grid<?= $imagen ? ' ' . ($posicion_imagen === 'right' ? 'image-right' : 'image-left') : ' empty-img' ?>">
            <?php if ($imagen): ?>
            <div class="contImg" style="<?= esc_attr($style_img); ?>">
                <img src="<?= esc_url($imagen); ?>" alt="<?= esc_attr($titulo); ?>">
                </div>
            <?php endif; ?>

            <?php if ($textos_rejilla || $titulo || $texto || (!empty($boton['url']) && !empty($boton['title']))): ?>
                <div class="contText">
                    <?php if ($titulo): ?>
                        <h2 class="subtitle"><?= esc_html($titulo); ?></h2>
                    <?php endif; ?>

                    <?php if ($texto): ?>
                        <div class="text"><?= wp_kses_post($texto); ?></div>
                    <?php endif; ?>

                    <?php if ($textos_rejilla): ?>
                        <?php
                            $count = count($textos_rejilla);
                            $clase_grid = min($count, 3); // fuerza máximo 3
                        ?>
                        <div class="rejilla <?= esc_attr($clase_grid); ?>">
                            <?php foreach ($textos_rejilla as $item): ?>
                                <div class="item">
                                    <h3 class="subtitle"><?= esc_html($item['titulo']); ?></h3>
                                    <div class="text"><?= wp_kses_post($item['campo_texto']); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($boton['url']) && !empty($boton['title'])): ?>
                        <a class="btnAcces" href="<?= esc_url($boton['url']); ?>" <?= $boton['target'] ? 'target="' . esc_attr($boton['target']) . '"' : ''; ?>>
                            <?= esc_html($boton['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


        </div>
    </div>
</div>
<style>
    .ImgHistory .contImg{
        margin: 0 auto;
    }

    .ImgHistory .rejilla{
        display: grid;
        grid-template-columns: repeat( <?= $clase_grid ?>, 1fr);
        gap: 20px;
    }

    @media screen and (max-width: 992px) {
        .ImgHistory .rejilla {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media screen and (max-width: 768px) {
        .ImgHistory .rejilla {
            grid-template-columns: 1fr;
        }

        .ImgHistory .contImg {
            width: 100% !important;
            text-align: center;
        }
    }
</style>
