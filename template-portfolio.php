<?php
/**
 * Template Name: Portfolio Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

	<?php if ($post->post_parent == 63): ?>
		<?php get_template_part('templates/content', 'portfolio-navigation'); ?>
	<?php endif; ?>

	<?php get_template_part('templates/content', 'portfolio'); ?>

<?php endwhile; ?>
