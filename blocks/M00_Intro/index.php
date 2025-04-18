<?php
/**
 * Title text template.
 *
 * @param array $block The block settings and attributes.
 */
$block_def = "Intro";
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
    <div class="introSvg">
        <img src="<?php echo get_template_directory_uri(); ?>/blocks/M00_Intro/img/Intro.svg" alt="Intro">
    </div>

    <iframe 
  width="560" 
  height="315" 
  src="https://www.youtube.com/embed/01ToCVSVtbI?autoplay=1&loop=1&playlist=01ToCVSVtbI&controls=0&modestbranding=1&showinfo=0&rel=0" 
  frameborder="0" 
  allow="autoplay; encrypted-media" 
  allowfullscreen>
</iframe>

    <div class="bodyVideo">
        <!--Video Url-->
        <?php if(isset($fields["url_video"])): ?>
            <iframe src="<?= $fields["url_video"] ?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls="0" autoplay="1"></iframe>
        <?php endif; ?>
    </div>
</div>