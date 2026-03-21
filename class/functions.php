<?php
function ds_style() {
    wp_enqueue_style('digitalschool-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ds_style');


function digitalschool_setup() {
    register_nav_menus( array(
        'primary' => 'Primary Menu',
    ) );
}
add_action( 'after_setup_theme', 'digitalschool_setup' );

function ds_js(){
    wp_enqueue_script('ds-js',get_theme_file_uri('js/main.js'), array(), 1.0, true);
}
add_action ('wp_enqueue_scripts', 'ds_js');

add_action('wp_enqueue_scripts', function () {

});


add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_image_size('team_avatar', 500, 500);
});


?>