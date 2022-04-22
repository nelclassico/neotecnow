<?php get_header(); ?>



<div class="uk-container">

	<h1> <?php echo get_the_title();?> </h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>

