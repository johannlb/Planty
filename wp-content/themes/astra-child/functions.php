<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css','astra-contact-form-7' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
// function add_extra_item_to_nav_menu( $items, $args ) {
//     // var_dump($args);
//     if (is_user_logged_in() && $args->menu->term_id == 4) {
//         $items .= '<a class="menu-link" href="http://localhost:10008/wp-admin/">Admin</a>';
//     }
//     elseif (!is_user_logged_in() && $args->menu->term_id == 4) {
//         $items .= '';
//     }
//     return $items;
// }

add_filter( 'wp_nav_menu_objects', 'hide_admin_menu_for_non_logged_in_users', 10, 2 );
function hide_admin_menu_for_non_logged_in_users( $items, $args ) {
    // Vérifie si l'utilisateur n'est pas connecté
    if ( ! is_user_logged_in() ) {
        // Parcours tous les éléments du menu
        foreach ( $items as $key => $item ) {
            // Vérifie si le titre de l'élément est "Admin"
            if ( $item->title === 'Admin' ) {
                // Supprime l'élément du tableau
                unset( $items[$key] );
            }
        }
    }
    return $items;
}

// END ENQUEUE PARENT ACTION
