<?php get_header();?>


<div class="modules" >
	<div class="container container-narrow">
		<h1 class="modules-title"> <?php single_cat_title(); ?></h1>
		<div class="module-desc">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus ultrices in. Egestas diam in arcu cursus euismod. Dictum fusce ut placerat orci nulla. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. Massa ultricies mi quis hendrerit dolor magna eget. Nullam eget felis eget</p>
		</div>
	</div>

	<div class="container">



		<!-- boucle WordPress -->
		<?php 
		if(have_posts()){
			while(have_posts()){
				the_post();?>

			<article class="card">


			<!-- <img loading="lazy"  src="img/formation-1.jpg" alt="Some code" class="card-img" srcset="img/formation-1.jpg,
				img/formation-1_2x.jpg 2x"> -->
			<?php if(has_post_thumbnail()) {
			the_post_thumbnail( 'large', [
				'class' => 'card-img',
				'loading' => 'lazy',
				'alt' => 'Some code'
			]);
			}?> 

				<div class="card-content">
					<h2 class="card-title"><?php the_title(); ?></h2>
					<p class="card-excerpt"><?php the_excerpt();?> ...</p>
				</div>

				<a href="<?php the_permalink(); ?>" class="card-link">Lire la suite <img loading="lazy"  src="<?php echo get_template_directory_uri() . '/img/icon-arrow-right.svg' ?>" alt="" aria-hidden="true"></a>
			</article>


		<?php 
			}
		}
		?>

		<nav class="pagination">
            <?php the_posts_pagination([
				'class' => 'pagination-list',
                'mid_size' => 1,
                'prev_text' => 'Prev',
                'next_text' => 'Next',
            ]); ?>
        </nav>

	</div>
</div>

<?php get_footer(); ?>