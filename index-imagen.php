<<?php get_header( );?>

	
<?php query_posts("edit_posts_per_page=3" );?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if( $wp_query->current_post == 0 && !is_paged() ) { ?>

	

	
	<article>
		<h1><?php the_title() ?></h1>

		<?php  } ;?>
		<header><a href="<?php the_permalink(); ?>"><?php the_title();?></a>
		<p><?php //the_excerpt();?></p>
		<p><?php the_date('d \d\e F, y' );?><?php the_time( );?> por <?php the_author();;?></p>
				<?php
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size');
			$thumb_url_medium = wp_get_attachment_image_src($thumb_id,'medium');
			$thumb_url_full = wp_get_attachment_image_src($thumb_id,'full');
		?>
		
		
		 
		 <img src="<?php echo $thumb_url_full[0]?>" alt="imagen grande"> 




		<p><?php the_content("seguir leyendo");?></p>
	</article>
	<p><?php the_excerpt();?>
	</p><a href="<?php the_permalink(); ?>"<seguir leyendo ...></a>

	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<p>No hay posts</p>
	<?php endif; ?>
</main>

<?php get_footer( );?>