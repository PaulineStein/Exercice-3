<!-- the_permalink(); -->

<?php get_header();?>


<div class="last-news">
    <div class="container">
        <h1 class="section-title"> <?php single_post_title(); ?></h1>

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

            <!-- <img loading="lazy" src="img/news-1.jpg" alt="Some code" class="card-img" srcset="img/news-1.jpg,
            img/news-1_2x.jpg 2x"> -->


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

        

        <!-- <nav class="pagination">
            <ul class="pagination-list">
                <li class="pagination-item">
                    <a href="#" class="pagination-link" aria-label="Précédent">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="screen-reader-text">Précédent</span>
                    </a>
                </li>
                <li class="pagination-item current">
                    <a href="#" class="pagination-link">1</a>
                </li>
                <li class="pagination-item">
                    <a href="#" class="pagination-link">2</a>
                </li>
                <li class="pagination-item">
                    <a href="#" class="pagination-link">3</a>
                </li>
                <li class="pagination-item">
                    <a href="#" class="pagination-link" aria-label="Suivant">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="screen-reader-text">Suivant</span>
                    </a>
                </li>
            </ul>
        </nav> -->

    </div>
    <!-- Pagination par defaut -->
    <?php //posts_nav_link(); ?>

    <!-- Pagination stylisée -->
        <!-- <nav class="pagination">
            <ul class="pagination-list">
                <div class="site__navigation">
                    <div class="site__navigation__prev">
                        <?php //previous_posts_link('Prev'); ?>
                    </div>

                    <div class="site__navigation__next">
                        <?php //next_posts_link('Next'); ?>
                    </div>
                </div>
            </ul>
        </nav> -->

        <nav class="pagination-list">
            <?php the_posts_pagination([
                'mid_size' => 1,
                'prev_text' => 'Prev',
                'next_text' => 'Next',
            ]); ?>
        </nav>

</div>

<?php get_footer();?>