<?php
$title = get_field('title') ?: 'Default Title';
$subtitle = get_field('subtitle') ?: 'Default Subtitle';
?>
<section class="hero-block">
    <div class="hero-content">
        <h1><?php echo esc_html($title); ?></h1>
        <p><?php echo esc_html($subtitle); ?></p>
    </div>
</section>
