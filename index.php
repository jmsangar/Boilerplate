<?php get_header( );?>

<ul>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->
	<li>
		<?php
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size');
			$thumb_url_medium = wp_get_attachment_image_src($thumb_id,'medium');
			$thumb_url_full = wp_get_attachment_image_src($thumb_id,'full');
		?>

		<img src="<?php echo $thumb_url_full[0]?>" alt="imagen grande"> 





	</li>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

</ul>

<?php get_footer( );?>