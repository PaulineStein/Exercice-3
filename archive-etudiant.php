<?php get_header();?>


<div class="students" >
	<div class="container">
		<h1 class="section-title"> <?php single_cat_title(); ?></h1>

		<!-- boucle WordPress -->
		<?php 
		if(have_posts()){
			while(have_posts()){
				the_post();?>

			<article class="student">

			<?php if(has_post_thumbnail()) {
			the_post_thumbnail( 'large', [
				'class' => 'student-img',
				'loading' => 'lazy',
				'alt' => 'Some code'
			]);
			}?> 

				<h2 class="student-name"><?php the_title(); ?></h2>
				<a href="<?php the_permalink(); ?>" class="student-link">En savoir plus</a>
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





