<?php get_header(); 


if(have_posts()){
    while(have_posts()) {
        the_post(); ?>


<section class="module-hero">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</section>
		<section class="module-desc">
			<div class="container container-narrow">
				<p><?php the_content(); ?></p>
			</div>
		</section>
        <?php
    }
}

get_footer(); ?>