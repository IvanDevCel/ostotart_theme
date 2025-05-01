<?php

/**

 * TitleText Block template.

 *

 * @param array $block The block settings and attributes.

 */



$block_def = "BarraBusqueda";

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

?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className);?>">
    <div class="overlay"></div>
    <div class="searchSection">
        <div class="container">
            <div class="row">
                <div class="col-12 px-0">
                    <img class="closeSearch" src="<?= get_template_directory_uri().'/assets/images/icons/close-btn.svg';?>">
                    <div class="inputSearch">
                        <?php if(isset($fields["texto_barra_de_busqueda"])): ?>
                            <input class="searchData" type="text" id="search-input" placeholder="<?= $fields['texto_barra_de_busqueda']; ?>">
                        <?php endif; ?>
                    </div>
                    <div id="search-results"></div>
                </div>
            </div>
        </div>
    </div>
</div>

