<!DOCTYPE html>
<html>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>
		<?php echo wp_get_document_title(); ?>
	</title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<h1><?php bloginfo('name'); ?></h1>
		<h2><?php bloginfo('description'); ?></h2>
	</header>

	<div class="middle">
		<?php
		$args = array(
			'post_type' => 'post'
		);
		$the_query = new WP_Query($args);

		?>
		

		<?php if ($the_query->have_posts()) : ?>

			<!-- the loop -->
			<?php
			while ($the_query->have_posts()) :
				$the_query->the_post();
			?>
				<?php the_title('<h2>', '</h2>'); ?>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<?php posts_nav_link(); ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>

	<footer class="footer">
		<?php echo date('Y') ?> © Я и компания моя
	</footer>

	<?php wp_footer(); ?>
</body>

</html>