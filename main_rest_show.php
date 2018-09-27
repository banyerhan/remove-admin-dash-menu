<?php
function my_show_rest_view(){
    global $wp_post_types;
    $wp_post_types['your-post-type']->show_in_rest = true;
    $wp_post_types['your-post-type']->rest_base = your-post-type; // you can set desired if missed it return 404
    $wp_post_types['your-post-type']->rest_controller_class = 'WP_REST_Posts_Controller';
}
add_action( 'init', 'my_show_rest_view', 30 );
?>