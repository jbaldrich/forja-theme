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

// Remove the entry meta in the entry header
remove_action( 'genesis_entry_header', 'genesis_post_info', 8 );

// RCP
$changeRegisterButtonText = static function ($text) {
    return __('Registrarse', 'forja-theme');
};
add_filter('rcp_registration_register_button', $changeRegisterButtonText);

$changeVerificationLinkUrl = static function (string $redirect_url, RCP_Member $RCPMember) {
    return str_replace('.com/', '.com/registro/bienvenida/');
};
add_filter('rcp_verification_redirect_url', $changeVerificationLinkUrl);
