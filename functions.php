<?php

/* Activation du titre*/
add_theme_support('title-tag');

/* Activation des images à la une*/
add_theme_support('post-thumbnails');


function dwwm_enqueue_style_and_script(){
    wp_enqueue_style('base', get_template_directory_uri() .  '/css/base.css', [], false);
    wp_enqueue_style('main_style_wwm', get_template_directory_uri() .  '/css/style.css', ['base'], '1.0');
    wp_enqueue_script('nav', get_template_directory_uri() . '/js/nav.js', [],'1.0', true);

    if(is_front_page()) {
        wp_enqueue_style('glide_core', get_template_directory_uri() .  '/glide/glide.core.min.css');
        wp_enqueue_style('glide_theme', get_template_directory_uri() .  '/glide/glide.theme.min.css', ['glide_core']);

        wp_enqueue_script('glide', get_template_directory_uri() .  '/glide/glide.min.js', [], false, true);
        wp_enqueue_script('glide_init', get_template_directory_uri() .  '/glide/glide_init.js', ['glide'], false, true);


    }
}

add_action('wp_enqueue_scripts', 'dwwm_enqueue_style_and_script');

/* Création des emplacements de menu */
register_nav_menus([
    'main' => 'Menu principal',
    'footer' => 'Menu footer',
    'social' => 'Menu réseau sociaux'
]);

/* Création des emplacements de widgets */
register_sidebar([
    'id' => 'footer-widget',
    'name' => 'Pied de page',
    'before_sidebar' => '<div>',
    'after_sidebar' => '</div>', 
    'before_widget' => '<div class="footer-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<strong>',
    'after_title' => '</strong> <br>',
]);

/* Remove p and br from CF7 */
add_filter('wpcf7_autop_or_not', '__return_false');

/* Add taills d'images */
add_image_size('card-img', 544, 354, true);

/* Création de custom post types */
function dwwm_register_post_types(){
    /* CPT Modules */
    $labels = [
        'name' => 'Modules',
        'all_items' => 'Tous les modules',
        'singular_name' => 'Module',
        'add_new_item' => 'Ajouter un module',
        'edit_item' => 'Modifier le module',
    ];

    $args = [
        'labels' => $labels, 
        'public'=> true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', ],
    ];

    register_post_type('module', $args);

    /* CPT Etudiant */

    $labels_etudiant = [
        'name' => 'Étudiant.e.s',
        'all_items' => 'Tous les étudiant.e.s',
        'singular_name' => 'Étudiant.e',
        'add_new_item' => 'Ajouter un.e étudiant.e',
        'edit_item' => 'Modifier l\'étudiant.e',
    ];

    $args_etudiant = [
        'labels' => $labels_etudiant, 
        'public'=> true,
        'has_archive' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'thumbnail', 'editor',],
    ];

    register_post_type('etudiant', $args_etudiant);


    /*Custom taxonomies modeles*/

    $labels = [
        'name' => 'Language',
    ];

    $args = [
        'labels' => $labels, 
        'public'=> true,
        'hierarchical' => true,
    ];

    register_taxonomy('language', 'module', $args );


    /*Custom taxonomies etudiante*/
    $labels_etudiant = [
        'name' => 'Reconvertion professionelle',
    ];

    $args_etudiant = [
        'labels' => $labels_etudiant, 
        'public'=> true,
        'hierarchical' => true,
    ];

    register_taxonomy('reconvertion', 'etudiant', $args_etudiant );


}
add_action('init', 'dwwm_register_post_types');



// Remove meta-box
function dwwm_remove_metabox(){
    remove_meta_box( 'profildiv', 'etudiant','side');
}

add_action('admin-menu',' dwwm_remove_metabox');



/* Add options page*/
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Paramètres',
        'menu_title' => 'Paramètres',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}



/* Surchage de la main query */
// function dwwm_override_query($wp_query){
//     if($wp_query->is_main_query() && is_post_type_archive('etudiant')) {
//         $wp_query->set('posts_per_page', 16);
//     }
// }

// add_action('pre_get_posts', 'dwwm_override_query');