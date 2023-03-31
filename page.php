<?php get_header();?>

<!-- boucle WordPress -->
<?php 
if(have_posts()){
    while(have_posts()){
        the_post();
        get_template_part('parts/singular-content');
        ?>

    <!-- <div class="container container-narrow">
        <h1><?php //the_title(); ?></h1>
        <p> <?php // the_content(); ?> </p>
    </div> -->

<?php 
    }
}

get_footer(); ?>

