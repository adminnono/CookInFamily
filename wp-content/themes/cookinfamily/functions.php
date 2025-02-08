<?php 
function cookinfamily_add_admin_menu() {
    add_menu_page(
        'Réglages du thème CookInFamily', // Titre de la page
        'CookInFamily', // Titre du menu
        'manage_options', // Permissions requises
        'cookinfamily_settings', // Slug de la page
        'cookinfamily_theme_settings', // Fonction d'affichage
        'dashicons-admin-settings', // Icône du menu
        60 // Position dans le menu
    );
}
add_action('admin_menu', 'cookinfamily_add_admin_menu');

function cookinfamily_theme_settings() {
    echo '<h1>' . esc_html(get_admin_page_title()) . '</h1>';
    echo '<form action="options.php" method="post">';
    
    settings_fields('cookinfamily_settings_fields');
    do_settings_sections('cookinfamily_settings_section');
    submit_button();
    
    echo '</form>';
}


function cookinfamily_settings_register() {
    register_setting('cookinfamily_settings_fields', 'cookinfamily_settings_field_phone_number');
    register_setting('cookinfamily_settings_fields', 'cookinfamily_settings_field_email');

    add_settings_section(
        'cookinfamily_settings_section', 
        'Paramètres de CookInFamily', 
        'cookinfamily_settings_section_callback', 
        'cookinfamily_settings_section'
    );

    add_settings_field(
        'cookinfamily_settings_field_phone_number', 
        'Numéro de téléphone', 
        'cookinfamily_settings_field_phone_number_output', 
        'cookinfamily_settings_section', 
        'cookinfamily_settings_section'
    );

    add_settings_field(
        'cookinfamily_settings_field_email', 
        'Adresse e-mail', 
        'cookinfamily_settings_field_email_output', 
        'cookinfamily_settings_section', 
        'cookinfamily_settings_section'
    );
}
add_action('admin_init', 'cookinfamily_settings_register');


function cookinfamily_settings_section_callback() {
    echo 'Paramétrez les différentes options de votre thème CookInFamily.';
}

function cookinfamily_settings_field_phone_number_output() {
    $phone = get_option('cookinfamily_settings_field_phone_number');
    echo '<input type="text" name="cookinfamily_settings_field_phone_number" value="' . esc_attr($phone) . '" />';
}

function cookinfamily_settings_field_email_output() {
    $email = get_option('cookinfamily_settings_field_email');
    echo '<input type="email" name="cookinfamily_settings_field_email" value="' . esc_attr($email) . '" />';
}


    

    