<?php get_header( );?>

	<h1><?php the_category(' ');?></h1>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
	<article>
		<header><a href="<?php the_permalink(); ?>"><?php the_title();?></a>
		</header>
	
	<p><?php the_excerpt();?></p>
	<p><?php the_content("seguir leyendo");?></p>
	</article>
	<p><?php the_excerpt();?>
	</p><a href="<?php the_permalink(); ?>"<continua lenyendo></a>

	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<p>No hay posts</p>
	<?php endif; ?>
</main>
<?php get_footer( );?>