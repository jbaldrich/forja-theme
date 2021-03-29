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

$changeVerificationLinkUrl = static function (string $redirect_url) {
    global $rcp_options;

    $welcome_page = $rcp_options['redirect'];
    if ( ! $redirect = add_query_arg( ['rcp-message' => 'email-verified'], get_post_permalink( $welcome_page ) ) ) {
        return $redirect_url;
    }

    return $redirect;
};
add_filter('rcp_verification_redirect_url', $changeVerificationLinkUrl);

$avoidUserNameFromForm = static function ( $user ) {
    rcp_errors()->remove( 'username_empty' );
    $user['login'] = $user['email'];
    return $user;
};

add_filter( 'rcp_user_registration_data', $avoidUserNameFromForm );
