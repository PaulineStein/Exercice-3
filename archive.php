<?php get_header();?>

<div class="last-news">
    <div class="container">
        <h1 class="section-title"> <?php single_cat_title(); ?></h1>

        <!-- boucle WordPress -->
        <?php 
        if(have_posts()){
            while(have_posts()){
                the_post();?>

            <article class="card">

            <?php if(has_post_thumbnail()) {
			the_post_thumbnail( 'large', [
				'class' => 'card-img',
				'loading' => 'lazy',
                'alt' => 'Some code'
			]);
            }?> 

            <div class="card-content">
                <p class="card-date"><time datetime="<?php echo get_the_date(); ?>"> <?php echo get_the_date(); ?> </time></p>
                <h2 class="card-title"><?php the_title(); ?></h2>
                <p class="card-excerpt"> <?php the_excerpt();?> ...</p>
            </div>
            <a href="<?php the_permalink(); ?>" class="card-link">Lire la suite <img loading="lazy"
                    src=" <?php echo get_template_directory_uri() . '/img/icon-arrow-right.svg' ?>" alt="" aria-hidden="true"></a>
        </article>

        <?php 
            }
        }
        ?>

    </div>
</div>



<?php get_footer(); ?>