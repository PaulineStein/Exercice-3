<?php get_header();

/* boucle WordPress*/
if(have_posts()){
    while(have_posts()){
        the_post();
        the_title();
    }
}


get_footer(); ?>