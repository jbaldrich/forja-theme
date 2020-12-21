<?php
function jbr_add_new_font() {
    wp_enqueue_style( 'confortaa-google-fonts', '//fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap', array(), CHILD_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'jbr_add_new_font' );