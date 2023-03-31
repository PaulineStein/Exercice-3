<?php
/* 
Template Name: Page contact
 */
?>

<?php get_header();?>

<?php
if(have_posts()){
    while(have_posts()){
        the_post();
        ?>
    
        <div class="container">
            <h1>Nous contacter</h1>
            <?php the_content(); ?>
    
        </div>
<?php
    }
} 

get_footer();?>
