<!-- Gère l'affichage d'un article individuel -->
<?php get_header();


/* boucle WordPress*/
if(have_posts()){
    while(have_posts()){
        the_post();
        get_template_part('parts/singular-content');
    }
}


get_footer(); ?>
