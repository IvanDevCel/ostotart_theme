<?php

/**

 * TitleText Block template.

 *

 * @param array $block The block settings and attributes.

 */



$block_def = "RRSS";

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



// Load values and assign defaults.

$fields = get_fields();

if (!isset($fields["redes_sociales"][0])) {
    return;
}
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className);?>" style="background-image: url('https://extramurs.servidortemporal.net/wp-content/uploads/2024/01/ELEMENTOS-GRAFICOS-02_split.png')">
    <div class="contIcons">
        <?php foreach($fields["redes_sociales"] as $red_social): ?>
            <div class="itemBox">
                <?php if (isset($red_social["imagen"]["url"])) : ?>
                    <a href="<?=$red_social["enlace"]["url"] ?? ""?>" title="<?=$red_social["enlace"]["title"] ?? ""?>">
                        <img class="itemImage" src="<?=$red_social["imagen"]["url"]?>" alt="<?=$red_social["imagen"]["title"] ?? ""?>">
                    </a>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
    </div>
</div>

