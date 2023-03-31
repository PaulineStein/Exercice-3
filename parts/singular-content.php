<div class="container container-narrow">
	<?php
	if (is_single()){
		if(has_post_thumbnail()) {
			the_post_thumbnail( 'large', [
				'class' => 'featured-img',
				'loading' => 'lazy',
			]);
		}
	}
	?>

	<h1> <?php the_title(); ?> </h1>

	<?php
	if (is_single()){ ?>
		<p class="post-date">Publié le <?php the_date('d/m/Y'); ?>, par <?php the_author(); ?> </p>
		
	<?php } ?>
		
	<p> <?php the_content(); ?> </p>
	<p><?= get_post_meta( get_the_ID(), 'avis', true)?></p>

</div>