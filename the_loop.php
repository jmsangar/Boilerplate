<main>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
	<h1><?php the_title( );?></h1>
		<p><?php the_content();?></p>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<p>No hay posts</p>
	<?php endif; ?>
</main>