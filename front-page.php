<?php get_header();

if(have_posts()) {
    the_post();

    if(have_rows('slider')) { ?>

        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">

                
                <?php while(have_rows('slider')) {
                    the_row();

                    $img = get_sub_field('slider_image');
                    $hero_text = get_sub_field('slider_hero_text');
                    $link_text = get_sub_field('slider_link_text');
                    $link = get_sub_field('slider_link'); ?>


                    <section class="home-hero inverted"
                    <?php if($img){
                            echo 'style="background-image: url(' . wp_get_attachment_image_src($img, 'medium', false)[0] . ');"';}?> >
                        <div class="container">
                        <div class="hero-content">
                            <h1 class="hero-title"> <?php echo $hero_text; ?> </h1>
                            <a href="<?php echo $link; ?>" class="hero-link"> <?php echo $link_text; ?> </a>
                        </div>
                        </div>
                    </section>

                <?php } ?>
                </div>
            </div>
        </div>
        





        <?php
        // Boucle derniers posts
        $args_post = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'title'
        ];

        $query_post = new WP_Query($args_post);

        if($query_post->have_posts()){?>

            <section class="last-news">
                    <div class="container">
                        <h2 class="section-title">Les dernières actualités</h2>

            <?php while($query_post->have_posts()){
                $query_post->the_post(); ?>

                    <article class="card">
                        <?php if(has_post_thumbnail()) {
                            the_post_thumbnail('medium', ['class'=> 'card-img']);
                        } ?>
                        <div class="card-content">
                            <p class="card-date"><time datetime="<?php echo get_the_date(); ?> "> <?php echo get_the_date(); ?> </time></p>
                            <h2 class="card-title"> <?php the_title(); ?> </h2>
                            <p class="card-excerpt"> <?php the_excerpt(); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?> " class="card-link">Lire la suite <img loading="lazy"  src="<?php get_template_directory_uri() . '/img/icon-arrow-right.svg'; ?>" alt="" aria-hidden="true"></a>
                    </article>
                
            <?php }?>

            </div>
                </section>
        <?php } 
        wp_reset_postdata();
        ?>





        <!-- Boucle étudiant.e.s -->
        <?php 
        $args_etudiant = [
            'post_type' => 'etudiant',
            'posts_per_page' => 4,
            'order' => 'DESC',
            //'orderby' => 'title'
        ];

        $query_etudiant = new WP_Query($args_etudiant);
        if($query_etudiant->have_posts()){ ?>

            <section class="students inverted">
                    <div class="container">
                        <h2 class="section-title">Rencontrez les étudiants</h2> 

            <?php while($query_etudiant->have_posts()){
                $query_etudiant->the_post(); ?>

                    <article class="student">
                        <?php 
                        if(has_post_thumbnail()) {
                            the_post_thumbnail('medium', ['class'=> 'student-img']);
                        }
                        ?>

                        <h2 class="student-name"> <?php the_title(); ?> </h2>
                        <a href="<?php the_permalink(); ?> " class="student-link">En savoir plus</a>
                    </article>


            <?php } ?>
        
                </div>
            </section>
        
        <?php } 
        wp_reset_postdata();
        ?>






        <!-- Boucle module -->
        <?php 
        $args_module = [
            'post_type' => 'module',
            'posts_per_page' => 2,
            'order' => 'DESC',
            'orderby' => 'title'
        ];

        $query_module = new WP_Query($args_module);
        if($query_module->have_posts()){ ?>

            <section class="modules">
                    <div class="container">
                    <h2 class="section-title">Les modules de la formation</h2> 

            <?php while($query_module->have_posts()){
                $query_module->the_post(); ?>

                    <article class="card">
                        <?php 
                        if(has_post_thumbnail()) {
                            the_post_thumbnail('medium', ['class'=> 'card-img']);
                        }
                        ?>

                        <div class="card-content">
                            <h2 class="card-title"> <?php the_title(); ?> </h2>
                            <p class="card-excerpt"> <?php the_excerpt(); ?></p>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="card-link">Lire la suite <img loading="lazy"  src="<?php get_template_directory_uri() . '/img/icon-arrow-right.svg'; ?>" alt="" aria-hidden="true"></a>
                    </article>


            <?php } ?>
        
                </div>
            </section>
        
        <?php } 
        wp_reset_postdata();
        ?>



    <?php 
    } 
} ?>





<?php
get_footer();
?>