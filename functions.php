<?php
//
// Imagen Destacada
//

	if (function_exists('add_theme_support')) {
     add_theme_support('post-thumbnails');
}


//
// Tamaños "extras" de imágenes
//
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'post-thumb', 550, 400 );
add_image_size( 'home-thumb', 380, 245, true );
}


	register_nav_menus (array('header_menu' => 'es el menu de la cabecera ',
		'footer_menu' => 'es el menu del pie ',
		'sidebar_menu' => 'es el menu del sidebar '
		)
	);


//
// Array que crea los diferentes "huecos" de menús. Usar a discreción
// Esto nos crea 3 "espacios" para agregar los menús que creemos en el
// administrador de Wordpress.
// USO:


/*
	$defaults = array(
	'theme_location'  => 'main-nav-menu',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '',
	'depth'           => 0,
	'walker'          => ''
);
	wp_nav_menu( $defaults );
*/

add_action( 'init', 'register_my_menus' );


function register_my_menus() {
	register_nav_menus(
		array(
			'main-nav-menu' => __( 'Menu Superior' ),
            'footer' => __( 'Menu del footer' ),
			'mobile' => __( 'Menu Para Móviles (4 items solo)' )
		)
	);
}








//
//  Cambiar los datos de redes sociales de los usuarios administrativos
//
function new_contactmethods( $contactmethods ) {
  $contactmethods['twitter'] = 'Twitter'; // Add Twitter
  $contactmethods['facebook'] = 'Facebook'; // Add Facebook
  unset($contactmethods['yim']); // Remove Yahoo IM
  unset($contactmethods['aim']); // Remove AIM
  unset($contactmethods['jabber']); // Remove Jabber


return $contactmethods;
}
add_filter('user_contactmethods','new_contactmethods',10,1);










//
// Desactivamos el editor del administrador de WP.
// Uncomment last line


// define('DISALLOW_FILE_EDIT', true);









function iniciar_widgets()
{

	register_sidebar(
	 array('id' => 'widget1',
	  		'name' => 'zona Widget 1',
	  		'description' => 'Qué pasa, esto es mi sidebarwidget 1',
	  		'before_widget' => '<div>',
	  		'after_widget' => '</div>',
	  		'before_title' => '<h2 class="rounded">',
	  		'after_title' => '</h2>'
	  		)
		);
	register_sidebar(
	 array('id' => 'widget2',
	  		'name' => 'zona Widget 2',
	  		'description' => 'Esta barra va en el footer',
	  		'before_widget' => '<div>',
	  		'after_widget' => '</div>',
	  		'before_title' => '<h2 class="rounded">',
	  		'after_title' => '</h2>'
	  		)
		);
	
}

register_sidebar(
   array(
    'id' => 'widget3',
    'name' => 'Zona Widget para categorías',
    'description' => '',
    'before_widget' => '<div>',
    'after_widget' => '<hr>',
    'before_title' => '<span>',
    'after_title' => '</span>',
   )
  );


  // register_sidebars(3,
  //  array(
  //   'name'=>'Mi id %d',
  //   'id' => 'miid%d'
  //  )
  // );


 

add_action( 'widgets_init', 'iniciar_widgets');
function html_comentarios( $comment, $args, $depth ) {
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                        $avatar_size = 68;


                        if ( '0' != $comment->comment_parent )
                            $avatar_size = 39;


                        echo get_avatar( $comment, $avatar_size );




                        echo '<br />';
                        echo get_comment_author_link();
                        echo '<br />';
                        echo get_comment_link( $comment->comment_ID );
                        echo '<br />';
                        echo get_comment_time( 'c' );
                        echo '<br />';
                        echo get_comment_date();
                        echo '<br />';
                        echo get_comment_time();
                        echo '<br />';
                        echo '<br />';


                    ?>


                    <?php //edit_comment_link( 'Editar', '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .comment-author .vcard -->


                <?php if ( $comment->comment_approved == '0' ) : ?>
                    Tu comentario no está todavía aprobado
                <?php endif; ?>


            </footer>


            <div class="comment-content"><?php comment_text(); ?></div>


            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Responder', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->


    <?php
}


// Remove the fucking top margin for wp menu
add_action('get_header', 'my_filter_head');
function my_filter_head() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_filter('show_admin_bar', '__return_false');
