<?php
$addConfortaaFont = static function () {
    wp_enqueue_style(
        'confortaa-google-fonts',
        '//fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap',
        [],
        CHILD_THEME_VERSION
    );
};
add_action('wp_enqueue_scripts', $addConfortaaFont);

$addCustomStyles = static function () {
    $fileName = '/custom.css';
    wp_enqueue_style(
        'forja-custom-styles',
        get_stylesheet_directory_uri() . $fileName,
        [],
        filemtime(get_stylesheet_directory() . $fileName)
    );
};
add_action('wp_enqueue_scripts', $addCustomStyles);
