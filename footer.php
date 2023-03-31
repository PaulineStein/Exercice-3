</main>
	<footer class="main-footer">
		<div class="container">
			<!-- appel des widget -->
			<?php //dynamic_sidebar('footer-widget'); ?>

			<address>
				<strong>Designer Web</strong><br>
				CEFIM<br>
				32 Avenue Marcel Dassault<br>
				37200 Tours<br>
				T : <a href="tel:0247402680">02 47 40 26 80</a>
			</address>

			<?php  wp_nav_menu([
				'theme_location' => 'footer',
				'container' => 'nav',
				'container_class' => 'footer-nav',
				/* On ne veut pas de menu par défaut si le menu n'existe pas*/
				'fallback_cb' => false,
				'depth' => 1,
			]);
			?> 

			<?php wp_nav_menu([
				'theme_location' => 'social',
				'container' => 'nav',
				'container_class' => 'footer-nav',
				/* On ne veut pas de menu par défaut si le menu n'existe pas*/
				'fallback_cb' => false,
				'depth' => 1,
			]);
			?>
		</div>

	</footer>

    <?php wp_footer(); ?>

</body>
</html>