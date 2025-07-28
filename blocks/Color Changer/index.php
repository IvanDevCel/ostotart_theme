<?php

/**

 * TitleText Block template.

 *

 * @param array $block The block settings and attributes.

 */



$block_def = "ColorChanger";

// Create id attribute allowing for custom "anchor" value.

$id = $block_def.'-'.$block['id'];

if (!empty($block['anchor'])) {

    $id = $block['anchor'];

}



// Load values and assign defaults.

$fields = get_fields();

var_dump($fields);
?>


<?php

