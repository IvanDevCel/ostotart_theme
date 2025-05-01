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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className);?>  <?php echo ($fields["ancho_100"] === "normal") ? "normalSize" : ""; ?>">
    <div class="bodyVideo">
        <!--Video Url-->
        <?php if (!empty($fields["ancho_100"]) && $fields["ancho_100"] === "normal"): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($fields["url_video"])): ?>
                            <iframe src="<?= $fields["url_video"] ?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls="0" autoplay="1"></iframe>
                        <?php endif; ?>

                        <?php if(isset($fields["archivo_video"]["url"])): ?>
                            <video class="video" autoplay muted>
                                <source src="<?= $fields["archivo_video"]["url"]; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <?php else: ?>
                <?php if(isset($fields["url_video"])): ?>
                    <iframe src="<?= $fields["url_video"] ?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls="0" autoplay="1"></iframe>
                <?php endif; ?>

                <?php if(isset($fields["archivo_video"]["url"])): ?>
                    <video class="video" autoplay muted>
                        <source src="<?= $fields["archivo_video"]["url"]; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            <?php endif; ?>
    </div>
</div>