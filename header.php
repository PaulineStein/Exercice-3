<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
	<meta <?php bloginfo('charset')?>>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/style.css">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
	<a href="#main-menu" class="screen-reader-text">Aller à la navigation principale</a>
	<a href="#main-content" class="screen-reader-text">Aller au contenu principal</a>

	<header class="main-header">
		<div class="container">
			<div class="logo"><a href=" <?php echo home_url(); ?>"> <?php bloginfo('name'); ?> </a></div>
			<!-- <nav class="main-nav">
				<button aria-expanded="false" aria-controls="main-menu">Menu</button>
				<ul class="menu" id="main-menu" hidden>
					<li class="menu-item active"><a href="index.html">Accueil</a></li>
					<li class="menu-item"><a href="formation-liste.html">La formation</a></li>
					<li class="menu-item"><a href="etudiant-liste.html">Les étudiants</a></li>
					<li class="menu-item"><a href="actualite-liste.html">Actualités</a></li>
					<li class="menu-item"><a href="contact.html">Nous contacter</a></li>
				</ul>
			</nav> -->

			<?php wp_nav_menu([
				'theme_location' => 'main',
				'menu_id' => 'main-menu',
				'container' => 'nav',
				'container_class' => 'main-nav',
				/* On ne veut pas de menu par défaut si le menu n'existe pas*/
				'fallback_cb' => false,
				'depth' => 1,
				'items_wrap' => '<button aria-expanded="false" aria-controls="main-menu">Menu</button><ul id="%1$s" class="%2$s" hidden>%3$s</ul>',
			]);
			?>
		</div>
	</header>
    
	<main id="main-content">
	<?php //get_search_form(); ?>