<?php get_header( page);?>
<body>
	
<h1>Título de la página</h1>
<?php the_post(); ?>
<?php the_content(); ?>
<a href="<?php bloginfo(home); ?>">IR AL INICIO"</a>
<script src="<?php bloginfo(template_url); ?>/js/jquery-1.8.3-min.js"></script>

</body>
</html>
