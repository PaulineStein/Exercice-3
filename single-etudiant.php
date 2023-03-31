<?php get_header();  ?>


<div class="student-post">
<?php if(have_posts()){
    while(have_posts()) {
        the_post();

		$student_fields = [
			get_field_object('etudiant_film'),
			get_field_object('etudiant_serie'),
			get_field_object('etudiant_jeu'),
			get_field_object('etudiant_heros'),
			get_field_object('etudiant_livre'),
			get_field_object('etudiant_chanson'),
			get_field_object('etudiant_app'),
		]; 
		
		$student_fields_website = get_field_object('etudiant_site');
		?>

		<div class="container">

		<?php
		$image = get_field('image');
		$size = 'medium';

		if ($image){
			echo wp_get_attachment_image(
				$image,
				$size,
				false,
				['class' => 'student-post-img', 'loading' => 'lazy',]
			);
		}
		
		?>

		<h1 class="student-post-title"><?php the_title(); ?></h1>

		<?php 
		if (have_rows('etudiant_portrait')){
			while(have_rows('etudiant_portrait')) {
				the_row();

				$label = get_sub_field('etudiant_portrait_label');
				$value = get_sub_field('etudiant_portrait_value');
				?>

				<?php if($label & $value){ ?>
					<div class="field">
						<div class="field-title"><?php echo $label; ?></div>
						<div class="field-content"><?php echo $value; ?></div>
					</div>

					<?php }
					}
		}
		?>





		<?php foreach($student_fields as $field){
			if($field['value']) { ?>

			<div class="field">
				<div class="field-title"><?php echo $field['label']; ?></div>

				<?php if ($field['url']) ?>
				<a href="<?php echo $field['url']; ?>" target="<?php echo $field['target']; ?>" ></a>

				<div class="field-content"><?php echo $field['value']; ?></div>
			</div>
			<?php
			};	
		}

			
		
		if($student_fields_website['value']) {?>
				<div class="field">
					<div class="field-title"> <?php echo $student_fields_website['label']; ?> </div>
					<a href="<?php echo $student_fields_website['value']['url']; ?>" target ="<?php echo $student_fields_website['value']['target']; ?>"> <?php echo $student_fields_website['value']['title']; ?></a>
				</div>

			<?php
			} ?>

		
			<div class="field">
				<div class="field-title">En deux mots</div>
				<div class="field-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet.</div>
			</div>

		</div>


<?php
    }
}?>

</div>

<?php get_footer(); ?>