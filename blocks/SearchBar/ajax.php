<?php

function custom_search_ajax_handler() {
    $search_query = sanitize_text_field($_POST['query']);
    $args = array(
        's' => $search_query,
        'post_type' => array('post', 'page', 'product'),
        'posts_per_page' => 10,
    );
    $query = new WP_Query($args);
    $results = [];
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = array(
                'title' => get_the_title(),
                'link' => get_permalink(),
                'excerpt' => get_the_excerpt(),
                'image' => get_the_post_thumbnail_url(get_the_ID(), 'medium'), // o 'thumbnail'
                // Añade aquí más campos si quieres: ACF, taxonomías, etc.
            );
        }
    }
    wp_reset_postdata();
    echo json_encode($results);
    wp_die();
 }
 add_action('wp_ajax_custom_search', 'custom_search_ajax_handler');
 add_action('wp_ajax_nopriv_custom_search', 'custom_search_ajax_handler');
